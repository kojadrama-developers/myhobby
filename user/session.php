<?php
    session_start();

    require 'user.php';
    $session = new USER();

    if(!$session->is_loggedin())
    {
        $session->redirect('index.php');
    }