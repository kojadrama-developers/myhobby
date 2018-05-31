<?php
session_start();
require 'user.php';
//create new object for class USER() 
$gethobby=new USER();

//get chosen hobby from select
$hobby="";
if(isset($_POST['sub_category'])){
    $hobby=$_POST['sub_category'];
}

if($hobby==""){
    $gethobby->redirect("hobby.php");
}
else{
    //execute the function to insert the hobby in db
    $gethobby->yourHobby($hobby);
}