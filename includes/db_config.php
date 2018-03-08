<?php
class Database{
    private $host = 'localhost';
    private $db_name = 'myhobby-test';
    private $username = 'root';
    private $password = '';
    public $connection;

    public function dbConnection()
    {
        $this -> connection = null;

        try{
            $this -> connection = new PDO("mysql:host=". $this->host . ";dbname=" . $this->db_name , $this->username , $this->password);
            $this -> connection -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $exception){
            echo "Connection error " .$exception ->getMessage();
        }

        return $this->connection;
    }


}


?>