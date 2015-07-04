 <html>
 	<form name="loginform" id="loginform" method="POST" action="">
	 	<input type="text" name="txtusername" id="txtusername" placeholder="uesername"><br>
	 	<input type="password" name="textpassword" id="txtpassword" placeholder="Password"><br>
	 	<input type="submit" name="btnlogin" id="btnlgin" value="sign in">
 	</form>
 </html>

<?php 

	if (isset($_SESSION['username']) and isset($_SESSION['password'])) 
	{
		header("location:Dashbord.php");
	}
 ?>kj

