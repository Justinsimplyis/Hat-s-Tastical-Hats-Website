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
    <link rel="stylesheet" href="/assets/css/logout.css">
    <title>Logged Out</title>
    
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