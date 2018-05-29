<?php
    session_start();

    require 'user.php';
    $session = new USER();
    
    //if user not logged in go to index.php
    if(!$session->is_loggedin())
    {
        $session->redirect('index.php');
    }