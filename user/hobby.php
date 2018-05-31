<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JavaScript</title>
    <style type="text/css">

        #sub_category {
            display:none;

        }
label {
    font-weight: bold;
}
        #label2 {
            display:none;
        }
    </style>

<?php
require 'user.php';

$hobby=new USER();

$category = array();

$sql=$hobby->runQuery("SELECT category_id,category_name FROM category");
$sql->execute();

if ($sql->rowCount()>0)
{
	while ($record=$sql->fetch(PDO::FETCH_ASSOC))
    {
		$category[$record['category_id']] = $record['category_name'];    	
    }
}

$sub_category = array();

foreach ($category as $k=>$v)
{
	$sql=$hobby->runQuery("SELECT sub_category_name FROM sub_category WHERE category_id = '$k'");
	$sql->execute();

	if ($sql->rowCount()>0)
	{
		while ($record=$sql->fetch(PDO::FETCH_ASSOC))
    	{
			$sub_category["$v"][] = $record['sub_category_name'];    	
	    }
	}
}
?>
<script type="text/javascript">
var sub_category=<?php echo json_encode($sub_category) ?>;

        function myFunction(obj)
        {
            var text = "";
            var value = obj.value;
            if(value!='choose')
            {
                document.getElementById('sub_category').style.display='inline';
                
				for(var x in sub_category[value])
				text+='<option value="'+sub_category[value][x]+'">'+sub_category[value][x]+'</option>';

                document.getElementById('sub_category').innerHTML = text;
                document.getElementById('sub_category').disabled=false;
                document.getElementById('label2').style.display='inline';

            }
            else
            {
                document.getElementById('sub_category').disabled=true;
                document.getElementById('sub_category').style.display='none';
                document.getElementById('label2').style.display='none';
            }
        }
    </script>

</head>
<body>
<form name="category_form">
    <label>category: </label><select name="category" onchange="myFunction(this)">
        <script tpye="text/javascript">
        document.write('<option value="choose">choose</option>');
        for(var x in sub_category)
        document.write('<option value="'+x+'">'+x+'</option>');
        </script>

    </select>
    <label id="label2">sub category: </label>
    <select name="sub_category" id="sub_category">

    </select>
    <input type="submit" value="send" />
</form>
</body>
</html>