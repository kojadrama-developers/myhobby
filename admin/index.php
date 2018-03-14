<?php
include "admin.php";
include "navigation.php";
$category=new Admin();
$users=new Admin();
$list=$category->select_hobbies();
$list1=$users->select_users();