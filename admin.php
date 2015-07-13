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
		$username=str_replace("%20", " ", $username);
		$password=md5($_POST['txtpassword']);
		// $password=strip_tags($password);
		// $password=preg_replace('/[^A-Za-z0-9\s.\s-]/', '', '$password');
		// $password=str_replace(array('-','.'), '' , $password);

		// if(filter_var($_POST['txtusername'] , FILTER_SANITIZE_ENCODED));
		// 	{
		// 		var_dump($passwo)
		// 		echo "please enter correct password";

		// 	}// exit();
		// // $Password=str_replace("%20", " ", $Password);
		$query="SELECT username,password FROM admin WHERE username = '".$username."' AND password = '".md5($_POST['txtpassword'])."'";
		// var_dump($query);
		$result=mysqli_query($condb,$query);
		if ($result==FALSE) 
		{
			"<script type='text/javascript'>
				alert('login failed.please try agian later !');
			</script>";		}
		if ($result->num_rows==1) 
		{
			
			$_SESSION['login']='YES';
			$_SESSION['username']=$_POST['txtusername'];
			$_SESSION['password']=md5($_POST['txtpassword']);
			// var_dump($_SESSION['username']);	
			header("location:tabPortfolio.php");
		}
		else
		{
			echo "<script type='text/javascript'>
				alert('Please enter valid username and password');
			</script>";
		}
	}
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
<body style="background-color: #095936;">
	<form id="loginForm" method="POST">
		<div class="login">
			<div class="container">
				<h3>Login</h3>
				<div >
					<div>
						<a class="user"></a>
						<input id="txtusername" name="txtusername" placeholder="User Name" value="" type="text" required aria-required="true" pattern="[A-Za-z-0-9]+">
					</div>
					<div>
						<a class="lock"></a>
						<input id="Password" name="txtpassword" placeholder="Password" required type="password"><?php//echo $msg; ?>
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