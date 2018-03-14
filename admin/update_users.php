<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>Update</title>
</head>
<body id="center" class="center">
<div>
    <form class="form_center" action="" method="post">
        <div class="form-group">
            <label>New first name: </label>
            <input class="form-control" type="text" name="new_first_name">
        </div>
        <label>New last name: </label>
        <input class="form-control" type="text" name="new_last_name"><br/>
        <input class="btn btn-primary" type="submit" name="btn_update" value="Update">
        <input class="btn btn-secondary" type="reset" value="Cancel">
    </form>
</div>
</body>
</html>
<?php
include "admin.php";
$user=new Admin();
$new_first_name=!empty($_POST['new_first_name']) ? $_POST['new_first_name'] : '';
$new_last_name=!empty($_POST['new_last_name']) ? $_POST['new_last_name'] : '';
$btn_update=!empty($_POST['btn_update']) ? $_POST['btn_update'] : '';
$update=$user->update_users($new_first_name,$new_last_name,$btn_update);
?>