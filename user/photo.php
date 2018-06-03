<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload photo</title>
</head>
<body>
    <?php 
        session_start();
        require 'user.php';
    
        //create new object for class USER()
        $image=new USER();
        $user_id=$_SESSION['user_session'];

        //finds in database if user has a picture
        $stmt=$image->runQuery("SELECT * FROM image WHERE user_id='$user_id'");
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);

        //if button upload is pressed
        if(isset($_POST['btn_upload'])){
            //receive file from form and take its name and contents
            $name=$_FILES['photo']['name'];
            $type=$_FILES['photo']['type'];
            $data=file_get_contents($_FILES['photo']['tmp_name']);
            
            //if there is no file redirect
            if($name==''){
                $image->redirect('photo.php');
            }
            //if user has a picture change it
            else if($row['user_id']==$user_id){
                $image->changeImage($data,$name);
            }
            //if user doesn't have a picture upload picture
            else{
                $image->imageUpload($data,$name);
            }
        }
    ?>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="photo">
        <input type="submit" name="btn_upload" value="Upload">
    </form>
</body>
</html>
<?php 
    //show picture for logged in user
    $stmt=$image->runQuery("SELECT * FROM image WHERE user_id='$user_id'");
    $stmt->execute();
    while($row=$stmt->fetch(PDO::FETCH_BOTH)){
        echo '<img width="250px" height="250px" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
    }
?>
 