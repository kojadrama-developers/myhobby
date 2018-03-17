<?php
session_start();
require "user.php";
$login=new USER();

if($login->is_loggedin()!="")
{
    $login->redirect('../index.php');
}

if(isset($_POST['login_btn']))
{
    $email=strip_tags($_POST['email']);
    $password=strip_tags($_POST['password']);

    if($login->doLogin($email,$password))
    {
        $login->redirect('../index.php');
    }
    else
    {
        $login->redirect('../index.php');
    }
}
?>