
<?php 
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
	<img src="img/logo-go.png" alt="">
	<form id="form1" name="form1" method="POST" action="">
		<button class="logout" name="logout">Logout </button>
	</form>
</header>
<nav>
	<ul class="side-links">
		<li><a href="tabPortfolio.php">Portfolio</a></li>
		<li><a href="tabTeam.php">Team</a></li>
		<li><a href="skill.php">Skill Meter</a></li>
	</ul>
</nav>