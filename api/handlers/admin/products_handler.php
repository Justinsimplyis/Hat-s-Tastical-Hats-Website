<?php
/*
 * products_handler.php
 * 
 * Handles all product and category API requests for the admin dashboard.
 * Expects Db-connection.php to provide a PDO instance as $pdo.
 * 
 * Supported actions (via ?action= or POST body):
 *   list              — Paginated, searchable, filterable product listing
 *   get               — Single product with all images
 *   create            — New product with image uploads
 *   update            — Update product, replace/add/remove images
 *   delete            — Hard-delete product and its images
 *   list_categories   — All categories
 *   create_category   — New category
 *   update_category   — Rename / re-slug a category
 *   delete_category   — Delete category (products lose category)
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

/* ── Constants ───────────────────────────────────────────────── */
define('UPLOAD_FS_DIR',  __DIR__ . '/../../assets/images/products/');
define('UPLOAD_WEB_PATH', '/assets/images/products/');
define('MIN_IMAGES', 5);
define('MAX_IMAGES', 10);
define('MAX_FILE_SIZE', 5 * 1024 * 1024); // 5 MB
define('ALLOWED_MIME', ['image/png', 'image/jpeg', 'image/webp']);
define('MIME_TO_EXT', [
    'image/png'  => 'png',
    'image/jpeg' => 'jpg',
    'image/webp' => 'webp',
]);

const VALID_STATUSES = ['in-stock', 'on-sale', 'low-stock', 'out-of-stock', 'featured', 'discontinued'];

/* ── Read input ──────────────────────────────────────────────── */
 $rawInput = file_get_contents('php://input');
 $payload  = json_decode($rawInput, true) ?? [];
 $action   = $_GET['action'] ?? $payload['action'] ?? $_POST['action'] ?? '';

/* ── Ensure upload directory exists ──────────────────────────── */
if (!is_dir(UPLOAD_FS_DIR)) {
    mkdir(UPLOAD_FS_DIR, 0755, true);
}

/* ── Response helper ─────────────────────────────────────────── */
function jsonResponse(array $data, int $code = 200): void
{
    http_response_code($code);
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit();
}

/* ── File upload helper ──────────────────────────────────────── */
function handleFileUploads(): array
{
    if (!isset($_FILES['images']) || !is_array($_FILES['images']['name'])) {
        return [];
    }

    $uploaded = [];
    $fileCount = is_array($_FILES['images']['name']) ? count($_FILES['images']['name']) : 1;
    $names     = $_FILES['images']['name'];
    $types     = $_FILES['images']['type'];
    $tmps      = $_FILES['images']['tmp_name'];
    $errors    = $_FILES['images']['error'];
    $sizes     = $_FILES['images']['size'];

    for ($i = 0; $i < $fileCount; $i++) {
        // Skip empty slots
        if ($errors[$i] === UPLOAD_ERR_NO_FILE) continue;

        if ($errors[$i] !== UPLOAD_ERR_OK) {
            throw new RuntimeException("Upload error on file #{$i}: error code {$errors[$i]}");
        }
        if ($sizes[$i] > MAX_FILE_SIZE) {
            throw new RuntimeException("File #{$i} exceeds 5 MB limit");
        }
        if (!in_array($types[$i], ALLOWED_MIME, true)) {
            throw new RuntimeException("File #{$i} has unsupported type: {$types[$i]}");
        }

        $ext  = MIME_TO_EXT[$types[$i]] ?? 'bin';
        $name = uniqid('prod_', true) . '_' . time() . '.' . $ext;
        $dest = UPLOAD_FS_DIR . $name;

        if (!move_uploaded_file($tmps[$i], $dest)) {
            throw new RuntimeException("Failed to move uploaded file #{$i}");
        }

        $uploaded[] = UPLOAD_WEB_PATH . $name;
    }

    return $uploaded;
}

/* ── Delete file from disk ───────────────────────────────────── */
function deleteFile(string $webPath): void
{
    // Convert web path to filesystem path
    $fsPath = str_replace(UPLOAD_WEB_PATH, UPLOAD_FS_DIR, $webPath);
    if (file_exists($fsPath) && is_file($fsPath)) {
        unlink($fsPath);
    }
}

/* ── Slug generator ──────────────────────────────────────────── */
function slugify(string $text): string
{
    $slug = strtolower(trim($text));
    $slug = preg_replace('/[^a-z0-9]+/i', '-', $slug);
    $slug = trim($slug, '-');
    return $slug ?: 'uncategorized';
}

/* ================================================================
   ROUTER
   ================================================================ */
try {
    switch ($action) {
        // ── Products ────────────────────────────────────────────
        case 'list':
            listProducts($pdo);
            break;
        case 'get':
            getProduct($pdo);
            break;
        case 'create':
            createProduct($pdo);
            break;
        case 'update':
            updateProduct($pdo);
            break;
        case 'delete':
            deleteProduct($pdo, $payload);
            break;

        // ── Categories ─────────────────────────────────────────
        case 'list_categories':
            listCategories($pdo);
            break;
        case 'create_category':
            createCategory($pdo, $payload);
            break;
        case 'update_category':
            updateCategory($pdo, $payload);
            break;
        case 'delete_category':
            deleteCategory($pdo, $payload);
            break;

        default:
            jsonResponse(['error' => "Invalid or missing action: '{$action}'"], 400);
    }
} catch (PDOException $e) {
    jsonResponse(['error' => 'Database error: ' . $e->getMessage()], 500);
} catch (RuntimeException $e) {
    jsonResponse(['error' => $e->getMessage()], 422);
} catch (Throwable $e) {
    jsonResponse(['error' => 'Server error: ' . $e->getMessage()], 500);
}


/* ================================================================
   ACTION: LIST PRODUCTS
   GET ?action=list&page=1&per_page=10&search=&category=&status=
   ================================================================ */
function listProducts(PDO $pdo): void
{
    $page    = max(1, (int)($_GET['page']     ?? 1));
    $perPage = min(100, max(1, (int)($_GET['per_page'] ?? 10)));
    $search  = trim($_GET['search']   ?? '');
    $catSlug = trim($_GET['category'] ?? '');
    $status  = trim($_GET['status']   ?? '');
    $offset  = ($page - 1) * $perPage;

    /* ── WHERE ───────────────────────────────────────────────── */
    $where  = ['p.deleted_at IS NULL'];
    $params = [];

    if ($search !== '') {
        $where[] = '(p.name LIKE :s1)';
        $params[':s1'] = "%{$search}%";
    }
    if ($catSlug !== '') {
        $where[] = 'p.category_slug = :cat';
        $params[':cat'] = $catSlug;
    }
    if ($status !== '' && in_array($status, VALID_STATUSES, true)) {
        $where[] = 'p.status = :status';
        $params[':status'] = $status;
    }
    $whereSql = implode(' AND ', $where);

    /* ── Count ───────────────────────────────────────────────── */
    $countStmt = $pdo->prepare("SELECT COUNT(*) FROM products p WHERE {$whereSql}");
    $countStmt->execute($params);
    $total = (int)$countStmt->fetchColumn();

    /* ── Fetch (first image only, via subquery) ──────────────── */
    $sql = "SELECT
                p.id,
                p.name,
                p.price,
                p.category_slug  AS category,
                p.status,
                p.description,
                p.created_at,
                (
                    SELECT pi.image_path
                    FROM product_images pi
                    WHERE pi.product_id = p.id
                    ORDER BY pi.sort_order ASC
                    LIMIT 1
                ) AS first_image
            FROM products p
            WHERE {$whereSql}
            ORDER BY p.created_at DESC
            LIMIT :lim OFFSET :off";

    $stmt = $pdo->prepare($sql);
    foreach ($params as $k => $v) $stmt->bindValue($k, $v);
    $stmt->bindValue(':lim', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':off', $offset,  PDO::PARAM_INT);
    $stmt->execute();

    $products = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $row['id']       = (string)$row['id'];
        $row['price']    = number_format((float)$row['price'], 2, '.', '');
        $row['images']   = $row['first_image'] ? [$row['first_image']] : [];
        unset($row['first_image'], $row['created_at']);
        $products[] = $row;
    }

    jsonResponse([
        'products'    => $products,
        'total'       => $total,
        'page'        => $page,
        'per_page'    => $perPage,
        'total_pages' => (int)ceil($total / $perPage),
    ]);
}


/* ================================================================
   ACTION: GET SINGLE PRODUCT
   GET ?action=get&id=5
   ================================================================ */
function getProduct(PDO $pdo): void
{
    $id = trim($_GET['id'] ?? '');
    if ($id === '' || !is_numeric($id)) {
        jsonResponse(['error' => 'Valid product ID is required'], 400);
    }

    $stmt = $pdo->prepare("
        SELECT id, name, price, category_slug AS category, description, status
        FROM products
        WHERE id = :id AND deleted_at IS NULL
        LIMIT 1
    ");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        jsonResponse(['error' => 'Product not found'], 404);
    }

    $product['id']    = (string)$product['id'];
    $product['price'] = number_format((float)$product['price'], 2, '.', '');

    // All images ordered
    $imgStmt = $pdo->prepare("
        SELECT image_path
        FROM product_images
        WHERE product_id = :id
        ORDER BY sort_order ASC
    ");
    $imgStmt->bindValue(':id', $id, PDO::PARAM_INT);
    $imgStmt->execute();
    $product['images'] = $imgStmt->fetchAll(PDO::FETCH_COLUMN);

    jsonResponse(['product' => $product]);
}


/* ================================================================
   ACTION: CREATE PRODUCT
   POST  multipart/form-data
        action=create
        name, price, category, description, status
        images[0], images[1], ...
   ================================================================ */
function createProduct(PDO $pdo): void
{
    $name        = trim($_POST['name']        ?? '');
    $price       = trim($_POST['price']       ?? '');
    $category    = trim($_POST['category']    ?? '');
    $description = trim($_POST['description'] ?? '');
    $status      = trim($_POST['status']      ?? '');

    /* ── Validate ────────────────────────────────────────────── */
    $errors = [];
    if ($name === '')        $errors['name']        = 'Product name is required';
    if ($price === '' || (float)$price <= 0) $errors['price'] = 'Enter a valid price';
    if ($category === '')    $errors['category']    = 'Select a category';
    if ($description === '') $errors['description'] = 'Description is required';
    if (!in_array($status, VALID_STATUSES, true)) $errors['status'] = 'Select a status';

    if (!empty($errors)) {
        jsonResponse(['error' => 'Validation failed', 'errors' => $errors], 422);
    }

    /* ── Handle uploads ──────────────────────────────────────── */
    try {
        $uploadedPaths = handleFileUploads();
    } catch (RuntimeException $e) {
        jsonResponse(['error' => $e->getMessage(), 'errors' => ['images' => $e->getMessage()]], 422);
    }

    if (count($uploadedPaths) < MIN_IMAGES) {
        // Clean up uploaded files if under minimum
        foreach ($uploadedPaths as $p) deleteFile($p);
        jsonResponse([
            'error'  => 'Validation failed',
            'errors' => ['images' => 'At least ' . MIN_IMAGES . ' images required (' . count($uploadedPaths) . '/' . MIN_IMAGES . ')']
        ], 422);
    }

    /* ── Insert product ──────────────────────────────────────── */
    $pdo->beginTransaction();

    try {
        $ins = $pdo->prepare("
            INSERT INTO products (name, price, category_slug, description, status, created_at, updated_at)
            VALUES (:name, :price, :cat, :desc, :status, NOW(), NOW())
        ");
        $ins->bindValue(':name',    $name);
        $ins->bindValue(':price',   (float)$price);
        $ins->bindValue(':cat',     $category);
        $ins->bindValue(':desc',    $description);
        $ins->bindValue(':status',  $status);
        $ins->execute();

        $productId = (string)$pdo->lastInsertId();

        // Insert image records
        $imgIns = $pdo->prepare("
            INSERT INTO product_images (product_id, image_path, sort_order, created_at)
            VALUES (:pid, :path, :ord, NOW())
        ");
        foreach ($uploadedPaths as $i => $path) {
            $imgIns->bindValue(':pid',  $productId, PDO::PARAM_INT);
            $imgIns->bindValue(':path', $path);
            $imgIns->bindValue(':ord',  $i, PDO::PARAM_INT);
            $imgIns->execute();
        }

        $pdo->commit();

        jsonResponse([
            'message'  => 'Product created successfully',
            'id'       => $productId,
            'images'   => $uploadedPaths,
        ], 201);

    } catch (Throwable $e) {
        $pdo->rollBack();
        // Clean up uploaded files on failure
        foreach ($uploadedPaths as $p) deleteFile($p);
        throw $e;
    }
}


/* ================================================================
   ACTION: UPDATE PRODUCT
   POST  multipart/form-data
        action=update
        id, name, price, category, description, status
        existing_images  (JSON string — paths to KEEP)
        images[0], images[1], ...  (NEW files)
   ================================================================ */
function updateProduct(PDO $pdo): void
{
    $id          = trim($_POST['id']          ?? '');
    $name        = trim($_POST['name']        ?? '');
    $price       = trim($_POST['price']       ?? '');
    $category    = trim($_POST['category']    ?? '');
    $description = trim($_POST['description'] ?? '');
    $status      = trim($_POST['status']      ?? '');

    if ($id === '' || !is_numeric($id)) {
        jsonResponse(['error' => 'Valid product ID is required'], 400);
    }

    /* ── Validate ────────────────────────────────────────────── */
    $errors = [];
    if ($name === '')        $errors['name']        = 'Product name is required';
    if ($price === '' || (float)$price <= 0) $errors['price'] = 'Enter a valid price';
    if ($category === '')    $errors['category']    = 'Select a category';
    if ($description === '') $errors['description'] = 'Description is required';
    if (!in_array($status, VALID_STATUSES, true)) $errors['status'] = 'Select a status';

    if (!empty($errors)) {
        jsonResponse(['error' => 'Validation failed', 'errors' => $errors], 422);
    }

    /* ── Existing images to keep (from frontend) ─────────────── */
    $keptPaths = json_decode($_POST['existing_images'] ?? '[]', true);
    if (!is_array($keptPaths)) $keptPaths = [];

    /* ── Handle new uploads ──────────────────────────────────── */
    try {
        $newPaths = handleFileUploads();
    } catch (RuntimeException $e) {
        jsonResponse(['error' => $e->getMessage(), 'errors' => ['images' => $e->getMessage()]], 422);
    }

    $totalImages = count($keptPaths) + count($newPaths);
    if ($totalImages < MIN_IMAGES) {
        // Clean up newly uploaded files
        foreach ($newPaths as $p) deleteFile($p);
        jsonResponse([
            'error'  => 'Validation failed',
            'errors' => ['images' => 'At least ' . MIN_IMAGES . ' images required (' . $totalImages . '/' . MIN_IMAGES . ')']
        ], 422);
    }

    /* ── Update product ──────────────────────────────────────── */
    $pdo->beginTransaction();

    try {
        // Verify product exists
        $check = $pdo->prepare("SELECT id FROM products WHERE id = :id AND deleted_at IS NULL LIMIT 1");
        $check->bindValue(':id', $id, PDO::PARAM_INT);
        $check->execute();
        if (!$check->fetch()) {
            $pdo->rollBack();
            jsonResponse(['error' => 'Product not found'], 404);
        }

        // Update product row
        $upd = $pdo->prepare("
            UPDATE products
            SET name = :name, price = :price, category_slug = :cat,
                description = :desc, status = :status, updated_at = NOW()
            WHERE id = :id AND deleted_at IS NULL
        ");
        $upd->bindValue(':name', $name);
        $upd->bindValue(':price', (float)$price);
        $upd->bindValue(':cat',   $category);
        $upd->bindValue(':desc',  $description);
        $upd->bindValue(':status',$status);
        $upd->bindValue(':id',    $id, PDO::PARAM_INT);
        $upd->execute();

        // Find images to REMOVE (in DB but NOT in keptPaths)
        $curStmt = $pdo->prepare("SELECT id, image_path FROM product_images WHERE product_id = :id ORDER BY sort_order ASC");
        $curStmt->bindValue(':id', $id, PDO::PARAM_INT);
        $curStmt->execute();
        $currentImages = $curStmt->fetchAll(PDO::FETCH_ASSOC);

        $delStmt = $pdo->prepare("DELETE FROM product_images WHERE id = :img_id");
        foreach ($currentImages as $img) {
            if (!in_array($img['image_path'], $keptPaths, true)) {
                $delStmt->bindValue(':img_id', $img['id'], PDO::PARAM_INT);
                $delStmt->execute();
                deleteFile($img['image_path']);
            }
        }

        // Insert new image records
        $imgIns = $pdo->prepare("
            INSERT INTO product_images (product_id, image_path, sort_order, created_at)
            VALUES (:pid, :path, :ord, NOW())
        ");
        $sortStart = count($keptPaths);
        foreach ($newPaths as $i => $path) {
            $imgIns->bindValue(':pid',  $id, PDO::PARAM_INT);
            $imgIns->bindValue(':path', $path);
            $imgIns->bindValue(':ord',  $sortStart + $i, PDO::PARAM_INT);
            $imgIns->execute();
        }

        $pdo->commit();

        // Build final images array for response
        $allImages = array_values($keptPaths) + array_values($newPaths);

        jsonResponse([
            'message' => 'Product updated successfully',
            'id'      => $id,
            'images'  => $allImages,
        ]);

    } catch (Throwable $e) {
        $pdo->rollBack();
        foreach ($newPaths as $p) deleteFile($p);
        throw $e;
    }
}


/* ================================================================
   ACTION: DELETE PRODUCT
   POST JSON  { action: "delete", id: "5" }
   Hard-deletes product and removes images from disk.
   ================================================================ */
function deleteProduct(PDO $pdo, array $payload): void
{
    $id = trim($payload['id'] ?? '');
    if ($id === '' || !is_numeric($id)) {
        jsonResponse(['error' => 'Valid product ID is required'], 400);
    }

    $pdo->beginTransaction();

    try {
        // Get images before deleting
        $imgStmt = $pdo->prepare("SELECT image_path FROM product_images WHERE product_id = :id");
        $imgStmt->bindValue(':id', $id, PDO::PARAM_INT);
        $imgStmt->execute();
        $images = $imgStmt->fetchAll(PDO::FETCH_COLUMN);

        // Delete product (CASCADE will remove image records)
        $del = $pdo->prepare("DELETE FROM products WHERE id = :id AND deleted_at IS NULL");
        $del->bindValue(':id', $id, PDO::PARAM_INT);
        $del->execute();

        if ($del->rowCount() === 0) {
            $pdo->rollBack();
            jsonResponse(['error' => 'Product not found or already deleted'], 404);
        }

        // Remove files from disk
        foreach ($images as $path) {
            deleteFile($path);
        }

        $pdo->commit();

        jsonResponse([
            'message' => 'Product deleted successfully',
            'id'      => $id,
        ]);

    } catch (Throwable $e) {
        $pdo->rollBack();
        throw $e;
    }
}


/* ================================================================
   ACTION: LIST CATEGORIES
   GET ?action=list_categories
   ================================================================ */
function listCategories(PDO $pdo): void
{
    $stmt = $pdo->query("SELECT slug AS id, name FROM categories ORDER BY name ASC");
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    jsonResponse(['categories' => $categories]);
}


/* ================================================================
   ACTION: CREATE CATEGORY
   POST JSON  { action: "create_category", name: "Beret" }
   ================================================================ */
function createCategory(PDO $pdo, array $payload): void
{
    $name = trim($payload['name'] ?? '');
    if ($name === '') {
        jsonResponse(['error' => 'Category name is required'], 400);
    }

    $slug = slugify($name);

    // Check uniqueness
    $check = $pdo->prepare("SELECT slug FROM categories WHERE slug = :slug");
    $check->bindValue(':slug', $slug);
    $check->execute();
    if ($check->fetch()) {
        jsonResponse(['error' => 'Category already exists'], 409);
    }

    $ins = $pdo->prepare("INSERT INTO categories (slug, name, created_at, updated_at) VALUES (:slug, :name, NOW(), NOW())");
    $ins->bindValue(':slug', $slug);
    $ins->bindValue(':name', $name);
    $ins->execute();

    jsonResponse([
        'message' => 'Category created successfully',
        'category' => ['id' => $slug, 'name' => $name],
    ], 201);
}


/* ================================================================
   ACTION: UPDATE CATEGORY
   POST JSON  { action: "update_category", id: "fedora", name: "Wide Brim Fedora" }
   ================================================================ */
function updateCategory(PDO $pdo, array $payload): void
{
    $id   = trim($payload['id']   ?? '');
    $name = trim($payload['name'] ?? '');

    if ($id === '')   jsonResponse(['error' => 'Category ID is required'], 400);
    if ($name === '') jsonResponse(['error' => 'Category name is required'], 400);

    $newSlug = slugify($name);

    // Check slug uniqueness (exclude current)
    $check = $pdo->prepare("SELECT slug FROM categories WHERE slug = :slug AND slug != :old");
    $check->bindValue(':slug', $newSlug);
    $check->bindValue(':old',  $id);
    $check->execute();
    if ($check->fetch()) {
        jsonResponse(['error' => 'A category with that name already exists'], 409);
    }

    $oldSlug = $id;

    $pdo->beginTransaction();

    try {
        // Update category
        $upd = $pdo->prepare("UPDATE categories SET slug = :slug, name = :name, updated_at = NOW() WHERE slug = :old");
        $upd->bindValue(':slug', $newSlug);
        $upd->bindValue(':name', $name);
        $upd->bindValue(':old',  $oldSlug);
        $upd->execute();

        if ($upd->rowCount() === 0) {
            $pdo->rollBack();
            jsonResponse(['error' => 'Category not found'], 404);
        }

        // Update products that used the old slug
        $prodUpd = $pdo->prepare("UPDATE products SET category_slug = :new WHERE category_slug = :old");
        $prodUpd->bindValue(':new', $newSlug);
        $prodUpd->bindValue(':old', $oldSlug);
        $prodUpd->execute();

        $pdo->commit();

        jsonResponse([
            'message'    => 'Category updated successfully',
            'category'   => ['id' => $newSlug, 'name' => $name],
            'old_slug'   => $oldSlug,
            'new_slug'   => $newSlug,
            'updated_products' => $prodUpd->rowCount(),
        ]);

    } catch (Throwable $e) {
        $pdo->rollBack();
        throw $e;
    }
}


/* ================================================================
   ACTION: DELETE CATEGORY
   POST JSON  { action: "delete_category", id: "fedora" }
   Products with this category will have category set to NULL.
   ================================================================ */
function deleteCategory(PDO $pdo, array $payload): void
{
    $id = trim($payload['id'] ?? '');
    if ($id === '') {
        jsonResponse(['error' => 'Category ID is required'], 400);
    }

    $del = $pdo->prepare("DELETE FROM categories WHERE slug = :slug");
    $del->bindValue(':slug', $id);
    $del->execute();

    if ($del->rowCount() === 0) {
        jsonResponse(['error' => 'Category not found'], 404);
    }

    // Products with ON DELETE SET NULL will automatically lose their category.
    // No manual update needed if the FK is configured correctly.

    jsonResponse([
        'message' => 'Category deleted successfully',
        'id'      => $id,
    ]);
}