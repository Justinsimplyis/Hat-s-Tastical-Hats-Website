<?php
/*
 * orders_handler.php
 * 
 * Handles all order-related API requests for the admin dashboard.
 * Expects Db-connection.php to provide a PDO instance as $pdo.
 * 
 * Supported actions (via ?action= or POST body):
 *   list           — Paginated, searchable, filterable order listing
 *   get            — Single order with items
 *   update_status  — Change order status
 *   delete         — Soft-delete an order
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

/* ── Response helper ─────────────────────────────────────────── */
function jsonResponse(array $data, int $code = 200): void
{
    http_response_code($code);
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit();
}

/* ── Valid statuses ──────────────────────────────────────────── */
const VALID_STATUSES = ['pending', 'processing', 'shipped', 'delivered', 'cancelled'];

/* ── Date formatter — mirrors JS display ─────────────────────── */
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
            listOrders($pdo);
            break;
        case 'get':
            getOrder($pdo, $payload);
            break;
        case 'update_status':
            updateStatus($pdo, $payload);
            break;
        case 'delete':
            deleteOrder($pdo, $payload);
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
   ACTION: LIST
   GET  ?action=list&page=1&per_page=10&search=&status=
   POST  action=list  (same params in body)
   ================================================================ */
function listOrders(PDO $pdo): void
{
    $page     = max(1, (int)($_GET['page']     ?? $_POST['page']     ?? 1));
    $perPage  = min(100, max(1, (int)($_GET['per_page'] ?? $_POST['per_page'] ?? 10)));
    $search   = trim($_GET['search']  ?? $_POST['search']  ?? '');
    $status   = trim($_GET['status']  ?? $_POST['status']  ?? '');
    $offset   = ($page - 1) * $perPage;

    /* ── Build WHERE ─────────────────────────────────────────── */
    $where  = ['o.deleted_at IS NULL'];
    $params = [];

    if ($search !== '') {
        $where[] = '(o.id LIKE :s1 OR o.customer_name LIKE :s2 OR o.customer_email LIKE :s3)';
        $params[':s1'] = "%{$search}%";
        $params[':s2'] = "%{$search}%";
        $params[':s3'] = "%{$search}%";
    }

    if ($status !== '' && in_array($status, VALID_STATUSES, true)) {
        $where[] = 'o.status = :status';
        $params[':status'] = $status;
    }

    $whereSql = implode(' AND ', $where);

    /* ── Count (unfiltered total too, for summary chips) ─────── */
    $countSql   = "SELECT COUNT(*) FROM orders o WHERE {$whereSql}";
    $countStmt  = $pdo->prepare($countSql);
    $countStmt->execute($params);
    $totalFiltered = (int)$countStmt->fetchColumn();

    $allCountSql  = "SELECT COUNT(*) FROM orders WHERE deleted_at IS NULL";
    $allCountStmt = $pdo->prepare($allCountSql);
    $allCountStmt->execute();
    $totalAll = (int)$allCountStmt->fetchColumn();

    /* ── Status counts (for summary chips on the frontend) ───── */
    $statusCounts = array_fill_keys(VALID_STATUSES, 0);
    if ($search === '') {
        $scSql  = "SELECT status, COUNT(*) AS cnt FROM orders WHERE deleted_at IS NULL GROUP BY status";
        $scStmt = $pdo->query($scSql);
        while ($row = $scStmt->fetch(PDO::FETCH_ASSOC)) {
            if (isset($statusCounts[$row['status']])) {
                $statusCounts[$row['status']] = (int)$row['cnt'];
            }
        }
    } else {
        // When searching, count per-status within the search context
        $scSql  = "SELECT status, COUNT(*) AS cnt FROM orders o WHERE {$whereSql} GROUP BY status";
        $scStmt = $pdo->prepare($scSql);
        $scStmt->execute($params);
        while ($row = $scStmt->fetch(PDO::FETCH_ASSOC)) {
            if (isset($statusCounts[$row['status']])) {
                $statusCounts[$row['status']] = (int)$row['cnt'];
            }
        }
    }

    /* ── Fetch page of orders ────────────────────────────────── */
    $sql = "SELECT
                o.id,
                o.customer_name   AS customerName,
                o.customer_email  AS customerEmail,
                o.customer_phone  AS customerPhone,
                o.shipping_address AS shippingAddress,
                o.status,
                o.total,
                o.shipping_cost   AS shipping,
                o.notes,
                o.created_at      AS date
            FROM orders o
            WHERE {$whereSql}
            ORDER BY o.created_at DESC
            LIMIT :limit OFFSET :offset";

    $stmt = $pdo->prepare($sql);
    foreach ($params as $key => $val) {
        $stmt->bindValue($key, $val);
    }
    $stmt->bindValue(':limit',  $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset,  PDO::PARAM_INT);
    $stmt->execute();

    $orders = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $row['date']  = formatDate($row['date']);
        $row['total'] = number_format((float)$row['total'], 2, '.', '');

        // Fetch items for each order
        $itemStmt = $pdo->prepare("
            SELECT product_name AS name, quantity, price
            FROM order_items
            WHERE order_id = :oid
            ORDER BY id ASC
        ");
        $itemStmt->bindValue(':oid', $row['id']);
        $itemStmt->execute();

        $items = [];
        while ($item = $itemStmt->fetch(PDO::FETCH_ASSOC)) {
            $item['quantity'] = (int)$item['quantity'];
            $item['price']    = number_format((float)$item['price'], 2, '.', '');
            $items[] = $item;
        }
        $row['items'] = $items;
        $orders[] = $row;
    }

    jsonResponse([
        'orders'        => $orders,
        'total'         => $totalFiltered,
        'totalAll'      => $totalAll,
        'page'          => $page,
        'per_page'      => $perPage,
        'total_pages'   => (int)ceil($totalFiltered / $perPage),
        'status_counts' => $statusCounts,
    ]);
}


/* ================================================================
   ACTION: GET (single order)
   POST  action=get  &  { "id": "ORD-001" }
   ================================================================ */
function getOrder(PDO $pdo, array $payload): void
{
    $id = trim($payload['id'] ?? $_GET['id'] ?? '');
    if ($id === '') {
        jsonResponse(['error' => 'Order ID is required'], 400);
    }

    $stmt = $pdo->prepare("
        SELECT
            id,
            customer_name   AS customerName,
            customer_email  AS customerEmail,
            customer_phone  AS customerPhone,
            shipping_address AS shippingAddress,
            status,
            total,
            shipping_cost   AS shipping,
            notes,
            created_at      AS date
        FROM orders
        WHERE id = :id AND deleted_at IS NULL
        LIMIT 1
    ");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $order = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$order) {
        jsonResponse(['error' => 'Order not found'], 404);
    }

    $order['date']  = formatDate($order['date']);
    $order['total'] = number_format((float)$order['total'], 2, '.', '');

    // Items
    $itemStmt = $pdo->prepare("
        SELECT product_name AS name, quantity, price
        FROM order_items
        WHERE order_id = :oid
        ORDER BY id ASC
    ");
    $itemStmt->bindValue(':oid', $id);
    $itemStmt->execute();

    $items = [];
    while ($item = $itemStmt->fetch(PDO::FETCH_ASSOC)) {
        $item['quantity'] = (int)$item['quantity'];
        $item['price']    = number_format((float)$item['price'], 2, '.', '');
        $items[] = $item;
    }
    $order['items'] = $items;

    jsonResponse(['order' => $order]);
}


/* ================================================================
   ACTION: UPDATE STATUS
   POST  action=update_status  &  { "id": "ORD-001", "status": "shipped" }
   ================================================================ */
function updateStatus(PDO $pdo, array $payload): void
{
    $id     = trim($payload['id']     ?? '');
    $status = trim($payload['status'] ?? '');

    if ($id === '') {
        jsonResponse(['error' => 'Order ID is required'], 400);
    }
    if (!in_array($status, VALID_STATUSES, true)) {
        jsonResponse(['error' => 'Invalid status. Must be one of: ' . implode(', ', VALID_STATUSES)], 400);
    }

    // Verify order exists and is not deleted
    $check = $pdo->prepare("SELECT id, status FROM orders WHERE id = :id AND deleted_at IS NULL LIMIT 1");
    $check->bindValue(':id', $id);
    $check->execute();
    $existing = $check->fetch(PDO::FETCH_ASSOC);

    if (!$existing) {
        jsonResponse(['error' => 'Order not found'], 404);
    }

    $oldStatus = $existing['status'];
    if ($oldStatus === $status) {
        jsonResponse(['message' => 'Status is already "' . $status . '"', 'unchanged' => true], 200);
    }

    // Prevent re-activating cancelled/delivered unless explicitly going back
    // (Optional business rule — remove if you want full flexibility)

    $stmt = $pdo->prepare("
        UPDATE orders
        SET status = :status,
            updated_at = NOW()
        WHERE id = :id AND deleted_at IS NULL
    ");
    $stmt->bindValue(':status', $status);
    $stmt->bindValue(':id',     $id);
    $stmt->execute();

    if ($stmt->rowCount() === 0) {
        jsonResponse(['error' => 'Failed to update order status'], 500);
    }

    jsonResponse([
        'message'    => 'Order status updated successfully',
        'id'         => $id,
        'old_status' => $oldStatus,
        'new_status' => $status,
    ]);
}


/* ================================================================
   ACTION: DELETE (soft delete)
   POST  action=delete  &  { "id": "ORD-001" }
   ================================================================ */
function deleteOrder(PDO $pdo, array $payload): void
{
    $id = trim($payload['id'] ?? '');
    if ($id === '') {
        jsonResponse(['error' => 'Order ID is required'], 400);
    }

    $check = $pdo->prepare("SELECT id FROM orders WHERE id = :id AND deleted_at IS NULL LIMIT 1");
    $check->bindValue(':id', $id);
    $check->execute();

    if (!$check->fetch()) {
        jsonResponse(['error' => 'Order not found or already deleted'], 404);
    }

    $stmt = $pdo->prepare("
        UPDATE orders
        SET deleted_at = NOW(),
            updated_at = NOW()
        WHERE id = :id AND deleted_at IS NULL
    ");
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    if ($stmt->rowCount() === 0) {
        jsonResponse(['error' => 'Failed to delete order'], 500);
    }

    jsonResponse([
        'message' => 'Order deleted successfully',
        'id'      => $id,
    ]);
}