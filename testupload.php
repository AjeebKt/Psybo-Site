<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html> 
<?php 
	if (isset($_POST['submit'])) 
	{
	$target_dir=getcwd()."/upload-image/";
	var_dump("Target dir :  ".$target_dir);
	$target_file=$target_dir . basename($_FILES["fileToUpload"]["name"]);
	var_dump("Target file  : ".$target_file);
	$image_file_type=pathinfo($target_file,PATHINFO_EXTENSION);
	var_dump("image file type  :   ".$image_file_type);
		$check=getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		var_dump($check);
		if ($check["mime"]!="image/jpeg") 
			echo "please select a image";
		if ($_FILES["fileToUpload"]["size"] > 30000000)
		{
			return die("sorry files is to large");	
			
		}
		echo "string";
		// echo "is an image ".$check["mime"].".";
		if (file_exists($target_file)) 
			echo "sorry file already exist .please select onother file";
		if ($image_file_type != "jpg" and $image_file_type=="png" and $image_file_type =! "jpeg") 
		{
			echo "Only jp,jpeg,img files are allowed";
		}
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
		{
			echo "The file ". basename($_FILES["fileToUpload"]["name"]) . "has uploaded";
			
		}

	
	}	
 ?>