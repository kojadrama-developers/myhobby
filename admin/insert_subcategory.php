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
    <label>Category id: </label>
    <input type="number" name="category_id"><br/><br/>
    <label>New subcategory name: </label>
    <input type="text" name="new_name"><br/><br/>
    <input type="submit" name="btn_insert">
    <input type="reset">
</form>
</body>
</html>
<?php
include "admin.php";
$hobby=new Admin();
$category_id=!empty($_POST['category_id']) ? $_POST['category_id'] : '';
$new_name=!empty($_POST['new_name']) ? $_POST['new_name'] : '';
$btn_insert=!empty($_POST['btn_insert']) ? $_POST['btn_insert'] : '';
$update=$hobby->insert_subcategory($new_name,$btn_insert,$category_id);
?>