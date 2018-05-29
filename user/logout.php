<?php
    require_once "session.php";
    require_once "user.php";
    //create new object for class USER() 
    $user_logout=new USER();
    //calls the function for log out
    $user_logout->doLogout();
    $user_logout->redirect("../index.php");