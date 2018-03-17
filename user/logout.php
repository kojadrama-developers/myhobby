<?php
    require_once "session.php";
    require_once "user.php";
    $user_logout=new USER();

    $user_logout->doLogout();
    $user_logout->redirect("../index.php");