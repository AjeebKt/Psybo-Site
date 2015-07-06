
<?php 
	require_once("Database.php");
	$objdb=new Database("localhost","root","asd","psybo-db");
	$condb=new mysqli("localhost","root","asd","psybo-db");
	session_start();
	if (isset($_SESSION['username']) and isset($_SESSION['password'])) 
	{
		header("location:dashboard.php");
	}

	else if (isset($_POST['loginButton'])) 
	{
		$query="SELECT username,password FROM admin WHERE username = '".$_POST['username']."' AND password = '".$_POST['password']."'";
		// var_dump($query);
		$result=mysqli_query($condb,$query);
		if ($result==FALSE) 
		{
			trigger_error($condb->error);
		}
		if ($result->num_rows==1) 
		{
			
			$_SESSION['login']='YES';
			$_SESSION['username']=$_POST['username'];
			$_SESSION['password']=$_POST['password'];
			header("location:dashboard.php");
		}
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
		<form id="loginForm" class="login" method="POST" action="">
			<h3>Login</h3>
			<div>
				<a class="user"></a>
				<input id="username" name="username" placeholder="User Name" type="text">
			</div>
			<div>
				<a class="lock"></a>
				<input id="password" name="password" placeholder="Password" type="password">
			</div>
			<button name="loginButton">Login</button>
		</form>
	</div>
</body>
</html>