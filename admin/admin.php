<?php
include "../includes/db_config.php";

class Admin extends Database {

    public function __construct()
    {
        $database=new Database();
        $db=$database->dbConnection();
        $this->connection=$db;
    }

    public function select_hobbies()
    {
        $list=$this->connection->query("SELECT * FROM `myhobby-test`.category");

        echo "<a href='insert_category.php'>Add new category</a><br/>";
        echo "<a href='insert_subcategory.php'>Add new subcategory</a><br/>";

        if($list->rowCount()>0) {
            while ($row1 = $list->fetch(PDO::FETCH_BOTH)) {
                echo "<b>".$row1[0].". ".$row1["category_name"]."</b>"."<a href='delete_category.php?id=".$row1[0]."'>Delete</a><a href='update_category.php?id=".$row1[0]."'>Update</a><br/>";
                $list1=$this->connection->query("SELECT * FROM `myhobby-test`.sub_category
                                                  JOIN category sc ON sc.category_id = sub_category.id_category WHERE id_category='".$row1[0]."'");
                while ($row2 = $list1->fetch(PDO::FETCH_BOTH)) {
                    echo $row2["sub_category_name"]."<a href='delete_subcategory.php?id=".$row2[0]."'>Delete</a><a href='update_subcategory.php?id=".$row2[0]."'>Update</a>" . "<br/>";
                }
            }
        }
    }

    public function delete_category()
    {
        $id=$_GET['id'];
        $delete=$this->connection->query("DELETE FROM `myhobby-test`.category WHERE category_id='$id'");
        if(!$delete)
        {
            echo "Not deleted";
        }
        else
        {
            header("Refresh:0;url=index.php");
            return $delete;
        }
    }



    public function update_category($new_name,$btn_update)
    {
        $id=$_GET['id'];
        if(!empty($btn_update))
        {
            $update=$this->connection->query("UPDATE `myhobby-test`.category SET category_name='$new_name' WHERE category_id='$id'");
            if(!$update)
            {
                echo "Not updated";
            }
            else
            {
                header("Refresh:0;url=index.php");
                return $update;
            }

        }
    }

    public function update_subcategory($new_name,$btn_update)
    {
        $id=$_GET['id'];
        if(!empty($btn_update))
        {
            $update=$this->connection->query("UPDATE `myhobby-test`.sub_category SET sub_category_name='$new_name' WHERE subcategory_id='$id'");
            if(!$update)
            {
                echo "Not updated";
            }
            else
            {
                header("Refresh:0;url=index.php");
                return $update;
            }
        }

    }

    public function insert_category($new_name,$btn_insert)
    {
        if(!empty($btn_insert))
        {
            $insert=$this->connection->query("INSERT INTO `myhobby-test`.category (category_name) VALUE ('$new_name')");
            if(!$insert)
            {
                echo "Not inserted";
            }
            else
            {
                header("Refresh:0;url=index.php");
                return $insert;
            }
        }

    }

    public function insert_subcategory($new_name,$btn_insert,$category_id)
    {
        if(!empty($btn_insert))
        {
            $insert=$this->connection->query("INSERT INTO `myhobby-test`.sub_category (id_category,sub_category_name) VALUE ('$category_id','$new_name')");
            if(!$insert)
            {
                echo "Not inserted";
            }
            else
            {
                header("Refresh:0;url=index.php");
                return $insert;
            }
        }

    }

    public function select_users()
    {
        $list1=$this->connection->query("SELECT * FROM `myhobby-test`.users");
        if($list1->rowCount()>0)
        {
            while($row=$list1->fetch(PDO::FETCH_BOTH))
            {
                echo $row[1]." ".$row[2]." "."<a href='delete_users.php?id=".$row[0]."'>Delete</a>"." "."<a href='update_users.php?id=".$row[0]."'>Update</a>"."<br/>";
            }
        }

    }

    public function delete_users()
    {
        $id=$_GET['id'];
        $delete=$this->connection->query("DELETE FROM `myhobby-test`.users WHERE user_id='$id'");
        if(!$delete)
        {
            echo "Not deleted";
        }
        else
        {
            header("Refresh:0;url=index.php");
            return $delete;
        }
    }

    public function update_users($new_first_name,$new_last_name,$btn_update)
    {
        $id=$_GET['id'];
        if(!empty($btn_update))
        {
            $update=$this->connection->query("UPDATE `myhobby-test`.users SET first_name='$new_first_name', last_name='$new_last_name' WHERE user_id='$id'");
            if(!$update)
            {
                echo "Not updated";
            }
            else
            {
                header("Refresh:0;url=index.php");
                return $update;
            }

        }
    }


}