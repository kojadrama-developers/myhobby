<?php
session_start();
require "user.php";
$login=new USER();

if($login->is_loggedin()!="")
{
    $login->redirect('../index.php');
}
$stmt=$login->runQuery("SELECT email FROM `myhobby`.users");
$stmt->execute(array(':email'=>$email));
$row=$stmt->fetch(PDO::FETCH_ASSOC);

if($row['email']!=$email)
{
    $error[]="Sorry, email already taken!";
    $login->redirect("../index.php");
}
else if($_POST['email']=="" or ($_POST['password'])==""){
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