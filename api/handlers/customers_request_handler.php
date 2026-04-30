<?php
/*
 * customers_request_handler.php
 * 
 * Handles all customer request API calls for the admin dashboard.
 * Expects Db-connection.php to provide a PDO instance as $pdo.
 * 
 * Supported actions (via ?action= or POST body):
 *   list            — Paginated, searchable, filterable request listing
 *   get             — Single request details
 *   update_status   — Change request status (added-to-order, ignored, pending)
 */

require_once __DIR__ . '/../../database/db_connection.php';

/* ── CORS & Headers ──────────────────────────────────────────── */
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, X-Requested-With');
header('Cache-Control: no-store, no-cache, must-revalidate');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit();
}

/* ── Read input ──────────────────────────────────────────────── */
 $rawInput = file_get_contents('php://input');
 $payload  = json_decode($rawInput, true) ?? [];
 $action   = $_GET['action'] ?? $payload['action'] ?? $_POST['action'] ?? '';

/* ── Valid statuses ──────────────────────────────────────────── */
const VALID_STATUSES = ['pending', 'added-to-order', 'ignored'];

/* ── Response helper ─────────────────────────────────────────── */
function jsonResponse(array $data, int $code = 200): void
{
    http_response_code($code);
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit();
}

/* ── Date formatter — matches JS display ──────────────────────── */
function formatDate(string $datetime): string
{
    $ts = strtotime($datetime);
    if ($ts === false) return 'N/A';
    return date('M d, Y', $ts);
}

/* ================================================================
   ROUTER
   ================================================================ */
try {
    switch ($action) {
        case 'list':
            listRequests($pdo);
            break;
        case 'get':
            getRequest($pdo);
            break;
        case 'update_status':
            updateStatus($pdo, $payload);
            break;
        default:
            jsonResponse(['error' => "Invalid or missing action: '{$action}'"], 400);
    }
} catch (PDOException $e) {
    jsonResponse(['error' => 'Database error: ' . $e->getMessage()], 500);
} catch (Throwable $e) {
    jsonResponse(['error' => 'Server error: ' . $e->getMessage()], 500);
}


/* ================================================================
   ACTION: LIST REQUESTS
   GET  ?action=list&page=1&per_page=12&search=&status=
   ================================================================ */
function listRequests(PDO $pdo): void
{
    $page    = max(1, (int)($_GET['page']     ?? 1));
    $perPage = min(100, max(1, (int)($_GET['per_page'] ?? 12)));
    $search  = trim($_GET['search']   ?? '');
    $status  = trim($_GET['status']   ?? '');
    $offset  = ($page - 1) * $perPage;

    /* ── Build WHERE ─────────────────────────────────────────── */
    $where  = ['deleted_at IS NULL'];
    $params = [];

    if ($search !== '') {
        // Search across name and request details
        $where[] = '(first_name LIKE :s1 OR surname LIKE :s2 OR request_details LIKE :s3 OR email LIKE :s4)';
        $params[':s1'] = "%{$search}%";
        $params[':s2'] = "%{$search}%";
        $params[':s3'] = "%{$search}%";
        $params[':s4'] = "%{$search}%";
    }

    if ($status !== '' && in_array($status, VALID_STATUSES, true)) {
        $where[] = 'status = :status';
        $params[':status'] = $status;
    }

    $whereSql = implode(' AND ', $where);

    /* ── Count ───────────────────────────────────────────────── */
    $countStmt = $pdo->prepare("SELECT COUNT(*) FROM customer_requests WHERE {$whereSql}");
    $countStmt->execute($params);
    $total = (int)$countStmt->fetchColumn();

    /* ── Fetch page of requests ──────────────────────────────── */
    $sql = "SELECT
                id,
                first_name,
                surname,
                email,
                cell_num,
                request_details,
                status,
                created_at
            FROM customer_requests
            WHERE {$whereSql}
            ORDER BY created_at DESC
            LIMIT :lim OFFSET :off";

    $stmt = $pdo->prepare($sql);
    foreach ($params as $key => $val) {
        $stmt->bindValue($key, $val);
    }
    $stmt->bindValue(':lim', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':off', $offset,  PDO::PARAM_INT);
    $stmt->execute();

    $requests = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $requests[] = [
            'id'              => (string)$row['id'],
            'firstName'       => $row['first_name'],
            'surname'         => $row['surname'],
            'email'           => $row['email'],
            'cellNum'         => $row['cell_num'],
            'requestDetails'  => $row['request_details'],
            'status'          => $row['status'],
            'date'            => formatDate($row['created_at']),
        ];
    }

    jsonResponse([
        'requests'    => $requests,
        'total'       => $total,
        'page'        => $page,
        'per_page'    => $perPage,
        'total_pages' => (int)ceil($total / $perPage),
    ]);
}


/* ================================================================
   ACTION: GET SINGLE REQUEST
   GET ?action=get&id=1
   ================================================================ */
function getRequest(PDO $pdo): void
{
    $id = trim($_GET['id'] ?? '');
    if ($id === '' || !is_numeric($id)) {
        jsonResponse(['error' => 'Valid request ID is required'], 400);
    }

    $stmt = $pdo->prepare("
        SELECT id, first_name, surname, email, cell_num, request_details, status, created_at
        FROM customer_requests
        WHERE id = :id AND deleted_at IS NULL
        LIMIT 1
    ");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        jsonResponse(['error' => 'Request not found'], 404);
    }

    jsonResponse([
        'request' => [
            'id'              => (string)$row['id'],
            'firstName'       => $row['first_name'],
            'surname'         => $row['surname'],
            'email'           => $row['email'],
            'cellNum'         => $row['cell_num'],
            'requestDetails'  => $row['request_details'],
            'status'          => $row['status'],
            'date'            => formatDate($row['created_at']),
        ]
    ]);
}


/* ================================================================
   ACTION: UPDATE STATUS
   POST JSON  { action: "update_status", id: "1", status: "added-to-order" }
   ================================================================ */
function updateStatus(PDO $pdo, array $payload): void
{
    $id     = trim($payload['id']     ?? '');
    $status = trim($payload['status'] ?? '');

    if ($id === '' || !is_numeric($id)) {
        jsonResponse(['error' => 'Valid request ID is required'], 400);
    }
    if (!in_array($status, VALID_STATUSES, true)) {
        jsonResponse(['error' => 'Invalid status. Must be one of: ' . implode(', ', VALID_STATUSES)], 400);
    }

    // Verify request exists
    $check = $pdo->prepare("SELECT id, status FROM customer_requests WHERE id = :id AND deleted_at IS NULL LIMIT 1");
    $check->bindValue(':id', $id, PDO::PARAM_INT);
    $check->execute();
    $existing = $check->fetch(PDO::FETCH_ASSOC);

    if (!$existing) {
        jsonResponse(['error' => 'Request not found'], 404);
    }

    $oldStatus = $existing['status'];
    if ($oldStatus === $status) {
        jsonResponse(['message' => 'Status is already "' . $status . '"', 'unchanged' => true], 200);
    }

    // Update status
    $stmt = $pdo->prepare("
        UPDATE customer_requests
        SET status = :status, updated_at = NOW()
        WHERE id = :id AND deleted_at IS NULL
    ");
    $stmt->bindValue(':status', $status);
    $stmt->bindValue(':id',     $id, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() === 0) {
        jsonResponse(['error' => 'Failed to update request status'], 500);
    }

    jsonResponse([
        'message'    => 'Request status updated successfully',
        'id'         => $id,
        'old_status' => $oldStatus,
        'new_status' => $status,
    ]);
}