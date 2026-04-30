<?php
declare(strict_types=1);

// ====================================================================
// Hattie's Hat'istical Hats — Admin Profile Handler
// ====================================================================

session_start();
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle Preflight
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// --------------------------------------------------------------------
// Dependencies & Setup
// --------------------------------------------------------------------
require_once __DIR__ . '/../../database/db_connection.php';

// Response Helper
function respond(bool $success, string $message, array $data = []): void {
    http_response_code($success ? 200 : 400);
    echo json_encode(array_merge(['success' => $success, 'message' => $message], $data));
    exit;
}

// --------------------------------------------------------------------
// Authentication Check
// --------------------------------------------------------------------
if (!isset($_SESSION['admin_id'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Unauthorized. Please log in.']);
    exit;
}

 $adminId = (int) $_SESSION['admin_id'];
 $method = $_SERVER['REQUEST_METHOD'];

try {
    // =================================================================
    // ROUTING
    // =================================================================
    switch ($method) {
        case 'GET':
            handleGetProfile($pdo, $adminId);
            break;

        case 'POST':
            // Determine if this is a file upload or JSON data
            $contentType = $_SERVER['CONTENT_TYPE'] ?? '';
            
            if (strpos($contentType, 'multipart/form-data') !== false && isset($_FILES['avatar'])) {
                handleUploadAvatar($pdo, $adminId);
            } else {
                // Fallback to reading JSON body
                $input = json_decode(file_get_contents('php://input'), true);
                $action = $input['action'] ?? ($_POST['action'] ?? '');

                switch ($action) {
                    case 'update_info':
                        handleUpdateInfo($pdo, $adminId, $input);
                        break;
                    case 'change_password':
                        handleChangePassword($pdo, $adminId, $input);
                        break;
                    case 'remove_avatar':
                        handleRemoveAvatar($pdo, $adminId);
                        break;
                    default:
                        respond(false, 'Invalid action specified.');
                }
            }
            break;

        case 'DELETE':
            handleDeleteAccount($pdo, $adminId);
            break;

        default:
            respond(false, 'Method not allowed.');
    }

} catch (PDOException $e) {
    // Log real error locally, send generic message to client
    error_log("Profile Handler PDO Error: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'A database error occurred.']);
} catch (Exception $e) {
    error_log("Profile Handler General Error: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}

// =================================================================
// HANDLER FUNCTIONS
// =================================================================

/**
 * GET: Fetch admin profile data
 */
function handleGetProfile(PDO $pdo, int $adminId): void {
    $stmt = $pdo->prepare("
        SELECT first_name, surname, email, phone, avatar_path, created_at, last_login 
        FROM admins 
        WHERE id = ?
    ");
    $stmt->execute([$adminId]);
    $admin = $stmt->fetch();

    if (!$admin) {
        respond(false, 'Admin account not found.');
    }

    // Format dates nicely for the frontend
    $admin['joined'] = $admin['created_at'] ? date('M d, Y', strtotime($admin['created_at'])) : '—';
    $admin['last_login'] = $admin['last_login'] ? date('M d, Y H:i', strtotime($admin['last_login'])) : '—';
    
    // Generate initials for frontend fallback
    $admin['initials'] = strtoupper(substr($admin['first_name'], 0, 1) . substr($admin['surname'], 0, 1));

    respond(true, 'Profile fetched successfully.', ['profile' => $admin]);
}

/**
 * POST: Update Personal Information
 */
function handleUpdateInfo(PDO $pdo, int $adminId, array $input): void {
    $firstName = trim($input['firstName'] ?? '');
    $surname   = trim($input['surname'] ?? '');
    $email     = trim($input['email'] ?? '');
    $phone     = trim($input['phone'] ?? '');

    // Validation
    if (empty($firstName) || empty($surname)) {
        respond(false, 'First name and surname are required.');
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        respond(false, 'Please enter a valid email address.');
    }

    // Check if email is taken by another user
    $stmt = $pdo->prepare("SELECT id FROM admins WHERE email = ? AND id != ?");
    $stmt->execute([$email, $adminId]);
    if ($stmt->fetch()) {
        respond(false, 'This email is already in use by another account.');
    }

    $stmt = $pdo->prepare("
        UPDATE admins 
        SET first_name = ?, surname = ?, email = ?, phone = ? 
        WHERE id = ?
    ");
    $stmt->execute([$firstName, $surname, $email, $phone, $adminId]);

    respond(true, 'Profile updated successfully.');
}

/**
 * POST: Change Password
 */
function handleChangePassword(PDO $pdo, int $adminId, array $input): void {
    $currentPassword = $input['current_password'] ?? '';
    $newPassword     = $input['new_password'] ?? '';

    if (empty($currentPassword) || empty($newPassword)) {
        respond(false, 'Current and new passwords are required.');
    }

    if (strlen($newPassword) < 8) {
        respond(false, 'New password must be at least 8 characters long.');
    }

    // Fetch current hash
    $stmt = $pdo->prepare("SELECT password_hash FROM admins WHERE id = ?");
    $stmt->execute([$adminId]);
    $admin = $stmt->fetch();

    if (!$admin || !password_verify($currentPassword, $admin['password_hash'])) {
        respond(false, 'Current password is incorrect.');
    }

    // Hash and update
    $newHash = password_hash($newPassword, PASSWORD_BCRYPT);
    $stmt = $pdo->prepare("UPDATE admins SET password_hash = ? WHERE id = ?");
    $stmt->execute([$newHash, $adminId]);

    respond(true, 'Password updated successfully.');
}

/**
 * POST: Upload Avatar
 */
function handleUploadAvatar(PDO $pdo, int $adminId): void {
    $file = $_FILES['avatar'];
    
    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        respond(false, 'File upload failed. Please try again.');
    }

    // Validate Size (5MB Max)
    if ($file['size'] > 5 * 1024 * 1024) {
        respond(false, 'Image must be under 5MB.');
    }

    // Validate MIME Type strictly
    $allowedMimes = ['image/png', 'image/jpeg', 'image/webp'];
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($file['tmp_name']);
    
    if (!in_array($mime, $allowedMimes)) {
        respond(false, 'Invalid file type. Only PNG, JPG, and WEBP are allowed.');
    }

    // Generate safe filename and path
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $newFilename = 'admin_' . $adminId . '_' . bin2hex(random_bytes(8)) . '.' . $ext;
    $uploadDir = __DIR__ . '/../../uploads/avatars/';
    
    // Create directory if it doesn't exist
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $destination = $uploadDir . $newFilename;

    // Remove old avatar before moving new one
    handleRemoveAvatarFiles($pdo, $adminId);

    if (move_uploaded_file($file['tmp_name'], $destination)) {
        // Save path to database (relative to web root)
        $dbPath = '/uploads/avatars/' . $newFilename;
        $stmt = $pdo->prepare("UPDATE admins SET avatar_path = ? WHERE id = ?");
        $stmt->execute([$dbPath, $adminId]);

        respond(true, 'Avatar uploaded successfully.', ['avatar_path' => $dbPath]);
    } else {
        respond(false, 'Failed to save uploaded file.');
    }
}

/**
 * POST: Remove Avatar
 */
function handleRemoveAvatar(PDO $pdo, int $adminId): void {
    handleRemoveAvatarFiles($pdo, $adminId);
    
    $stmt = $pdo->prepare("UPDATE admins SET avatar_path = NULL WHERE id = ?");
    $stmt->execute([$adminId]);

    respond(true, 'Avatar removed successfully.');
}

/**
 * Helper: Actually delete the avatar files from the server
 */
function handleRemoveAvatarFiles(PDO $pdo, int $adminId): void {
    $stmt = $pdo->prepare("SELECT avatar_path FROM admins WHERE id = ?");
    $stmt->execute([$adminId]);
    $admin = $stmt->fetch();

    if ($admin && !empty($admin['avatar_path'])) {
        $filePath = __DIR__ . '/../../assets/images/profiles/admin/' . $admin['avatar_path'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
}

/**
 * DELETE: Delete Account
 */
function handleDeleteAccount(PDO $pdo, int $adminId): void {
    // 1. Remove avatar files
    handleRemoveAvatarFiles($pdo, $adminId);

    // 2. Delete the admin record
    $stmt = $pdo->prepare("DELETE FROM admins WHERE id = ?");
    $stmt->execute([$adminId]);

    // 3. Destroy session
    session_unset();
    session_destroy();

    respond(true, 'Account deleted successfully.');
}