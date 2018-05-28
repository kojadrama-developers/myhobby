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
           if($stmt->rowCount()==1)
           {
               if(password_verify($password,$userRow['password']))
               {
                   $this->redirect("../index.php");
                   $_SESSION['user_session'] = $userRow['email'];
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