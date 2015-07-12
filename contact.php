<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/theme.css">
	<title>CONTACT US</title>
</head>
<body>
<!-- Logo -->
	<div class="container">
		<header>
			<div class="logo">
				<a href="index.php"><img src="img/logo.png" alt="Psybo Logo"></a>
			</div>
			<div class="div-center">
				<nav class="nav-menu">
					<ul class="navigation-links">
						<li><a href="index.php">HOME</a></li>
						<li><a href="portfolio.php">PORTFOLIO</a></li>
						<li><a href="team.php">TEAM</a></li>
						<li><a href="service.php">SERVICE</a></li>
						<li><a href="about.php">ABOUT</a></li>
						<li><a class="active" href="contact.php">CONTACT</a></li>
					</ul>
				</nav>
			</div>
		</header>
		<section class="contact">
			<div class="message">
				<h3>CONTACT</h3>
				<form id="message-form" class="msg-form" action="post">Name
					<input type="text" class="name" required= "required">Email
					<input type="email" class="mail" required= "required">Comments
					<textarea name="comments" id="comments" cols="30" rows="10" class="msg" required= "required"></textarea>
					<button class="button" id="buttonmail" name="buttonmail">SEND</button>
				</form>
			</div>
		</section>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>

<?php 

if (isset($_POST['buttonmail']) and isset($_POST['txtname']) and isset($_POST['txtemail']) and isset($_POST['txtcomments']))
{

	if ( filter_var($_POST['txtemail'] , FILTER_VALIDATE_EMAIL))
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
			echo "commet not send at this time";
	}
}
?>