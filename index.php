<?php 
if (isset($_POST['buttonmail']) and isset($_POST['txtname']) and isset($_POST['txtemail']) and isset($_POST['txtcomments']))
{

	$to="pnoushid@gmail.com";
	$from = $_POST['txtemail'];
	$name = $_POST['txtname'];
	$subject="comments from ".$name;
	$message=$_POST['txtcomments'];
	$message=wordwrap($message,70,"<br>");
	$message=str_replace("\n.","\n..",$message);
	$headers='From:'.$from."\r\n";
	$mail=mail($to, $subject, $message,$headers);
	if ($mail==TRUE)
		echo"comment has been sent";
	else
		echo "Can't Sent comment at this time";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/normalize.css">
	<!-- <link rel="stylesheet" href="css/css.css"> -->
	<link rel="stylesheet" href="css/theme.css">
	<title>PSYBO Home</title>
</head>
<body>
<!-- Logo -->
	<div class="container">
		<header>
			<div class="logo">
				<a href="index.php"><img src="img/logo.png" alt="Psybo Logo"></a>
			</div>
		</header>
	</div>
<!-- Slides -->
	<div class="container">
		<div class="slider">
			<h2>____HELLO____</h2>
			<h1>WELCOME TO <b>PSYBO</b> TECHNOLOGIES</h1>
			<h2>THE FINAL SOFTWARE DESTINATION</h2>
		</div>
	</div>
<!-- Navigation Menu -->
	<div class="div-menu">
		<div class="container">
			<div class="div-center">
				<nav class="nav-menu">
					<ul class="navigation-links">
						<li><a class="active" href="index.php">HOME</a></li>
						<li><a href="portfolio.php">PORTFOLIO</a></li>
						<li><a href="team.php">TEAM</a></li>
						<li><a href="service.php">SERVICE</a></li>
						<li><a href="about.php">ABOUT</a></li>
						<li><a href="contact.php">CONTACT</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
	<div class="picture">
		<img src="img/010.png" alt="">
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
