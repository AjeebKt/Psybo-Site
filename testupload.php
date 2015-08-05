<?php
	$target_dir=getcwd()."/upload-image/"; 
	if (isset($_POST['submit'])) 
	{
//////////////////////////////////////////////////////////////////////
		//Get the file information
    /*$userfile_name = $_FILES["fileToUpload"]["name"];
    $userfile_tmp = $_FILES["fileToUpload"]["tmp_name"];
    $userfile_size = $_FILES["fileToUpload"]["size"];
    $filename = basename($_FILES["fileToUpload"]["name"]);
    $file_ext = substr($filename, strrpos($filename, ".") + 1);
 
    //Only process if the file is a JPG and below the allowed limit
    if((!empty($_FILES["fileToUpload"])) && ($_FILES["fileToUpload"]["error"] == 0)) 
    {
    	$error="";
        if (($file_ext!="jpg") && ($userfile_size > $max_file)) 
        {
            $error= "ONLY jpeg images under 1MB are accepted for upload";
        }
    }
    else
    {
        $error= "Select a jpeg image for upload";
    }
    //Everything is ok, so we can upload the image.
    if (strlen($error)==0){
 
        if (isset($_FILES["fileToUpload"]["name"])){
 
            move_uploaded_file($userfile_tmp, $target_dir);
            chmod ($large_image_location, 0777);
 
            $width = getWidth($large_image_location);
            $height = getHeight($large_image_location);
            //Scale the image if it is greater than the width set above
            if ($width > $max_width){
                $scale = $max_width/$width;
                $uploaded = resizeImage($large_image_location,$width,$height,$scale);
            }else{
                $scale = 1;
                $uploaded = resizeImage($large_image_location,$width,$height,$scale);
            }
            //Delete the thumbnail file so the user can create a new one
            if (file_exists($thumb_image_location)) {
                unlink($thumb_image_location);
            }
        }
        //Refresh the page to show the new uploaded image2wbmp(image)
        header("location:".$_SERVER["PHP_SELF"]);
        exit();
    }
*/




/////////////////////////////////////////////////////////////////////
    

		$target_dir=getcwd()."/upload-image/";
// $imagepath="phpimages/dog.jpg";

// $image=imagecreatefromjpeg( $target_dir.'/18802.jpg');

// header('Content-Type: image/jpeg');

// imagejpeg($image);



		var_dump("Target dir :  ".$target_dir);
		$target_file=$target_dir . basename($_FILES["fileToUpload"]["name"]);
		var_dump("Target file  : ".$target_file);
		$image_file_type=pathinfo($target_file,PATHINFO_EXTENSION);
		var_dump("image file type  :   ".$image_file_type);

		$check=getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		// var_dump($check);
		
		if ($check !== FALSE) 
		{
			// echo "File is an image :" .$check["mime"].".";
			$uploadok=1;
		}
		else
		{
			echo "File is not an image";
		}
		

	if ($_FILES["fileToUpload"]["size"] > 10000)
	{
		// echo("sorry files is to large<br>");	
		// $uploadok=0;
		if ($check['mime'] == 'image/jpeg') 
			$image = imagecreatefromjpeg($_FILES["fileToUpload"]["size"]);
		else if ($check['mime'] == 'image/png') 
			$image = imagecreatefrompng($_FILES["fileToUpload"]["size"]);
		imagejpeg($image);
		$source_img = 'source.jpeg';
		$destination_img = 'destination.jpeg';
		$d = compress($source_img , $destination_img , 90);
		
	}
	// echo "string";
	// echo "is an image ".$check["mime"].".";
	if (file_exists($target_file)) 
	{
		echo "sorry file already exist .please select onother file<br>";
		$uploadok=0;
	}
	if ($image_file_type != "jpg" and $image_file_type=="png" and $image_file_type =! "jpeg") 
	{
		echo "Only jp,jpeg,img files are allowed <br>";
		$uploadok=0;
	}
	if ($uploadok == 0) 
	{
		echo "sorry your file was not upload<br>";
	}
	else 
	{
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
		{
			echo "The file ". basename($_FILES["fileToUpload"]["name"]) . "has uploaded";
			// header("location:timthumb.php?src=".basename($_FILES["fileToUpload"]["name"]).'&q=10');
			
		}
		else
			echo "an error while uploadig<br>";
	}
	/*$filename=$_FILES["fileToUpload"]["name"];
	$newfilename=md5($filename);
	$filetmploc=$_FILES["fileToUpload"]["tmp_name"];
	$filetype=$_FILES["fileToUpload"]["type"];
	$filesize=$_FILES["fileToUpload"]["size"];
	$fileerror=$_FILES["fileToUpload"]["error"];
	// $newfilename=preg_replace('#[^a-z.0-9]#i', 'hjgiuhjg', $filename);
	var_dump($filename);
	var_dump($filetype);
	var_dump($filetmploc);	
	$check=getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	var_dump($check);
	// if ($filetmploc == NULL) //file not choosen
	// {
	// 	echo "Error: please browse for a file";
	// 	exit();
	// }
	if ($filesize>3000000) 
	{
	echo "Error: please choose less than 3 mb";
	exit();
	}
	// else if (!preg_match("/.(image/jpeg|.png)", $filetype)) 
	// {
	// 	echo "Error: your image was not jpg or png";
	// 	unlink($filetmploc);//remove the uploaded file from php temp folder
	// 	exit();
	// }
	else if ($fileerror==1) 
	{
		echo "Error : an error occured .try again later";
		exit();
	}
	var_dump($target_dir);
	$moveresult=move_uploaded_file($_FILES['fileToUpload']['tmp_name'], '/var/www/psybo_site/psybo/Psybo-Site');#$target_dir);
	if ($moveresult != true) 
	{
		echo "Error :file not uploaded .try again";
		return;
	}*/
	

}	

?>




<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
<!-- </form>
<form action="my_upload.php" enctype="multipart/form-data" method="post">Photo <input name="image" size="30" type="file" /> <input name="upload" type="submit" value="Upload" /></form>


 <form action="" method="post" enctype="multipart/form-data"> -->
	<!-- <img <?php //echo "\"src=".$_FILES['fileToUpload']['tmp_name']."\""; ?> > -->
<!-- </form> -->
</body>
</html> 