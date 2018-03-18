<?php

class Functions
{
    public function if_logged_in()
    {
        session_start();
        if(isset($_SESSION['user_session']))
        {
            echo "<a class='btn btn-outline-danger' href='user/logout.php'>Logout</a>";
        }
        else {
            ?>
            <li class="nav-item">
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#SignInModal">Sign in</button>
            </li>
            <?php
        }
    }

    public function hello_message()
    {
        if(isset($_SESSION['user_session']))
        {
            echo "<h4 style='margin-left: 10px'><span class='badge badge-dark'> Hello {$_SESSION['user_session']} </span></h4>";
        }
    }
}