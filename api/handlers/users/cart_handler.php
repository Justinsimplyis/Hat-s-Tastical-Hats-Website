<?php
/**
 * Cart Handler — Processes cart mutations via JSON POST
 *
 * Expected JSON body:
 *   { "action": "update_qty", "item_id": 123, "qty": 3 }
 *   { "action": "remove",     "item_id": 123 }
 *   { "action": "clear" }
 *
 * Responses (JSON):
 *   Success: { "success": true }
 *   Failure: { "success": false, "message": "..." }
 *   Removed: { "success": false, "removed": true, "message": "Product no longer available" }
 *
 * Required database tables:
 *   cart     — id, user_id, product_id, qty, created_at
 *   products — id, name, price, stock, is_active, image
 *
 * Required session:
 *   $_SESSION['user_id'] — set during login
 */

declare(strict_types=1);

// ── Headers ──────────────────────────────────────────────────
header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');

// Handle CORS preflight (if ever called cross-origin)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

// ── Method check ─────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// ── Session ──────────────────────────────────────────────────
session_start();

if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Not authenticated']);
    exit;
}

 $userId = (int) $_SESSION['user_id'];

// ── Parse JSON input ─────────────────────────────────────────
 $rawInput = file_get_contents('php://input');

if (empty($rawInput)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Empty request body']);
    exit;
}

 $input = json_decode($rawInput, true);

if (!is_array($input) || !isset($input['action']) || !is_string($input['action'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid request — action is required']);
    exit;
}

 $action = trim($input['action']);

// ── Database connection ──────────────────────────────────────
require_once __DIR__ . '/../config/database.php';

if (!isset($pdo) || !($pdo instanceof PDO)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit;
}

 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// ── Allowed actions ──────────────────────────────────────────
 $allowedActions = ['update_qty', 'remove', 'clear'];

if (!in_array($action, $allowedActions, true)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid action: ' . $action]);
    exit;
}

// ── Response helper ──────────────────────────────────────────
function respond(bool $success, string $message, array $extra = []): void {
    $response = array_merge(['success' => $success, 'message' => $message], $extra);
    echo json_encode($response);
    exit;
}

// ════════════════════════════════════════════════════════════
// ACTION: UPDATE QTY
// ════════════════════════════════════════════════════════════
if ($action === 'update_qty') {

    // Validate item_id
    if (!isset($input['item_id']) || !is_numeric($input['item_id'])) {
        respond(false, 'Invalid item ID');
    }

    // Validate qty
    if (!isset($input['qty']) || !is_numeric($input['qty'])) {
        respond(false, 'Invalid quantity');
    }

    $itemId = (int) $input['item_id'];
    $newQty  = (int) $input['qty'];

    if ($itemId <= 0) {
        respond(false, 'Invalid item ID');
    }

    if ($newQty < 1 || $newQty > 99) {
        respond(false, 'Quantity must be between 1 and 99');
    }

    // Fetch the cart item and verify ownership
    $stmt = $pdo->prepare("
        SELECT c.id, c.product_id, c.qty, p.name AS product_name, p.stock, p.is_active
        FROM cart c
        INNER JOIN products p ON p.id = c.product_id
        WHERE c.id = :cart_id AND c.user_id = :user_id
        LIMIT 1
    ");
    $stmt->execute([':cart_id' => $itemId, ':user_id' => $userId]);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$item) {
        respond(false, 'Cart item not found');
    }

    // Check if product is still active
    if (!(bool) $item['is_active']) {
        // Remove the inactive product from cart and tell the frontend
        $del = $pdo->prepare("DELETE FROM cart WHERE id = :id AND user_id = :user_id");
        $del->execute([':id' => $itemId, ':user_id' => $userId]);
        respond(false, 'Product "' . $item['product_name'] . '" is no longer available', ['removed' => true]);
    }

    // Check stock
    $stock = (int) $item['stock'];
    if ($stock >= 0 && $newQty > $stock) {
        respond(false, 'Only ' . $stock . ' in stock — quantity adjusted');
    }

    // Update quantity
    $upd = $pdo->prepare("UPDATE cart SET qty = :qty WHERE id = :id AND user_id = :user_id");
    $upd->execute([':qty' => $newQty, ':id' => $itemId, ':user_id' => $userId]);

    respond(true, 'Quantity updated');
}

// ════════════════════════════════════════════════════════════
// ACTION: REMOVE
// ════════════════════════════════════════════════════════════
if ($action === 'remove') {

    if (!isset($input['item_id']) || !is_numeric($input['item_id'])) {
        respond(false, 'Invalid item ID');
    }

    $itemId = (int) $input['item_id'];

    if ($itemId <= 0) {
        respond(false, 'Invalid item ID');
    }

    // Verify ownership before deleting
    $check = $pdo->prepare("SELECT id FROM cart WHERE id = :id AND user_id = :user_id LIMIT 1");
    $check->execute([':id' => $itemId, ':user_id' => $userId]);

    if (!$check->fetch()) {
        respond(false, 'Cart item not found');
    }

    $del = $pdo->prepare("DELETE FROM cart WHERE id = :id AND user_id = :user_id");
    $del->execute([':id' => $itemId, ':user_id' => $userId]);

    respond(true, 'Item removed');
}

// ════════════════════════════════════════════════════════════
// ACTION: CLEAR
// ════════════════════════════════════════════════════════════
if ($action === 'clear') {

    $del = $pdo->prepare("DELETE FROM cart WHERE user_id = :user_id");
    $del->execute([':user_id' => $userId]);

    $count = $del->rowCount();

    respond(true, $count > 0 ? 'Cart cleared' : 'Cart was already empty');
}