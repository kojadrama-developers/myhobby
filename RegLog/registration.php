<?php
    session_start();
    $db=mysqli_connect("localhost","root","","user");
    if(isset($_POST['register_btn'])){
        $username=mysqli_real_escape_string($db,$_POST['username']);
        $email=mysqli_real_escape_string($db,$_POST['email']);
        $password1=mysqli_real_escape_string($db,$_POST['password1']);
        $password2=mysqli_real_escape_string($db,$_POST['password2']);

        if($password1==$password2){
            $password1=md5($password1);
            $sql="INSERT INTO users (username, email, password) VALUES ('$username','$email','$password1')";
            mysqli_query($db,$sql);
            $_SESSION['message']="Ulogovani ste";
            $_SESSION['username']=$username;
            header("location: home.php");
        }
        else{
            $_SESSION['message']="Šifre nisu iste!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registracija</title>
</head>
<body>
<form method="post" action="registration.php">
    <table>
        <tr>
            <td>
                Korisničko ime:
            </td>
            <td>
                <input type="text" name="username" class="textInput">
            </td>
        </tr>
        <tr>
            <td>
                Email:
            </td>
            <td>
                <input type="email" name="email" class="textInput">
            </td>
        </tr>
        <tr>
            <td>
                Šifra:
            </td>
            <td>
                <input type="password" name="password1" class="textInput">
            </td>
        </tr>
        <tr>
            <td>
                Ponovite šifru:
            </td>
            <td>
                <input type="password" name="password2" class="textInput">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="register_btn" value="Registruj se">
            </td>
        </tr>
        <tr>
            <td>
                <input type="reset" name="cancel" value="Cancel">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
