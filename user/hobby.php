<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Choose hobby</title>
    <style type="text/css">

        #sub_category {
            display:none;

        }
label {
    font-weight: bold;
}
        #sub_label {
            display:none;
        }
    </style>

<?php
session_start();
require 'user.php';
//create new object for class USER() 
$hobby=new USER();

//make category array
$category=array();

//take category_id and category_name from database
$stmt=$hobby->runQuery("SELECT category_id, category_name FROM category");
$stmt->execute();

//populate category array with results
if($stmt->rowCount()>0){
    while($row=$stmt->fetch(PDO::FETCH_BOTH)){
        $category[$row['category_id']]=$row['category_name'];
    }
}

//make sub_category array
$sub_category=array();

foreach($category as $cat_id=>$sub_id){
    //take sub_category_name from db
    $stmt1=$hobby->runQuery("SELECT sub_category_name FROM sub_category WHERE category_id='$cat_id'");
    $stmt1->execute();

    //populate sub_category array with results
    if($stmt1->rowCount()>0){
        while($row1=$stmt1->fetch(PDO::FETCH_BOTH)){
            $sub_category[$sub_id][]=$row1['sub_category_name'];
        }
    }
}
?>
<script>
//js for both selects
var sub_category=<?php echo json_encode($sub_category) ?>;

        //function which checks if you chose something from first select and shows/hides the other one 
        function chooseHobby(element){
            var text = "";
            var value = element.value;
            if(value!='choose'){
                document.getElementById('sub_category').style.display='inline';
                
				for(var x in sub_category[value])
				text+='<option value="'+sub_category[value][x]+'">'+sub_category[value][x]+'</option>';

                document.getElementById('sub_category').innerHTML = text;
                document.getElementById('sub_category').disabled=false;
                document.getElementById('sub_label').style.display='inline';

            }
            else{
                document.getElementById('sub_category').disabled=true;
                document.getElementById('sub_category').style.display='none';
                document.getElementById('sub_label').style.display='none';
            }
        }
    </script>
</head>
<?php
//checks if user is logged in and puts users id in variable $user_id
if($hobby->is_loggedin()!=""){
    $user_id=$_SESSION['user_session'];
}

//finds in db if user has already choosen a hobby 
$stmt=$hobby->runQuery("SELECT user_id FROM user_category WHERE user_id='$user_id'");
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);

//if yes, user gets this message
if($row['user_id']==$user_id){
    echo "You already chose your hobby!";
}
//else, user can choose a hobby
else{
?>
<body>
<form name="category_form" action="gethobby.php" method="POST">
    <label id="cat_label">Hobby category:</label>
    <select name="category" onchange="chooseHobby(this)">
    <script>
    document.write('<option value="choose">choose</option>');
    for(var x in sub_category){
        document.write('<option value="'+x+'">'+x+'</option>');
    }
    </script>
    </select>
    <label id="sub_label">Hobby subcategory: </label>
    <select name="sub_category" id="sub_category">

    </select>
    <input type="submit"/>
</form>
</body>
<?php } ?>
</html>