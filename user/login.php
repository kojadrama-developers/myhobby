<?php
session_start();
require "user.php";
$login=new USER();

if($login->is_loggedin()!="")
{
    $login->redirect('../index.php');
}
$inserted_email=$_POST['email'];
$notGood=$login->redirect("../index.php");
$stmt=$login->runQuery("SELECT email FROM `myhobby`.users WHERE email='$inserted_email'");
$stmt->execute(array(':email'=>$email));
$row=$stmt->fetch(PDO::FETCH_ASSOC);

if($_POST['email']=="" or ($_POST['password'])==""){
    $error="All fields are required";
    echo $error;
    return $notGood;
}
elseif($_POST['email']!=$row['email']){
    echo "This email doesn't exist!";
    return $notGood;
}
elseif(isset($_POST['login_btn']))
{
    $email=strip_tags($_POST['email']);
    $password=strip_tags($_POST['password']);
    $login->doLogin($email,$password);
}
?>