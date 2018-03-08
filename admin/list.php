<?php
require "../includes/db_config.php";

$sql="SELECT * FROM `myhobby-test`.category ORDER BY category_id ASC";
$query=mysqli_query($connection,$sql) or die (mysqli_error($connection));

if(mysqli_num_rows($query)>0){
    while($row=mysqli_fetch_row($query)){
        echo "<table class='table table-dark'>";
        echo "<tr><td>".$row[1]."</td></tr>";
        echo "</table>";
    }
    mysqli_free_result($query);
}
mysqli_close($connection);
?>