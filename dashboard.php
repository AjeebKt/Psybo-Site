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
</head>
<body>
	<aside>
	dashbord
	<form id="form1" name="form1" method="POST" action="">
	<button name="logout"> logout </button>
	</form>
	</aside>
</body>
</html>
