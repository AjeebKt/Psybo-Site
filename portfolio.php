<?php 
	error_reporting(0);
	include 'Database.php';
	include 'file.php';
	$objdb=new Database("localhost","root","asd","psybo-db");
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
	<div class="container">
		<header>
			<div class="logo">
				<a href="index.php"><img src="img/logo.png" alt="Psybo Logo"></a>
			</div>
			<div class="div-center">
				<nav class="nav-menu">
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
		<section class="portfolio">
		<div class="folio-caption">
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores voluptates fuga suscipit, quam perspiciatis sapiente voluptatum. Earum recusandae aperiam, ad voluptate deleniti eaque. Velit, placeat cum esse dolorum et architecto. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo assumenda veniam, dolorem animi commodi, quod quo totam consequuntur odio ratione! Impedit cupiditate sed, amet odit molestias, in delectus modi a?
			</p>
		</div>
		<?php
			for ($i=0; $i <$count_ptf ; $i++) { 
			 	$result=$objdb->select_row_ptf($num_ptf[$i][0]);
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
		</section>		
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>