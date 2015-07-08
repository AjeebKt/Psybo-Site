<?php 
	session_start();
	if ( isset($_SESSION['login'])!='YES' ) 
	{
		// echo "login success";
		header("location:admin.php");

	}

	if (isset($_POST['logout'])) 
	{
		session_destroy();
		header("location:admin.php");
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
			<a href="tabPortfolio.php"><button class="button">Portfolio</button></a>
			<a href="tabTeam.php"><button class="button">Team</button></a>
	</aside>
</body>
</html>
