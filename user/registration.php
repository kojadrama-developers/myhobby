
<?php
session_start();
require "user.php";
$user=new USER();

if($user->is_loggedin()!="")
{
    $user->redirect("../index.php");
}

if(isset($_POST['register_btn']))
{
    $firstName=strip_tags($_POST['first_name']);
    $lastName=strip_tags($_POST['last_name']);
    $email=strip_tags($_POST['email']);
    $password=strip_tags($_POST['password']);
    $date=strip_tags($_POST['date_of_birth']);
    $sex=strip_tags($_POST['sex']);
    $state=strip_tags($_POST['state']);

    if($firstName==""){
        $error[]="Please provide your first name!";
    }
    else if($lastName==""){
        $error[]="Please provide your last name!";
    }
    else if($email==""){
        $error[]="Please provide a valid email address!";
    }
    else if($password==""){
        $error[]="Please provide password!";
    }
    else if(strlen($password)<6){
        $error[]="Password must be atleast 6 characters!";
    }
    else if($date==""){
        $error[]="Please provide your date of birth!";
    }
    else if($sex==""){
        $error[]="Please provide your sex!";
    }
    else if($state==""){
        $error[]="Please provide your state!";
    }
    else
    {
        try
        {
            $stmt=$user->runQuery("SELECT email FROM `myhobby`.users");
            $stmt->execute(array(':email'=>$email));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            if($row['email']==$email)
            {
                $error[]="Sorry, email already taken!";
            }
            else
            {
                if($user->register($firstName,$lastName,$email,$password,$date,$sex,$state))
                {
                    $user->redirect('../index.php');
                }
            }
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}
?>
