<?php 

session_start();
if (isset($_SESSION['username']) and isset($_SESSION['password'])) 
{
	// echo "login success";

}
// else
// 	header("location:login.php");

// if (isset($_POST['logout'])) 
// {
// 	session_destroy();
// 	header("location:login.php");
// }
if (isset($_POST['btnPortfolio'])) 
{
	$target_dir="/var/www/psybo_site/psybo/Psybo-Site/upload-image";
	$target_file=$target_dir."/".basename($_FILES["uploadPortfolio"]["name"]);
	var_dump(basename($_FILES["uploadPortfolio"]["name"]));
	$file_name=pathinfo($target_file,PATHINFO_BASENAME);
	$file_type=pathinfo($target_file,PATHINFO_EXTENSION);
	var_dump($target_file);
	if (move_uploaded_file($_FILES["uploadPortfolio"]["tmp_name"], $target_file)) 
	{
		chmod($_FILES["uploadPortfolio"], 777);
	}

}

 ?>


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
		<form id="form1" name="form1" method="POST" action="">
			<button class="logout" name="logout">Logout </button>
		</form>
	</header>
	<aside>
			<a href="#tabPortfolio"><button class="button">tab 1</button></a>
			<a href="#tabTeam"><button class="button">tab 2</button></a>
	</aside>
	<section>
		<form method="POST" action="" name="form1">
			<div id="tabPortfolio" class="tab-portfolio">
			<h3>PORTFLIO</h3>
				<label>Portfolio Image</label>
				<input name="uploadPortfolio" id="uploadPortfolio" type="file" class="up"><br>
				<label>Title</label>
				<input name="txtTitle" type="text"><br>
				<label>Link</label>
				<input name="txtLink" type="text"><br>
				<button class="submit" name="btnPortfolio">Submit</button>
			</div>
			<div id="tabTeam" class="tab-team">
			<h3>TEAM MEMBERS</h3>
				<label>Employee Image</label>
				<input name="uploadTeam" type="file"><br>
				<label>Name</label>
				<input name="txtName" type="text"><br>
				<label>Designation</label>
				<input name="txtDesignation" type="text"><br>
			<h4>Personal Links</h4>
				<label>Facebook</label>
				<input name="txtFacebook" type="text"><br>
				<label>Twitter</label>
				<input name="txtTwitter" type="text"><br>
				<label>LinkedIn</label>
				<input name="txtLinkedin" type="text"><br>
				<label>Google+</label>
				<input name="txtGplus" type="text"><br>
				<button class="submit">Submit</button>
			</div>

		</form>
	</section>
</body>
</html>
