<?php 
error_reporting(0);
include_once 'Database.php';
// $objdb = new Database('localhost', 'root', 'asd', 'psybo-db');
$objdb = new Database('psybotechnologies.com','psyboysg_test','psybotest','psyboysg_psybo-db');
$resulthead = $objdb->select('headings', array(), array('name', 'about'));
$resultitem = $objdb->select('subHeadings', array(), array('name', 'about'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/theme.css">
	<link rel="stylesheet" href="css/responsive.css">
	<title>About PSYBO Technologies</title>
</head>
<body>
<!-- Logo -->
	<header>
		<div class="container">
			<div class="logo">
				<a href="index.php"><img src="img/logo.png" alt="Psybo Logo"></a>
			</div>
			<nav class="nav-menu">
				<ul class="navigation-links">
					<li><a href="index.php">HOME</a></li>
					<!-- <li><a href="portfolio.php">PORTFOLIO</a></li> -->
					<li><a href="service.php">SERVICE</a></li>
					<li><a href="team.php">TEAM</a></li>
					<li class="active"><a href="about.php">ABOUT</a></li>
					<li><a href="contact.php">CONTACT</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<section>
		<div class="container">
			<div class="about-us">
				<h2>
						<?php foreach ($resulthead[0] as $key => $value) {
						if ($key == 'title' and is_string($key)) {
							echo $value;
						}
					} ?>
				</h2>
				<div class="title-box">
					<p class="p-bold">
						<?php foreach ($resulthead[0] as $key => $value) {
							if (is_string($key) and $key == 'description') {
								echo $value;
							}
						} ?>
					</p>
				</div>
				<div class="title-box">
					<p>
						<?php foreach ($resulthead[0] as $key => $value) {
							if (is_string($key) and $key == 'secDescription') {
								echo $value;
							}
						} ?>
					</p>
				</div>
			</div>
			<ul class="our-vision">
			<?php foreach ($resultitem as $key => $value) {
			 ?>
				<li>
					<h3><?php foreach ($value as $key => $val) {
							if (is_string($key) and $key == 'title') {
								echo $val;
							}
						} ?>
					</h3>
					<p>
						<?php foreach ($value as $key => $val) {
							if (is_string($key) and $key == 'description') {
								echo $val;
							}
						} ?>
					</p>	
				</li>
			<?php } ?>
			</ul>
		</div>
	</section>
	<?php include 'footer.php'; ?>
</body>
</html>

