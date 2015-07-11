<?php 
	include 'Database.php';
	include 'file.php';
	$objdb=new Database("localhost","root","asd","psybo-db");
	$num_ptf=$objdb->num_row_ptf();
	// var_dump($num_ptf);
	$count_ptf=count($num_ptf);
	$actdir="/upload-image/";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/css.css">
	<title>Our PORTFOLIO</title>
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
	<header>
		<div class="container">
			<div class="logo">
				<a href="index.php"><img src="img/logo-go.png" alt="Psybo Logo"></a>
			</div>
			<nav>
				<ul class="navigation-links">
					<li><a href="index.php">HOME</a></li>
					<li><a class="active" href="portfolio.php">PORTFOLIO</a></li>
					<li><a href="team.php">TEAM</a></li>
					<li><a href="service.php">SERVICE</a></li>
					<li><a href="about.php">ABOUT</a></li>
					<li><a href="contact.php">CONTACT</a></li>
				</ul>
			</nav>
		</div>			
	</header>
	<div class="content">
		<section class="portfolio">
			<div class="container">
			<?php
				for ($i=0; $i <$count_ptf ; $i++) { 
				 	$result=$objdb->select_row_ptf($num_ptf[$i][0]);
				 	// var_dump($result);
				?>
				 <figure>
					<a target="_blank" href=<?php foreach ($result as $key => $value) {
					if (is_string($key) and $key == 'link' )
					{
						echo "\"".$value."\"";	
					}
					} ?> >
					<img src=<?php foreach ($result as $key => $value) {
							if (is_string($key) and $key == 'file_name') {
									echo "\"".$actdir.$value."\"";
								}	
						} ?> alt="">
					<figcaption>
							<?php foreach ($result as $key => $value) {
								if (is_string($key) and $key == 'name') {
									echo $value;
								}
							} ?>
					</figcaption>
					</a>
				</figure> 
				<?php } ?>
			</div>
		</section>		
	</div>
	<footer>
		<div class="container">
			<div class="footer-details">
				<ul class="social-links">
					<li>
						<a class="facebook" href="https://www.facebook.com/psybotechnologies"></a>
					</li>
					<li>
						<a class="twitter" href="https://twitter.com/psybotech"></a>
					</li>
					<li>
						<a class="linkedin" href="#"></a>
					</li>
					<li>
						<a class="gplus" href="https://plus.google.com/u/0/"></a>
					</li>
				</ul>	
				<div class="site-details">
					<p>All Right Recieved @ PSYBO Technologies PVT.LTD</p>
					<p>PSYBO Technologies 2015</p>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>