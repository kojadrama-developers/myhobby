<?php
include "admin.php";
$hobby=new Admin();
$new_name=!empty($_POST['new_name']) ? $_POST['new_name'] : '';
$btn_insert=!empty($_POST['btn_insert']) ? $_POST['btn_insert'] : '';
$update=$hobby->insert_category($new_name,$btn_insert);
?>

