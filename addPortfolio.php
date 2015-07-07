<?php 
	include 'dash.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Portfolio</title>
</head>
<body>
	<section>
		<form id="formPortfolio" name="formPortfolio" method="POST" action="" enctype="multipart/form-data">
			<div id="tabPortfolio" class="tab-portfolio">
			<h3>PORTFLIO</h3>
				<div class="div-align">
					<label>Title</label><br>
					<input name="txtTitle" type="text">
				</div>
				<div class="div-align">
					<label>Link</label><br>
					<input name="txtLink" type="text">
				</div>
				<div class="div-align left">
					<label>Description</label><br>
					<textarea name="portfolioDescription" id="portfolioDescription" cols="40" rows="2"></textarea><br>
				</div>
				<div class="div-align">
					<label>Portfolio Image</label><br>
					<input name="uploadPortfolio" type="file" class="up"><br>
				</div>
				<button class="submit" name="btnPortfolioSubmit">Submit</button>
				<button name="btnReset" class="reset">Reset</button>
			</div>
		</form>
	</section>
</body>
</html>

<?php 
include 'Database.php';
$objdb=new Database("localhost","root","asd","psybo-db");

// session_start();
// if (isset($_SESSION['username']) and isset($_SESSION['password'])) 
// {
// 	// echo "login success";

// }
// else
// 	header("location:login.php");

// if (isset($_POST['logout'])) 
// {
// 	session_destroy();
// 	header("location:login.php");
// }
// echo "string";
// var_dump(basename($_FILES["uploadPortfolio"]["name"]));
	if (isset($_POST['btnPortfolioSubmit'])) 
	{
		// echo "succes";
		$target_dir=getcwd()."/upload-image/";
		// var_dump("Target dir :  ".$target_dir);
		$target_file=$target_dir . basename($_FILES["uploadPortfolio"]["name"]);
		// var_dump("Target file  : ".$target_file);
		$file_name=basename($_FILES["uploadPortfolio"]["name"]);
		$file_type=pathinfo($target_file,PATHINFO_EXTENSION);
		// var_dump("image file type  :   ".$file_type);

		$check=getimagesize($_FILES["uploadPortfolio"]["tmp_name"]);
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
		if ($_FILES["uploadPortfolio"]["size"] > 30000000)
		{
			echo("sorry files is to large<br>");	
			$uploadok=0;
		}
		// echo "string";
		// echo "is an image ".$check["mime"].".";
		if (file_exists($target_file)) 
		{
			echo "sorry file already exist .please select onother file<br>";
			$uploadok=0;
		}
		if ($file_type != "jpg" and $file_type=="png" and $file_type =! "jpeg") 
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
			$upload=move_uploaded_file($_FILES["uploadPortfolio"]["tmp_name"], $target_file); 
			if ($upload !== TRUE) 
			{
				echo "Error in upload image";
			}
		}
		$values_files=array($file_name,$file_type);
		$values_ptf=array($_POST['txtTitle'],$_POST['txtLink'],$_POST['portfolioDescription']);
		// var_dump($values_ptf);
		$objdb->insert_mul_ptf($values_files,$values_ptf);

	}
?>	