<?php
session_start();
require 'user.php';
//create new object for class USER() 
$gethobby=new USER();

$hobby="";
if(isset($_POST['sub_category'])){
    $hobby=$_POST['sub_category'];
}

$gethobby->yourHobby($hobby);