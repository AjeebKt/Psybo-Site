

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/css.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<img src="img/logo-go.png" alt="">
		<form id="form1" name="form1" method="POST" action="">
			<button class="logout" name="logout">Logout </button>
		</form>
	</header>
<<<<<<< HEAD
	<!-- <aside>
			<a href="#tabPortfolio"><button class="button">Portfolio</button></a>
			<a href="#tabTeam"><button class="button">Team</button></a>
	</aside> -->
=======
	<aside>
			<a href="tabPortfolio.php"><button class="button">Portfolio</button></a>
			<a href="tabTeam.php"><button class="button">Team</button></a>
	</aside>
>>>>>>> 6cdf1e494242df29174ada182be3bfd1fe9af01c
	<section>
		<form id="formPortfolio" name="formPortfolio" method="POST" action="" enctype="multipart/form-data">
			<div id="tabPortfolio" class="tab-portfolio">
			<h3>PORTFLIO</h3>
				<div class="portfolio-container">
<<<<<<< HEAD
					<label>Portfolio Image</label>
					<input name="uploadPortfolio" id="uploadPortfolio" type="file" class="up"><br>
=======
>>>>>>> 6cdf1e494242df29174ada182be3bfd1fe9af01c
					<label>Title</label>
					<input name="txtTitle" type="text"><br>
					<label>Link</label>
					<input name="txtLink" type="text"><br>
					<label>Portfolio Image</label>
					<input name="uploadPortfolio" type="file" class="up"><br>
					<button class="submit" name="btnPortfolioSubmit">Submit</button>
					<button name="btnReset" class="reset">Reset</button>
				</div>
			</div>
		</form>
		<form id="formTeam" name="formTeam" method="POST" action="">	
			<div id="tabTeam" class="tab-team">
			<h3>TEAM MEMBERS</h3>
				<div class="team-container">
					<label>Name</label>
					<input name="txtName" type="text"><br>
					<label>Designation</label>
					<input name="txtDesignation" type="text"><br>
				</div><br>
			<h4>Personal Links</h4>
				<div class="team-container">
					<label>Facebook</label>
					<input name="txtFacebook" type="text"><br>
					<label>Twitter</label>
					<input name="txtTwitter" type="text"><br>
					<label>LinkedIn</label>
					<input name="txtLinkedin" type="text"><br>
					<label>Google+</label>
					<input name="txtGplus" type="text"><br>
					<label>Employee Image</label>
					<input name="uploadTeam" type="file"><br>
					<button name="btnTeamSubmit" class="submit">Submit</button>
					<button name="btnReset" class="reset">Reset</button>
				</div>
			</div>
		</form>
	</section>
</body>
</html>
<?php 

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
		$target_dir=getcwd()."/upload-image/";
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
		if ($_FILES["fileToUpload"]["size"] > 30000000)
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
			}
			else
				echo "an error while uploadig<br>";
		}
	}
?>
