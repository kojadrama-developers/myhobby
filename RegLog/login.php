<?php
session_start();
$db=mysqli_connect("localhost","root","","user");
if(isset($_POST['login_btn'])){
    $username=mysqli_real_escape_string($db,$_POST['username']);
    $password1=mysqli_real_escape_string($db,$_POST['password1']);

    $password1=md5($password1);
    $sql="SELECT * FROM users WHERE username='$username' AND password='$password1'";
    $result=mysqli_query($db,$sql);

    if(mysqli_num_rows($result)==1){
        $_SESSION['message']="Ulogovani ste";
        $_SESSION['username']=$username;
        header("location: home.php");
    }
    else{
        $_SESSION['message']="Korisnicko ime ili sifra ne valja.";
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
<form method="post" action="login.php">
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
                Šifra:
            </td>
            <td>
                <input type="password" name="password1" class="textInput">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="login_btn" value="Registruj se">
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
