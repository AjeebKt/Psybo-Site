<?php 
include 'Database.php';
$objdb=new Database("localhost","root","asd","psybo-db");
$condb=new mysqli("localhost","root","asd","psybo-db");
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/theme.css">
	<title>Change Password</title>
</head>
<body style="background-color:#008060;">
	<div class="change-pwrd">
		<h3>Change Password</h3>
		<form action="" method="POST">
			<label for="currentPwrd">Current Password</label>
			<input id="currentPwrd" name="currentPwrd" type="password">
			<label for="newPwrd">New Password</label>
			<input id="newPwrd" name="newPwrd" type="password">
			<label for="confirmPwrd">Confirm Password</label>
			<input id="confirmPwrd" name="confirmPwrd" type="password">
			<button name="changeSubmit">Submit</button>
			<button>Reset</button>
		</form>
	</div>
</body>
</html>
<?php 

if (isset($_POST['changeSubmit']))
{
	$username=filter_var($_POST['txtusername'],FILTER_SANITIZE_ENCODED);
	$username=str_replace("%20", " ", $username);
	if( $_POST['newPwrd'] == $_POST['confirmPwrd'] ) 
	{
		$currentPwd=$_POST['currentPwrd'];
		$query="SELECT password FROM admin WHERE password = '".$currentPwd."'";
		$select=mysqli_query($condb,$query);
		if ($select == FALSE) 
		{
			"<script type='text/javascript'>
				alert('canot change password ath this time.please try agian later !');
			</script>";
		}
			
			$newPwd=md5($_POST['newPwrd']);
			var_dump($_POST['currentPwrd']);
			var_dump($newPwd);
			$objdb->update("admin",array("password"),array($newPwd),array("password",md5($_POST['currentPwrd'])) );
			header("location:admin.php");
	}
	else
		{
			"<script type='text/javascript'>
				alert('confirm password incorrect.please try again!');
			</script>";
		}	
}

?>