<?php

class Functions
{
    public function if_logged_in()
    {
        session_start();
        if(isset($_SESSION['user_session']))
        {
            echo "<a class='btn btn-danger' href='user/logout.php'>Logout</a>";
            echo "<span class='badge badge-secondary'> Hello: {$_SESSION['user_session']} </span>";
        }
        else {
            ?>
            <li class="nav-item">
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#SignInModal">Sign in</button>
            </li>
            <?php
        }
    }
}