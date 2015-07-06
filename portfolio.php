
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
	<header>
		<div class="container">
			<div class="logo">
				<img src="img/logo-go.png" alt="Psybo Logo">
			</div>
			<nav>
				<ul class="navigation-links">
					<li><a href="index.php">HOME</a></li>
					<li><a class="active" href="portfolio.php">PORTFOLIO</a></li>
					<li><a href="employee.php">TEAM</a></li>
				</ul>
			</nav>
		</div>			
	</header>
	<div class="content">
		<section class="portfolio">
			<div class="container">
			<?php //var_dump($count_ptf);
			for($i = 0;$i < $count_ptf; $i++) 
			// var_dump($i);
				{?>
				<figure>
					<?php //var_dump($num_ptf[0][$i]);
					$result=$objdb->select_row_ptf($num_ptf[0][$i]);
					?>
					<a target="_blank" href=<?php foreach ($result as $key => $value) {
					if (is_string($key) and $key == 'link' )
					{
						echo "\"".$value."\"";	
					}
					} ?> >
						<!-- <img src="img/img-tech.jpg" alt=""> -->
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

				<!-- <figure>
					<a target="_blank" href="#">
						<img src="img/image.jpeg" alt="">
						<figcaption>
							jabajaba
						</figcaption>
					</a>
				</figure> -->
				<!-- <figure>
					<img src="img/image.jpeg" alt="">
					<figcaption>
						jabajaba
					</figcaption>
				</figure>
				<figure>
					<img src="img/image.jpeg" alt="">
					<figcaption>
						jabajaba
					</figcaption>
				</figure>
				<figure>
					<img src="img/image.jpeg" alt="">
					<figcaption>
						jabajaba
					</figcaption>
				</figure> -->
			</div>
		</section>		
	</div>
	<footer>
		<div class="container">
			<div class="footer-details">
				<ul class="social-links">
					<li>
						<a class="facebook" href="#"></a>
					</li>
					<li>
						<a class="twitter" href="#"></a>
					</li>
					<li>
						<a class="linkedin" href="#"></a>
					</li>
					<li>
						<a class="gplus" href="#"></a>
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