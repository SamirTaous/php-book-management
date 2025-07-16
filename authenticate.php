<?php

require_once("config.php");

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
    $submitted_username = $_POST['username'];
    $submitted_password = $_POST['password'];
    $hashed_password = password_hash($submitted_password,PASSWORD_DEFAULT);

    
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt = bind_param("s",$submitted_username);
    $show = $stmt->execute();
    echo "$show"; 
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <h2>Login with your account</h2>
        <form action="" method="post">
            <label for="username"> Username :</label>
            <input id="username" type="text" name="username"></input>
            <br>
            <label for="password"> Password :</label>
            <input id="password" type="password" name="password"></input>
            <br>
            <input type="submit" value="Submit"></input>
        </form>
    </body>
</html>