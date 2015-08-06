
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


<?php 
////////////////////////////rdeuce image size///////////////////
function reduce_image_size($img , $source , $dest , $maxw , $maxh)
{
	$jpg = $source.$img;
	if ($jpg) 
	{
		list($width , $height ) = getimagesize($jpg);//$type will return the type of the image
		// var_dump($widkjoth);
		$source = imagecreatefromjpeg($jpg);
		if ( $maxw >= $width and $mxh >= $height) 
		{
			$ratio = 1;
		} 
		else if ($width > $height)
		{
			$ratio = $maxw / $maxh;

		}
		else
		{
			$ratio =$maxh / $maxw;

		}

		$thumb_width =round($width * $ratio);
		$thumb_height = round($height * $ratio);

		$thumb = imagecreatetruecolor($thumb_width, $thumb_height );
		imagecopyresampled($thumb, $source, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height);

		$path = $dest.$img.rand();
		imagejpeg($thumb , $path ,35);
	}
	imagedestroy($thumb);
	imagedestroy($source);
}
if (isset($_POST['submit'])) 
{
	// $check1 = getimagesize($img);
	// var_dump($check1);
	$rand = rand();
	if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], getcwd().'/test/'.$rand) )#basename($_FILES["fileToUpload"]["name"])) ) 
	{
		// var_dump($img);
		$source = getcwd().'/test/';
		$dest = getcwd().'/test/' ;
		$img = $rand;
		// var_dump($img)	;
		reduce_image_size($img , $source , $dest , 200 ,200 );
		unlink($source.$img);
		imagejpeg($source.$rand , $source , 35);
		echo "success";
	}
}
//////////////////////////////////////////////////////////////////////////////
 ?>



