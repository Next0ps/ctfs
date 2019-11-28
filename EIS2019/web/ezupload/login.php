<?php
#error_reporting(0);
session_start();
include "config.php";

$username = $_POST['username'];
$password = $_POST['password'];
if (isset($username)){
    $sql = "select password from user where name=?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($dpasswd);
        $stmt->fetch();
        if ($dpasswd === $password){
	    $_SESSION['login'] = 1;
            header("Location: /upload.php");
        }else{
            die("login failed");
        }
        $stmt->close();
    }
}else{
    header("Location: /index.php");
}

$mysqli->close();


