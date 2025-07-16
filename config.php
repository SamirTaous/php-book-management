<?php

$servername = "localhost";
$username = "samirtaous";
$password = "";
$db = "php_chat";

// Create Connection

$conn = new mysqli($servername, $username, $password, $db);

// Check Connection

if($conn == false){
    die("Error: Connection error". $conn->connect_error());
}

// Create Users Table

function create_users_table($var){
    $var->query("CREATE TABLE IF NOT EXISTS users (
                id INT PRIMARY KEY,
                username VARCHAR(255),
                password VARCHAR(255)
                )");
}




