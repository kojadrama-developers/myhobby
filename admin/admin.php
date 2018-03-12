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

        if($list->rowCount()>0) {
            while ($row1 = $list->fetch(PDO::FETCH_BOTH)) {
                echo "<b>".$row1["category_name"]."</b>"."<a href='delete_category.php?id=".$row1[0]."'>Delete</a><a href='update_category.php?id=".$row1[0]."'>Update</a><br/>";
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
        header("Refresh:0;url=index.php");
        return $delete;
    }

    public function delete_subcategory()
    {
        $id=$_GET['id'];
        $delete=$this->connection->query("DELETE FROM `myhobby-test`.sub_category WHERE subcategory_id='$id'");
        header("Refresh:0;url=index.php");
        return $delete;
    }

    public function update_category($new_name,$btn_update)
    {
        $id=$_GET['id'];
        if(isset($btn_update))
        {
            $update=$this->connection->query("UPDATE `myhobby-test`.category SET category_name='$new_name' WHERE category_id='$id'");
            header("Refresh:0;url=index.php");
            return $update;
        }
    }

    public function update_subcategory($new_name,$btn_update)
    {
        $id=$_GET['id'];
        if(isset($btn_update))
        {
            $update=$this->connection->query("UPDATE `myhobby-test`.sub_category SET sub_category_name='$new_name' WHERE subcategory_id='$id'");
            header("Refresh:0;url=index.php");
            return $update;
        }
    }


}