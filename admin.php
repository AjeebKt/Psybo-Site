<?php 
	require_once("Database.php");
	// $objdb=new Database("localhost","root","asd","psybo-db");
	$condb=new mysqli("localhost","root","asd","psybo-db");
	session_start();
	if (isset($_SESSION['username']))
	{
		header("location:tabPortfolio.php");
	}

	else if (isset($_POST['loginButton'])) 
	{
		$username=filter_var($_POST['txtusername'],FILTER_SANITIZE_ENCODED);
		$username="";
		$query="SELECT username,password FROM admin WHERE username = '".$username."' AND password = '".$_POST['txtpassword']."'";
		// var_dump($query);
		$result=mysqli_query($condb,$query);
		if ($result==FALSE) 
		{
			trigger_error($condb->error);
		}
		if ($result->num_rows==1) 
		{
			
			$_SESSION['login']='YES';
			$_SESSION['username']=$_POST['txtusername'];
			$_SESSION['password']=$_POST['txtpassword'];
			// var_dump($_SESSION['username']);	
			header("location:tabPortfolio.php");
		}
	}
	else
		$msg="please Enter correct username and password";
	$msg="";
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/css.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: #ccc;">
	<form id="loginForm" method="POST">
		<div class="login">
			<div class="container">
				<h3>Login</h3>
				<div >
					<div>
						<a class="user"></a>
						<input id="txtusername" name="txtusername" value="" type="text" required aria-required="true" pattern="[A-Za-z-0-9]+">
					</div>
					<div>
						<a class="lock"></a>
						<input id="Password" name="txtpassword" placeholder="Password" required type="password"><?php echo $msg; ?>
					</div>
					<div class="remember-me">
						<input id="checkBox" type="checkbox">
						<label for="checkBox">Remember Me</label>
					</div>
				</div>
			</div>
		<button class="login-button" name="loginButton">Login</button>
		</div>
	</form>
</body>
</html>