<?php

session_start();

// Unset all of the session variables.
 $_SESSION = array();

// If it's desired to kill the session cookie, this must be done before destroying the session.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, // Set expiration to the past
        $params["path"], $params["domain"], 
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session completely.
session_destroy();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3;url=/index.php"> <!-- Auto-redirect after 3 seconds -->
    <title>Logged Out</title>
    <style>
        /* Minimal dark theme styling to match the rest of the app */
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            background: #131011;
            color: #ECE4E2;
            text-align: center;
            padding: 20px;
        }
        .icon-circle {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: rgba(107, 203, 139, 0.12);
            color: #6BCB8B;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            margin-bottom: 20px;
        }
        h1 {
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0 0 8px 0;
        }
        p {
            color: #A8999C;
            font-size: 0.9rem;
            margin: 0 0 30px 0;
        }
        .btn-home {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 24px;
            background: #C93B39;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.9rem;
            transition: background 0.2s ease;
        }
        .btn-home:hover {
            background: #DA4E4C;
        }
    </style>
</head>
<body>

    <div class="icon-circle">
        <i class="fa-solid fa-right-from-bracket"></i>
    </div>
    
    <h1>You have been logged out</h1>
    <p>You will be redirected to the main page shortly.</p>
    
    <a href="/index.php" class="btn-home">
        <i class="fa-solid fa-house"></i>
        Main Page
    </a>

</body>
</html>