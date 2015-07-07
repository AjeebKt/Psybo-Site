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
		<img src="img/logo-go.png" alt="">
		<form id="form1" name="form1" method="POST" action="">
			<button class="logout" name="logout">Logout </button>
		</form>
	</header>
	<aside>
			<a href="#tabPortfolio"><button class="button">Portfolio</button></a>
			<a href="#tabTeam"><button class="button">Team</button></a>
	</aside>
	<section>
		<form id="formPortfolio" name="formPortfolio" method="POST" action="">
			<div id="tabPortfolio" class="tab-portfolio">
			<h3>PORTFLIO</h3>
				<div class="portfolio-container">
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
