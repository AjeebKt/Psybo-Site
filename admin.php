<?php 
	error_reporting(0);
	require_once('Database.php');
	$condb=new mysqli("psybotechnologies.com","psyboysg_test","psybotest","psyboysg_psybo-db");
    $objdb=new Database('psybotechnologies.com','psyboysg_test','psybotest','psyboysg_psybo-db');
	// $condb = new mysqli('localhost', 'root', 'asd', 'psybo-db');
	// $objdb = new Database('localhost', 'root', 'asd', 'psybo-db');
	$message="";
	session_start();
	if (isset($_SESSION['username']))
	{
		header("location:tabPortfolio.php");
	}

	else if (isset($_POST['loginButton'])) 
	{
		if (isset($_POST['txtusername']) and isset($_POST['txtpassword']) ) 
		{
			$username=$_POST['txtusername'];
			$password=$_POST['txtpassword'];
			if ( preg_match('/^[A-Za-z0-9., _-]*$/', $username) and preg_match('/^[A-Za-z0-9., _-]*$/', $password) )
			{
				$password=md5($_POST['txtpassword']);
				$query="SELECT username,password FROM admin WHERE username = '".$username."' AND password = '".$password."'";
				$result=mysqli_query($condb,$query);
				if ($result==FALSE) 
				{
					$message="<script type='text/javascript'>
								alert('login failed.please try agian later !');
							</script>";		
				}
				if ($result->num_rows==1) 
				{
					
					$_SESSION['login']='YES';
					$_SESSION['username']=$_POST['txtusername'];
					$_SESSION['password']=md5($_POST['txtpassword']);
					header("location:tabDashboard.php");
				}
				else
				{
					$message= "<script type='text/javascript'>
						alert('Please enter valid username and password');
					</script>";
				}
			}
		}
		else
		{
			$message= "<script type='text/javascript'>
						alert('Please enter username and password');
					</script>";
		}
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Login</title>
	<link rel="stylesheet" href="css/normalize.css">
	<!-- <link rel="stylesheet" href="css/style.css"> -->
	<link rel="stylesheet" href="css/admin-style.css">
</head>
<body>
	<form id="loginForm" method="POST">
		<div class="login">
			<div class="log-box">
				<h3>Login</h3>
				<div >
						<input id="txtusername" name="txtusername" placeholder="User Name" value="" type="text" required aria-required="true" pattern="[A-Za-z-0-9]+">
						<input id="Password" name="txtpassword" placeholder="Password" required type="password">
					<div class="remember-me">
						<input id="checkBox" type="checkbox">
						<label for="checkBox">Remember Me</label>
					</div>
					<button class="login-button" name="loginButton">Login</button>
				</div>
			</div>
		</div>
	</form>
	<?php echo $message; ?>
</body>
</html>