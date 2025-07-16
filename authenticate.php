<?php

$servername = "localhost";
$username = "samirtaous";
$password = "";
$db = "php_chat";

// Create Connection

$conn = new mysqli($servername, $username, $password, $db);

// Login Logic

echo $_SERVER["REQUEST_METHOD"];

if(isset($_POST['username'])){
    $submitted_username = $_POST['username'];
    echo "Thank you for registering! Your submitted username was: " . htmlspecialchars($submitted_username);
}
else{
    echo "Username doesn't exist in the Post request";
}
?>
