<?php
session_start();
require "user.php";
$login=new USER();

if($login->is_loggedin()!="")
{
    $login->redirect('../index.php');
}
if($_POST['email']=="" or ($_POST['password'])==""){
    $error="All fields are required";
    echo $error;
    $login->redirect("../index.php");
}
elseif(isset($_POST['login_btn']))
{
    $email=strip_tags($_POST['email']);
    $password=strip_tags($_POST['password']);
    $login->doLogin($email,$password);
}
?>