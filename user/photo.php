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

        $stmt=$image->runQuery("SELECT * FROM image WHERE user_id='$user_id'");
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);

        if(isset($_POST['btn_upload'])){
            $name=$_FILES['photo']['name'];
            $type=$_FILES['photo']['type'];
            $data=file_get_contents($_FILES['photo']['tmp_name']);

            if($name==''){
                $image->redirect('photo.php');
            }
            else if($row['user_id']==$user_id){
                $image->changeImage($data,$name);
            }
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
    $stmt=$image->runQuery("SELECT * FROM image WHERE user_id='$user_id'");
    $stmt->execute();
    while($row=$stmt->fetch(PDO::FETCH_BOTH)){
        echo '<img width="250px" height="250px" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
    }
?>
 