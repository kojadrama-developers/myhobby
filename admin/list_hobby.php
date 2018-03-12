<?php
include "admin.php";
$category=new Admin();
$list=$category->select_hobbies();
