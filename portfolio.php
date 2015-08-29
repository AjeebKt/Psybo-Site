<?php 
	error_reporting(0);
	include 'Database.php';
	include 'file.php';
    $objdb=new Database('psybotechnologies.com','psyboysg_test','psybotest','psyboysg_psybo-db');
	$num_ptf=$objdb->num_row_ptf();
	$count_ptf=count($num_ptf);
	$actdir="/upload-image/";
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/theme.css">
	<!-- <link rel="stylesheet" href="css/css.css"> -->
	<title>Our PORTFOLIO</title>
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
					<!-- <li class="active"><a href="portfolio.php">PORTFOLIO</a></li> -->
					<li><a href="team.php">TEAM</a></li>
					<li><a href="service.php">SERVICE</a></li>
					<li><a href="about.php">ABOUT</a></li>
					<li><a href="contact.php">CONTACT</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<section class="portfolio">
		<div class="container">
		<?php
			for ($i=0; $i <$count_ptf ; $i++) { 
			 	$result=$objdb->select_row_ptf($num_ptf[$i][0]);
			?>
			 <figure>
				<span href=<?php foreach ($result as $key => $value) {
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
				<div class="fig-caption">
					<figcaption>
							<?php foreach ($result as $key => $value) {
								if (is_string($key) and $key == 'name') {
									echo $value;
								}
							} ?>
					</figcaption>
				</div>
				</span>
			</figure> 
			<?php } ?>
		</div>
	</section>		
	<?php include 'footer.php'; ?>
</body>
</html>