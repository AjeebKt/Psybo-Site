<?php 

session_start();
if (isset($_SESSION['username']) and isset($_SESSION['password'])) 
{
	// echo "login success";

}
else
	header("location:login.php");

if (isset($_POST['logout'])) 
{
	session_destroy();
	header("location:login.php");
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
		
	</header>
	<aside>
	<form id="form1" name="form1" method="POST" action="">
	<button name="logout"> logout </button>
	</form>
		<a href="#tabPortfolio"><button class="button1">tab 1</button></a>
		<a href="#tabTeam"><button class="button2">tab 2</button></a>
	</aside>
	<section>
		<div id="tabPortfolio" class="tab-portfolio">
			<div>Insert</div>
			<div>Update</div>
			<div>Delete</div>
		</div>
		<div id="tabTeam" class="tab-team">
			<div>Insert</div>
			<div>Update</div>
			<div>Delete</div>
		</div>
	</section>
</body>
</html>
