
<?php 
error_reporting(0);
	session_start();
	if ( empty(isset($_SESSION['username'])) ) 
	{
		header("location:admin.php");}

	if (isset($_POST['logout'])) 
	{
		session_destroy();
		header("location:admin.php");
	}
 ?>
<header class="header-fix">
	<img src="img/logo.png" alt="">
	<form id="form1" name="form1" method="POST" action="">
		<button class="logout" name="logout">Logout </button>
	</form>
</header>
<nav>
	<ul class="side-links">
		<li><a href="tabPortfolio.php">Portfolio</a></li>
		<li><a href="tabTeam.php">Team</a></li>
		<li><a href="changePassword.php">Change Password</a></li>
	</ul>
</nav>