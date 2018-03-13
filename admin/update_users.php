<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update</title>
</head>
<body>
<form action="" method="post">
    <input type="text" name="new_first_name">
    <input type="text" name="new_last_name">
    <input type="submit" name="btn_update">
    <input type="reset">
</form>
</body>
</html>
<?php
include "admin.php";
$user=new Admin();
$new_first_name=$_POST['new_first_name'];
$new_last_name=$_POST['new_last_name'];
$btn_update=$_POST['btn_update'];
$update=$user->update_users($new_first_name,$new_last_name,$btn_update);
?>