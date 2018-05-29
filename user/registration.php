
<?php
session_start();
require "user.php";

//create new object for class USER() 
$user=new USER();

//checks if user is logged in
if($user->is_loggedin()!="")
{
    $user->redirect("../index.php");
}

//if registration button is clicked
if(isset($_POST['register_btn']))
{
    //receives information from registration form
    $firstName=strip_tags($_POST['first_name']);
    $lastName=strip_tags($_POST['last_name']);
    $email=strip_tags($_POST['email']);
    $password=strip_tags($_POST['password']);
    $date=strip_tags($_POST['date_of_birth']);
    $sex=strip_tags($_POST['sex']);
    $state=strip_tags($_POST['state']);

    //shortens redirection
    $notGood=$user->redirect('../index.php');

    //if something from form is empthy give error and return to index.php
    if($firstName==""){
        $error[]="Please provide your first name!";
        return $notGood;
    }
    else if($lastName==""){
        $error[]="Please provide your last name!";
        return $notGood;
    }
    else if($email==""){
        $error[]="Please provide a valid email address!";
        return $notGood;
    }
    else if($password==""){
        $error[]="Please provide password!";
        return $notGood;
    }
    else if(strlen($password)<6){
        $error[]="Password must be atleast 6 characters!";
        return $notGood;
    }
    else if($date==""){
        $error[]="Please provide your date of birth!";
        return $notGood;
    }
    else if($sex==""){
        $error[]="Please provide your sex!";
        return $notGood;
    }
    else if($state==""){
        $error[]="Please provide your state!";
        return $notGood;
    }
    else
    {
        try
        {
            //find every email in database
            $stmt=$user->runQuery("SELECT email FROM `myhobby`.users");
            $stmt->execute(array(':email'=>$email));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            
            //if inserted email is equal to something in database then give error else register user
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
