<!--  <html>
 	<form name="loginform" id="loginform" method="POST" action="">
	 	<input type="text" name="txtusername" id="txtusername" placeholder="uesername"><br>
	 	<input type="password" name="textpassword" id="txtpassword" placeholder="Password"><br>
	 	<input type="submit" name="btnlogin" id="btnlgin" value="sign in">
 	</form>
 </html>
 -->
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
	<title>Admin-Login</title>
	<link rel="stylesheet" href="css/Normalize.css">
	<link rel="stylesheet" href="css/css.css">
	<link rel="stylesheet" href="css/style1.css">
</head>
<body style="background-color: #007350;">
	<div class="bg-login">
		<form id="loginForm" class="login" method="POST">
			<h3>Login</h3>
			<div>
				<a class="user"></a>
				<input id="text" type="text" placeholder="User Name">
			</div>
			<div>
				<a class="lock"></a>
				<input id="Password" type="password" placeholder="Password">
			</div>
			<button id="loginButton">Login</button>
		</form>
	</div>	
</body>
</html>