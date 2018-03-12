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
    <input type="text" name="new_name">
    <input type="submit" name="btn_update">
    <input type="reset">
</form>
</body>
</html>
<?php
include "admin.php";
$hobby=new Admin();
$new_name=$_POST['new_name'];
$btn_update=$_POST['btn_update'];
$update=$hobby->update_subcategory($new_name,$btn_update);
?>