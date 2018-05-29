<?php
session_start();
require "user.php";
//create new object for class USER() 
$login=new USER();
//checks if user is logged in
if($login->is_loggedin()!="")
{
    $login->redirect('../index.php');
}
//receives inserted email from form
$inserted_email=$_POST['email'];
//shortens redirection 
$notGood=$login->redirect("../index.php");
//finds same email in database as the inserted one
$stmt=$login->runQuery("SELECT email FROM `myhobby`.users WHERE email='$inserted_email'");
$stmt->execute(array(':email'=>$email));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
//if something is empthy in form give error and return to index.php
if($_POST['email']=="" or ($_POST['password'])==""){
    echo "All fields are required";
    return $notGood;
}
//if inserted email doens't exist in database give error and return to index.php
elseif($_POST['email']!=$row['email']){
    echo "This email doesn't exist!";
    return $notGood;
}
//if everything okey, log in user
elseif(isset($_POST['login_btn']))
{
    $email=strip_tags($_POST['email']);
    $password=strip_tags($_POST['password']);
    $login->doLogin($email,$password);
}
?>