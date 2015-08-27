<?php 
error_reporting(0);
include 'Database.php';
$objdb=new Database("localhost","root","asd","psybo-db");
// $objdb=new Database('psybotechnologies.com','psyboysg_test','psybotest','psyboysg_psybo-db');
$message="";
session_start();
// session_destroy();
if (isset($_POST['changeSubmit']))
{
	if (!empty($_POST['newPwrd']) and !empty($_POST['confirmPwrd'])) 
	{
		if( $_POST['newPwrd'] == $_POST['confirmPwrd'] ) 
		{
			echo "string";
			$currentPwd=md5($_POST['currentPwrd']);
			var_dump($currentPwd);
			// $query="SELECT password FROM admin WHERE password = '".$currentPwd."'";
			// $select=mysqli_query($condb,$query);
			$result=$objdb->select("admin",array("password"),array("password",$currentPwd));
			var_dump($result);
			// if ($select == FALSE) 
			// {
			// 	"<script type='text/javascript'>
			// 		alert('canot change password ath this time.please try agian later !');
			// 	</script>";
			// }
			if (!empty($result)) 
			{
				foreach ($result[0] as $key => $value) 
				{
					if (is_string($key) and $key == "password") 
					{
						if ($currentPwd == $value) 
						{
							$newPwd=md5($_POST['newPwrd']);
							$objdb->update("admin",array("password"),array($newPwd),array("password",$currentPwd) );
							header("location:admin.php");
						}
						else
						{
							$message= "<script type='text/javascript'>
									alert('Incorrecct passwords.please try again!');
								</script>";
						}	
					}
				}
			}
			else
			{
				$message= "<script type='text/javascript'>
						alert('Incorrect password ,try again later');
					</script>";
			}
		}
		else
		{
			$message= "<script type='text/javascript'>
						alert('confirm password incorrect.please try again!');
					</script>";
		}
	}
	else
	{
		$message= "<script type='text/javascript'>
					alert('Please enter the new password!');
				</script>";	
	}	
}
if (isset($_POST['cancel']) )
{
	// header('Location: ' . $_SERVER['HTTP_REFERER']) ;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/admin-style.css">
	<title>Change Password</title>
</head>
<body>
	<?php include 'dash.php'; ?>
	<section class="change-pwrd">
		<div class="first-content">
			<h3>Change Password</h3>
			<form action="" method="POST">
				<div class="group">
					<label for="currentPwrd">Current Password</label>
					<input id="currentPwrd" name="currentPwrd" type="password" required>
				</div>
				<div class="group">
					<label for="newPwrd">New Password</label>
					<input id="newPwrd" name="newPwrd" type="password" required>
				</div>
				<div class="group">
					<label for="confirmPwrd">Confirm Password</label>
					<input id="confirmPwrd" name="confirmPwrd" type="password" required>
				</div>
				<div class="group">
					<button name="changeSubmit">Update</button>
				</div>
			</form>
			<div class="group">
				<form action=<?php echo "\"".$_SERVER['HTTP_REFERER']."\"" ?> method="POST">
					<button name="cancel">Cancel</button>
				</form>
			</div>
		</div>
	</section>
	<?php echo $message; ?>
</body>
</html>
<?php 

