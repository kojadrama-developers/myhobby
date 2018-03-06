
<?php
session_start();
require "includes/db_config.php";
if(isset($_POST['register_btn'])){
    $first_name=mysqli_real_escape_string($connection,$_POST['first_name']);
    $last_name=mysqli_real_escape_string($connection,$_POST['last_name']);
    $email=mysqli_real_escape_string($connection,$_POST['email']);
    $password=mysqli_real_escape_string($connection,$_POST['password']);
    $password2=mysqli_real_escape_string($connection,$_POST['password2']);
    $date_of_birth=mysqli_real_escape_string($connection,$_POST['date_of_birth']);
    $sex=mysqli_real_escape_string($connection,$_POST['sex']);

    if($password==$password2){
        $password=md5($password);
        $sql="INSERT INTO users (first_name,last_name, email, password, date_of_birth, sex) VALUES ('$first_name','$last_name','$email','$password','$date_of_birth', '$sex')";
        mysqli_query($connection,$sql);

        $_SESSION['message']="Ulogovani ste";
        $_SESSION['first_name']=$first_name;
        header("Location:index.php");
    }
    else{
       echo "<script>alert('Lozinke nisu iste');</script>";
    }
}
?>