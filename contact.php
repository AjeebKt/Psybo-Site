<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/css.css">
	<title>CONTACT US</title>
</head>
<body>
	<header>
		<div class="container">
			<div class="logo">
				<a href="index.php"><img src="img/logo-go.png" alt="Psybo Logo"></a>
			</div>
			<nav>
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
		<div class="map"></div>
		<div class="message">
			<div class="container">
				<h3>CONTACT</h3>
				<form id="message-form" class="msg-form" action="post">Name
					<input type="text" class="name" required= "required">Email
					<input type="email" class="mail" required= "required">Comments
					<textarea name="comments" id="comments" cols="30" rows="10" class="msg" required= "required"></textarea>
					<button class="button" id="buttonmail" name="buttonmail">SEND</button>
				</form>
			</div>
		</div>
	</section>
	<?php include 'footer.php'; ?>
</body>
</html>