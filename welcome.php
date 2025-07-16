<?php
require_once("session.php");

// Redirect to login if user is not logged in
if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}

// Get username from session to display it
$username = $_SESSION['username'] ?? 'User'; // Use a fallback
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Welcome</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="form-container">
            <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
            <p style="margin-bottom: 2rem;">You have successfully logged in.</p>
            <a href="logout.php" class="button" style="text-decoration: none;">Logout</a>
        </div>
    </body>
</html>