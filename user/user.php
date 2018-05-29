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

    public function runQuery($sql)
    {
        $stmt=$this->connection->prepare($sql);
        return $stmt;
    }

    public function register($firstName,$lastName,$email,$password,$date,$sex,$state)
    {
        try
        {
            $new_password=password_hash($password,PASSWORD_DEFAULT);
            $stmt=$this->connection->prepare("INSERT INTO users (email,password) VALUES ('$email','$new_password');
                                              INSERT INTO users_info (user_id,first_name,last_name,date_of_birth,sex,`state`) VALUES (LAST_INSERT_ID(),'$firstName','$lastName','$date','$sex','$state');");

            $stmt->bindparam("email",$email);
            $stmt->bindparam("password",$new_password);
            $stmt->bindparam("firstName",$firstName);
            $stmt->bindparam("lastName",$lastName);
            $stmt->bindparam("date",$date);
            $stmt->bindparam("sex",$sex);
            $stmt->bindparam("state",$state);

            $stmt->execute();

            return $stmt;
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function doLogin($email,$password)
    {
        try
        {
           $stmt=$this->connection->prepare("SELECT * FROM `myhobby`.users WHERE email=:email");
           $stmt->execute(array(':email'=>$email));
           $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
           $stmt1=$this->connection->prepare("SELECT * FROM `myhobby`.users_info WHERE user_id IN (SELECT user_id FROM `myhobby`.users WHERE email=:email)");
           $stmt1->execute(array(':email'=>$email));
           $userRow1=$stmt1->fetch(PDO::FETCH_ASSOC);
           if($stmt->rowCount()==1)
           {
               if($userRow1['first_log']==1 and password_verify($password,$userRow['password']))
               {
                   $this->redirect("hobby.php");
                   $stmt1=$this->connection->prepare("UPDATE `myhobby`.users_info SET first_log=0 WHERE user_id IN (SELECT user_id FROM `myhobby`.users WHERE email=:email)");
                   $stmt1->execute(array(':email'=>$email));
                   $_SESSION['user_session'] = $userRow['user_id'];
                   $_SESSION['first_name']=$userRow1['first_name'];
                   setcookie("first_name",$userRow1['first_name'],time()*3600,"/", false, false);
                   return true;
               }
               else if($userRow1['first_log']==0 and password_verify($password,$userRow['password']))
               {
                   $this->redirect("../index.php");
                   $_SESSION['user_session']=$userRow['user_id'];
                   $_SESSION['first_name']=$userRow1['first_name'];
                   setcookie("first_name",$userRow1['first_name'],time()*3600,"/", false, false);
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

    public function is_loggedin()
    {
        if(isset($_SESSION['user_session']))
        {
            return true;
        }

    }

    public function redirect($url)
    {
        header("Location: $url");
    }

    public function doLogout()
    {
        $_SESSION=array();
        session_destroy();
    }
}