<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BLOB Data Type Tutorial</title>
</head>

<body>
<form action="index.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="image"><input type="submit" name="submit" value="Upload">
</form>
<?php

if(isset($_POST['submit']))
{
	@mysql_connect("localhost","Rahul","Koqa313*@3");
	mysql_select_db("testing");
	
	$imageName = mysql_real_escape_string($_FILES["image"]["name"]);
	$imageData = mysql_real_escape_string(file_get_contents($_FILES["image"]["tmp_name"]));
	$imageType = mysql_real_escape_string($_FILES["image"]["type"]);


	if(substr($imageType,0,5) == "image")
	{
		mysql_query("INSERT INTO images VALUES('','$imageName','$imageData')");
		echo "Image Uploaded!";
	}
	else
	{
		echo "Only images are allowed!";
	}
	
}

?>



</body>
</html>