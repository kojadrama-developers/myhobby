<?php
    session_start();
    echo $_SESSION['username'];
    echo "<a href='logout.php'>Logout</a>"
?>
