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
<div class="div_des">
    <form class="form_center" action="" method="post">
        <label>New subcategory name: </label>
        <input class="form-control" type="text" name="new_name"><br/><br/>
        <input class="btn btn-primary" type="submit" name="btn_insert" value="Insert">
        <input class="btn btn-secondary" type="reset" value="Cancel">
        <a class="btn btn-warning" href="index.php">Admin page</a>
    </form>
</div>
</body>
</html>
<?php
include "admin.php";
$hobby=new Admin();
$new_name=!empty($_POST['new_name']) ? $_POST['new_name'] : '';
$btn_insert=!empty($_POST['btn_insert']) ? $_POST['btn_insert'] : '';
$update=$hobby->insert_subcategory($new_name,$btn_insert);
?>