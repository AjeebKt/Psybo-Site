<?php 
error_reporting(0);
include 'Database.php';
$objdb=new Database("localhost","root","asd","psybo-db");
$condb=new mysqli("localhost","root","asd","psybo-db");

$message="";
session_start();
session_destroy();
if (isset($_POST['changeSubmit']))
{
	if (!empty($_POST['newPwrd']) and !empty($_POST['confirmPwrd'])) 
	{
	
		if( $_POST['newPwrd'] == $_POST['confirmPwrd'] ) 
		{
			$currentPwd=md5($_POST['currentPwrd']);
			// $query="SELECT password FROM admin WHERE password = '".$currentPwd."'";
			// $select=mysqli_query($condb,$query);
			$result=$objdb->select("admin",array("password"),array("password",$currentPwd));
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
	header("location:admin.php");
}
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
			<button name="changeSubmit">Update</button>
			<button name="cancel">Cancel</button>

		</form>
	</div>
	<?php echo $message; ?>
</body>
</html>
<?php 

