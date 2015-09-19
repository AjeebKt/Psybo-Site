 <?php 
	error_reporting(0);
	include_once 'Database.php';
	$objdb = new Database('localhost', 'root', 'asd', 'psybo-db');
	// $objdb = new Database('psybotechnologies.com','psyboysg_test','psybotest','psyboysg_psybo-db');
	$result = $objdb->select('headings',array(),array('name', 'home'));
	$resultWedo = $objdb->select('subHeadings', array(), array('name', 'wedo'));
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/theme.css">
	<script type="text/javascript" src="js/modernizr.custom.28468.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style2.css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.cslider.js"></script>
	<script type="text/javascript">
		$(function() {
		
			$('#da-slider').cslider({
				autoplay	: false,
			});
		
		});
	</script>
	<link rel="stylesheet" href="css/responsive.css">
	<title>PSYBO Technologies</title>
</head>
<body>
	<header>
		<div class="container">
			<div class="logo">
				<a href="index.php"><img src="img/logo.png" alt="Psybo Logo"></a>
			</div>
			<nav class="nav-menu">
				<ul class="navigation-links">
					<li class="active"><a href="index.php">HOME</a></li>
					<!-- <li><a href="portfolio.php">PORTFOLIO</a></li> -->
					<li><a href="service.php">SERVICE</a></li>
					<li><a href="team.php">TEAM</a></li>
					<li><a href="about.php">ABOUT</a></li>
					<li><a href="contact.php">CONTACT</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<section class="slider">
		<!-- Codrops top bar -->
		<div id="da-slider" class="da-slider">
			<div class="da-slide">
				<h2>We Will Either Find a Way or Make One</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, accusamus sit.</p>
				<a href="donerForm.php" class="da-link">Donate</a>
				<div class="da-img">
					<img src="./img/002.jpg" alt="image01" />
				</div>
			</div>
			<div class="da-slide">
				<h2>Athala puthala</h2>
				<p>Our outstanding creativity brings you an effective, bespoke, perfectly-designed result.</p>
				<a href="donerForm.php" class="da-link">Donate</a>
				<div class="da-img">
					<img src="./img/002.jpg" alt="image01" />
				</div>
			</div>
			<div class="da-slide">
				<h2>Athala puthala</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, accusamus sit.</p>
				<a href="donerForm.php" class="da-link">Donate</a>
				<div class="da-img">
					<img src="./img/002.jpg" alt="image01" />
				</div>
			</div>
			<nav class="da-arrows">
				<span class="da-arrows-prev"></span>
				<span class="da-arrows-next"></span>
			</nav>
		</div>
	</section>
		<!-- <div class="link-page">
			<a href="portfolio.php" class="link-button">View Portfolio</a>
		</div> -->
	<section>
		<div class="container">
			<div class="who-we-are">
				<h2><?php  foreach ($result[0] as $key => $value) {
						if ($key == 'title' and is_string($key)) 
						{
							echo $value;
						}
					}?></h2>
				<p><?php foreach ($result[0] as $key => $value) {
						if ($key == 'description' and is_string($key)) 
						{
							echo $value;
						}
					} ?></p>
			</div>
	   		<ul class="what-wedo">
	   		<?php  foreach ($resultWedo as $key => $value){
	   		?>
	   			<li class="list-wedo">
			   		<div class="grid">
		   				<a href=<?php  foreach ($value as $key => $val) {
									if ($key == 'link' and is_string($key)) 
									 	{
									 		echo "\"".$val."\"";
									 	}
								}?> class="word-box">
		   					<!-- <img src="img/Conference-100.png" alt=""> -->
			   				<h3><?php  foreach ($value as $key => $val) {
									if ($key == 'title' and is_string($key)) 
									 	{
									 	echo $val;
									 }
								}?></h3>
			   				<p><?php  foreach ($value as $key => $val) {
									if ($key == 'description' and is_string($key)) 
										{
										echo $val;
									}
								}?></p>
		   				</a>
				   	</div>
	   			</li>
	   			<?php } ?>
	   		</ul>
		</div>
	</section>
		<!-- <section class="testimonial">
			<h3>HAPPY CLIENTS</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque fuga eveniet, ex, facere nam quis tempora minima voluptate impedit eius quod reiciendis excepturi labore est officia inventore hic. Autem, odit!</p>
		</section> -->
	<?php include 'footer.php'; ?>
</body>
</html>
