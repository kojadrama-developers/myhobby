<?php
session_start();
require "includes/db_config.php";
$expiry=time()+(86400*30);
if(isset($_POST['login_btn'])){
    $email=mysqli_real_escape_string($connection,$_POST['email']);
    $password=mysqli_real_escape_string($connection,$_POST['password']);

    $password=md5($password);
    $sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
    $query=mysqli_query($connection,$sql);

    if(mysqli_num_rows($query)==1){
        if(isset($_SESSION['email'])){
            echo "You are logged in";
        }
        header("Location: index.php");
    }
    else{
        $_SESSION['message']="Email or password is incorrect!";
    }
}
?>