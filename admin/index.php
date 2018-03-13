<?php
include "admin.php";
$category=new Admin();
$users=new Admin();
$list=$category->select_hobbies();
$list1=$users->select_users();