<?php 

	if (isset($_SESSION['username']) and isset($_SESSION['password'])) 
	{
		header("location:Dashbord.php");
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="./css/normalize.css">
	<link rel="stylesheet" href="./css/css.css">
	<link rel="stylesheet" href="./css/style1.css">
</head>
<body>
	<div class="bg-login">
		<form id="loginForm" class="login" method="POST">
			<h3>Login</h3>
			<div>
				<a class="user"></a>
				<input id="text" placeholder="User Name" type="text">
			</div>
			<div>
				<a class="lock"></a>
				<input id="Password" placeholder="Password" type="password">
			</div>
			<button id="loginButton">Login</button>
		</form>
	</div>
</body>
</html>