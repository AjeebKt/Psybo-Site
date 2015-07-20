<?php 
error_reporting(0);

if (isset($_POST['buttonmail']) )
	// and isset($_POST['msgName']) and isset($_POST['msgEmail']) and isset($_POST['comments']))
{

	if ( filter_var($_POST['msgEmail'] , FILTER_VALIDATE_EMAIL))
	{
		$to="pnoushid@gmail.com";
		$from = $_POST['msgEmail'];
		$name = $_POST['msgName'];
		$subject="comments from ".$name;
		$message=$_POST['txtcomments'];
		$message=wordwrap($message,70,"<br>");
		$message=str_replace("\n.","\n..",$message);
		$headers='From: '.$from;
		$mail=mail($to, $subject, $message);
		if ($mail==TRUE)
			$message="<script type='text/javascript'	
						alert('comment has been sent');
						</script>";

		else
			$message= "<script type='text/javascript'>
					alert('Comments are not send at this time!.thanks');
				</script>";
	}
}
?>
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
	</div>
	<div class="cap-full">
		<div class="container">
			<div class="caption1">
				<h3>Let us Hear from <br><b>"You"</b></h3>
			</div>
		</div>
	</div>
	<div class="contact">
		<div class="container">
			<div class="message">
				<form id="message-form" class="msg-form" method="POST" action="">
					<label for="msgName">Name</label>
					<br>
					<input id="msgName" name="msgName" type="text" class="name" required>
					<label for="msgEmail">Email</label>
					<br>
					<input id="msgEmail" name="msgEmail" type="email" class="mail" required>
					<label for="msgComments">Comments</label>
					<br>
					<textarea id="msgComments" name="comments" cols="30" rows="5" class="msg" required></textarea>
					<button class="button" id="buttonmail" name="buttonmail">SEND</button>
				</form>
			</div>
			<div class="black-img">
				<img src="img/blacky.png" alt="">
			</div>
		</div>
	</div>
	<?php include 'footer.php'; 
		echo $message;
	?>
</body>
</html>
