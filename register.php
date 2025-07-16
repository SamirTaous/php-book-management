<?php

require_once("session.php");
require_once("config.php");

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['username'])){
    
    // Get Raw data from the form
    $submitted_username = $_POST['username'];
    $submitted_password = $_POST['password'];
    $hashed_password = password_hash($submitted_password, PASSWORD_DEFAULT);
    
    // Prepare the SQL Statement 

    $sql = ("INSERT INTO users(username,password) VALUES(?,?);");
    $stmt = $conn->prepare($sql);

    // Bind the user parameters to the placeholders

    $stmt->bind_param("ss",$submitted_username,$hashed_password);

    // Execute the statement and check for success

    if($stmt->execute()){
        echo "User registered successfully, you can now log in";
    }
    else{
        echo "User not registered, please try again";
    }

    // Closing the statement and connection

    $stmt->close();
    $conn->close();

    header("location: authenticate.php");
}

?>