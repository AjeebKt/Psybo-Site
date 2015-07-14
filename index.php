	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/normalize.css">
	<!-- <link rel="stylesheet" href="css/css.css"> -->
	<script src="js/jquery-1.10.2.js"></script>
	<script src="bx/jquery.bxslider.min.js"></script>
	<link href="bx/jquery.bxslider.css" rel="stylesheet">
	<link rel="stylesheet" href="css/theme.css">
	<script>
		$('.bxslider').bxSlider({
		  nextSelector: '#R-arrow',
		  prevSelector: '#L-arrow',
		  // nextText: 'Onward →',
		  // prevText: '← Go back'
		});
	</script>
	<title>PSYBO Home</title>
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
						<li><a class="active" href="index.php">HOME</a></li>
						<li><a href="portfolio.php">PORTFOLIO</a></li>
						<li><a href="team.php">TEAM</a></li>
						<li><a href="service.php">SERVICE</a></li>
						<li><a href="about.php">ABOUT</a></li>
						<li><a href="contact.php">CONTACT</a></li>
					</ul>
				</nav>
			</div>
		</header>
<!-- Slides -->
		<ul class="bxslider">
			<li><img src="img/01.jpg" alt=""></li>
			<li><img src="img/02.png" alt=""></li>
			<li><img src="img/03.png" alt=""></li>
		</ul>
		<!-- <div class="slider">
			<h2>____HELLO____</h2>
			<h1>WELCOME TO <b>PSYBO</b> TECHNOLOGIES</h1>
			<h2>THE FINAL SOFTWARE DESTINATION</h2>
		</div> -->
		<div id="R-arrow" class="arrow-right"><a href="#"></a></div>
		<div id="L-arrow" class="arrow-left"><a href="#"></a></div>
	</div>
	<?php include 'footer.php'; ?>

</body>
</html>
