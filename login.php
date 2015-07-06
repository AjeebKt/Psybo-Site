<?php 

	if (isset($_SESSION['username']) and isset($_SESSION['password'])) 
	{
		header("location:Dashboard.php");
	}
 ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/css.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: #ccc;">
	<div class="login">
		<form id="loginForm" method="POST">
			<h3>Login</h3>
			<div class="container">
				<div>
					<a class="user"></a>
					<input id="text" placeholder="User Name" type="text">
				</div>
				<div>
					<a class="lock"></a>
					<input id="Password" placeholder="Password" type="password">
				</div>
			</div>
			<button id="loginButton">Login</button>
		</form>
	</div>
</body>
</html>