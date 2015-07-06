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
		<form method="POST" action="">
			<div id="tabPortfolio" class="tab-portfolio">
			<h3>PORTFLIO</h3>
				<label>Portfolio Image</label>
				<input name="" type="text" class="up">
				<button class="browse">Browse</button><br>
				<label>Title</label>
				<input name="" type="text"><br>
				<label>Link</label>
				<input name="" type="text"><br>
				<button class="submit">Submit</button>
			</div>
			<div id="tabTeam" class="tab-team">
			<h3>TEAM MEMBERS</h3>
				<label>Employee Image</label>
				<input name="" type="text"> 
				<button class="browse">Browse</button><br>
				<label>Name</label>
				<input name="" type="text"><br>
				<label>Designation</label>
				<input name="" type="text"><br>
			<h4>Personal Links</h4>
				<label>Facebook</label>
				<input name="" type="text"><br>
				<label>Twitter</label>
				<input name="" type="text"><br>
				<label>LinkedIn</label>
				<input name="" type="text"><br>
				<label>Google+</label>
				<input name="" type="text"><br>
				<button class="submit">Submit</button>
			</div>

		</form>
	</section>
</body>
</html>
