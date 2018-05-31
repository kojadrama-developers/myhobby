<?php

require "../includes/db_config.php";

class USER
{
    private $connection;

    //connect to the database
    public function __construct()
    {
        $database=new Database();
        $db=$database->dbConnection();
        $this->connection=$db;
    }

    //shortens code for running queries
    public function runQuery($sql)
    {
        $stmt=$this->connection->prepare($sql);
        return $stmt;
    }

    //register users
    public function register($firstName,$lastName,$email,$password,$date,$sex,$state)
    {
        try
        {
            //password coding and query for new user
            $new_password=password_hash($password,PASSWORD_DEFAULT);
            $stmt=$this->connection->prepare("INSERT INTO users (email,password) VALUES ('$email','$new_password');INSERT INTO users_info (user_id,first_name,last_name,date_of_birth,sex,`state`) VALUES (LAST_INSERT_ID(),'$firstName','$lastName','$date','$sex','$state');");
            
            //binding parameters to stmt
            $stmt->bindparam("email",$email);
            $stmt->bindparam("password",$new_password);
            $stmt->bindparam("firstName",$firstName);
            $stmt->bindparam("lastName",$lastName);
            $stmt->bindparam("date",$date);
            $stmt->bindparam("sex",$sex);
            $stmt->bindparam("state",$state);

            //execute the query
            $stmt->execute();

            return $stmt;
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    //login users
    public function doLogin($email,$password)
    {
        try
        {
           //find user in database by email
           $stmt=$this->connection->prepare("SELECT * FROM `myhobby`.users WHERE email=:email");
           $stmt->execute(array(':email'=>$email));
           $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

           //find other info about same user by user_id
           $stmt1=$this->connection->prepare("SELECT * FROM `myhobby`.users_info WHERE user_id IN (SELECT user_id FROM `myhobby`.users WHERE email=:email)");
           $stmt1->execute(array(':email'=>$email));
           $userRow1=$stmt1->fetch(PDO::FETCH_ASSOC);

           //for cookie, sets time zone to Belgrade
           $date1=new DateTime('now', new DateTimeZone('Europe/Belgrade') );
           $date1->setTimeZone(new DateTimeZone('Europe/Belgrade'));
           $date=$date1->format('H-i-s');

           //if there is user with that email in database...
           if($stmt->rowCount()==1)
           {
               //if user logs in first time and if his/hers password is okey
               if($userRow1['first_log']==1 and password_verify($password,$userRow['password']))
               {
                   //go to page hooby.php, update first_log to 0 for that user
                   $this->redirect("hobby.php");

                   //make 2 $_SESSION, one with user_id and one with first_name (both are taken from database)
                   $_SESSION['user_session'] = $userRow['user_id'];
                   $_SESSION['first_name']=$userRow1['first_name'];

                   //make 2 cookies, one with first_name (from database, maybe not so secure) and one with time when user logged in
                   setcookie("First_name",$userRow1['first_name'],time()*3600,"/", false, false);
                   setcookie("Login_time",$date,time()+84600,"/",false,false);
                   return true;
               }
               //if user logs in (not for the first time) and password is okey
               else if($userRow1['first_log']==0 and password_verify($password,$userRow['password']))
               {
                   //go to index.php page
                   $this->redirect("../index.php");

                   //same as in row 74
                   $_SESSION['user_session']=$userRow['user_id'];
                   $_SESSION['first_name']=$userRow1['first_name'];

                   //same as in row 77
                   setcookie("First_name",$userRow1['first_name'],time()*3600,"/", false, false);
                   setcookie("Login_time",$date,time()+84600,"/",false,false);
                   return true;
               }
               else
               {
                   return false;
               }
           }
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    //check if user is logged in
    public function is_loggedin()
    {   
        //check if user session is setcheck if user session is set
        if(isset($_SESSION['user_session']))
        {
            return true;
        }

    }

    //for redirecting
    public function redirect($url)
    {
        header("Location: $url");
    }

    //log out user
    public function doLogout()
    {
        $_SESSION=array();
        
        //delete cookie
        setcookie("Login_time",$date,time()-1,"/",false,false);
        session_destroy();
    }

    //inserts choosen hobby in db for that user
    public function yourHobby($hobby){
        //gets id for currently logged in user
        if(isset($_SESSION['user_session'])){
            $user_id=$_SESSION['user_session'];
        }

        //inserts hobby for this user
        $stmt=$this->connection->prepare("INSERT INTO `myhobby`.user_category (user_id,category) VALUES ('$user_id','$hobby')");
        $stmt->execute();

        //changes his first log in status in db
        $stmt1=$this->connection->prepare("UPDATE `myhobby`.users_info SET first_log=0 WHERE user_id='$user_id'");
        $stmt1->execute();

        //redirects to index.php page
        $this->redirect("../index.php");
    }
}