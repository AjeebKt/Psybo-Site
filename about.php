<?php 
error_reporting(1);
include_once 'Database.php';
$objdb = new Database('localhost', 'root', 'asd', 'psybo-db');
$resulthead = $objdb->select('headings', array(), array('name', 'about'));
$resultitem = $objdb->select('subHeadings', array(), array('name', 'about'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/theme.css">
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
			<h1>
				<?php foreach ($resulthead[0] as $key => $value) {
				if ($key == 'title' and is_string($key)) {
					echo $value;
				}
			} ?>
			</h1>
			<div class="about-us">
				<div class="left">
					<p class="p-bold">
						<!-- Psybo technologies is a technology wise creative company doing extensive projects in the field of Website Designing, Website Development and Software Development. -->
						<?php foreach ($resulthead[0] as $key => $value) {
							if (is_string($key) and $key == 'description') {
								echo $value;
							}
						} ?>
					</p>
				</div>
				<div class="right">
					<!-- <p>
						Our goal is simple, to create excellent websites that make your business shine. Our team has been delivering innovative, cost effective and timely solutions that drive the growth of small and medium-sized businesses worldwide.
					</p> -->
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
				<!-- <li>
					<h3>Our Vision</h3>
					<p>Our team has been delivering innovative, cost effective and timely solutions that drive the growth of small and medium-sized businesses worldwide. Engineered by high quality professionals and managed by matured processes, we help forward-thinking companies achieve and surpass their business goals.</p>
				< /li>-->
				<?php foreach ($resultitem as $key => $value) {
				 ?>
					<li>
						<h3><?php foreach ($value as $key => $val) {
								if (is_string($key) and $key == 'title') {
									echo $val;
								}
							} ?></h3>
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