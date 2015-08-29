
<?php 
	error_reporting(E_ALL);
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
<header>
	<img src="img/logo-admin.png" alt="">
</header>
<nav>
	<ul class="side-links">
		<li><a href="tabDashboard.php">Dashboard</a></li>
		<li><a href="tabHome.php">Home</a></li>
		<li><a href="tabPortfolio.php">Portfolio</a></li>
		<li><a href="tabService.php">Service</a></li>
		<li><a href="tabTeam.php">Team</a></li>
		<li><a href="tabAbout.php">About</a></li>
		<li><a href="tabContact.php">Contact</a></li>
		<li><a href="changePassword.php">Change Password</a></li>
		<li>
			<form id="form1" name="form1" method="POST" action="">
				<button class="logout" name="logout">Logout </button>
			</form>
		</li>
	</ul>
</nav>
