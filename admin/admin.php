<?php
include "../includes/db_config.php";
include "header.php";
include "footer.php";
include "modal/category_modal.html";
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

        echo "";
        echo "<table id='hobbies' class='table table-dark table-hover'>";
        echo "<tr><td><h2 class='manage'>Manage hobbies here:</h2></td><td class='align'><button type='button' class='btn btn-success btn-lg' data-toggle='modal' data-target='#category_modal'>Add new category</button></td></tr>";
        if($list->rowCount()>0) {
            while ($row1 = $list->fetch(PDO::FETCH_BOTH)) {
                echo "<tr class='bg-dark font-weight-bold'><td class='cell-hobby'><p id='category'>".$row1[1]."</p></td><td class='cell-hobby align'><a class='btn btn-success btn-spacing' href='insert_subcategory.php?id=".$row1[0]."'>New</a><a class='btn btn-primary btn-spacing' href='update_category.php?id=".$row1[0]."'>Update</a><a class='btn btn-danger' href='delete_category.php?id=".$row1[0]."'>Delete</a></td></tr>";
                $list1=$this->connection->query("SELECT * FROM `myhobby-test`.sub_category JOIN category sc ON sc.category_id = sub_category.id_category WHERE id_category='".$row1[0]."'");
                while ($row2 = $list1->fetch(PDO::FETCH_BOTH)) {
                    echo "<tr><td class='cell-hobby'><p id='subcategory'>".$row2[2]."</p></td><td class='cell-hobby align'><a class='btn btn-primary btn-spacing' href='update_subcategory.php?id=".$row2[0]."'>Update</a><a class='btn btn-danger' href='delete_subcategory.php?id=".$row2[0]."'>Delete</a></td></tr>";
                }
            }
        }
        echo "</table>";
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

    public function delete_subcategory()
    {
        $id=$_GET['id'];
        $delete=$this->connection->query("DELETE FROM `myhobby-test`.sub_category WHERE subcategory_id='$id'");
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

    public function insert_subcategory($new_name,$btn_insert)
    {
        if(!empty($btn_insert))
        {
            $category_id=$_GET['id'];
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

        echo "<table class='table table-dark table-hover'>";
        echo "<tr><td colspan='4'><h2>Manage users here:</h2></td></tr>";
        echo "<tr class='bg-dark'><td>First name</td><td>Last name</td><td>E-mail</td><td class='align'>Manage</td></tr>";
        if($list1->rowCount()>0)
        {
            while($row=$list1->fetch(PDO::FETCH_BOTH))
            {
                echo "<tr><td class='cell-user'>".$row[1]."</td><td class='cell-user'>".$row[2]."</td>"."<td class='cell-user'>".$row[3]."</td><td class='cell-user align'><a class='btn btn-primary btn-spacing' href='update_users.php?id=".$row[0]."'>Update</a><a class='btn btn-danger' href='delete_users.php?id=".$row[0]."'>Delete</a></td>";
            }
        }
        echo "</table>";
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