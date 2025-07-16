<?php

require_once("session.php");
require_once("config.php");

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
    $submitted_username = $_POST['username'];
    $submitted_password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$submitted_username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if($row){
        if(password_verify($submitted_password,$row['password'])){
            $_SESSION['userid']=$row['id'];
            $_SESSION['user']=$row;
            echo "User logged in successfully.";
            header("location: welcome.php");
        }
        else {
            echo "Password is incorrect, please try again";
        }
    }
    else {
        echo "User does not exist in the database, try another user";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="form-container">
            <h1>Login to Your Account</h1>
            <form action="" method="post">
                <div class="form-row">
                    <label for="username">Username</label>
                    <input id="username" type="text" name="username" required>
                </div>
                <div class="form-row">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required>
                </div>
                <input class="button" type="submit" value="Login" name="submit">
            </form>
        </div>
    </body>
</html>