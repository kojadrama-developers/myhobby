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

    public function register($email,$password,$firstName,$lastName,$date,$sex,$state)
    {
        try
        {
            $new_password=password_hash($password,PASSWORD_DEFAULT);
            $stmt=$this->connection->prepare("call register_user($email,$new_password,$firstName,$lastName,$date,$sex,$state)");

            $stmt->bindparam("firstName",$firstName);
            $stmt->bindparam("lastName",$lastName);
            $stmt->bindparam("email",$email);
            $stmt->bindparam("password",$new_password);
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
           if($stmt->rowCount()==1)
           {
               if($userRow['first_log']==1 and password_verify($password,$userRow['password']))
               {
                   $this->redirect("hobby.php");
                   $stmt=$this->connection->prepare("UPDATE `myhobby`.users SET first_log=0 WHERE email=:email");
                   $stmt->execute(array(':email'=>$email));
                   $_SESSION['user_session'] = $userRow['first_name'];
                   return true;
               }
               elseif($userRow['first_log']==0 and password_verify($password,$userRow['password']))
               {
                   $this->redirect("../index.php");
                   $_SESSION['user_session'] = $userRow['first_name'];
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