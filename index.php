 <?php 
	error_reporting(E_ALL);
	include_once 'Database.php';
	$objdb = new Database('localhost', 'root', 'asd', 'psybo-db');
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
	<section id="frame" class="display-frame">
		<div class="container">
			<div class="div-span">
				<div class="node">
					<h2>We Will Either Find a Way or Make One</h2>
					<p>Our outstanding creativity brings you an effective, bespoke, perfectly-designed result.</p>
				</div>
				<div class="node">
					<p>
						<img src="img/design.png" alt="">
					</p>
				</div>
			</div>
			<!-- <div class="link-page">
				<a href="portfolio.php" class="link-button">View Portfolio</a>
			</div> -->
		</div>
	</section>
	<section>
		<div class="container">
			<div class="who-we-are">
				<h2><?php  foreach ($result[0] as $key => $value) {
						if ($key == 'title' and is_string($key)) 
						{
							echo $value;
						}
					}?>
				</h2>
				<!-- <p><b>Psybo Technologies</b> is a young enterprise powered by young engineers with a goal of adding values. It is a company providing consultancy services and development in various domains like Software development, Web design and Web hosting, etc. Software development mainly concentrated in ERP, CRM and MIS in .Net Framwork 4.0 and J2EE. We provides web solutions & services to help customer reach to a wider customer base. The web is a new and different medium for communication and requires a different viewpoint and skill set to use it in the most effective way. We also provide Internship and On Job Training (OJT) for fresher’s software engineers to improve their skill and knowledge and get a good opportunity in IT industry.</p> -->
				<p>
					<?php foreach ($result[0] as $key => $value) {
						if ($key == 'description' and is_string($key)) 
						{
							echo $value;
						}
					} ?>
				</p>
			</div>
	   		<ul class="what-wedo">
	   		<?php  foreach ($resultWedo as $key => $value){
	   		?>
	   			<li class="list-wedo">
			   		<div class="grid">
		   				<a href="service.php" class="word-box">
		   					<!-- <img src="img/Conference-100.png" alt=""> -->
			   				<h3>
			   					<?php  foreach ($value as $key => $val) {
									if ($key == 'title' and is_string($key)) 
									 	{
									 	echo $val;
									 }
								}?>
			   				</h3>
			   				<p>
			   					<?php  foreach ($value as $key => $val) {
									if ($key == 'description' and is_string($key)) 
										{
										echo $val;
									}
								}?>
			   				</p>
		   				</a>
				   	</div>
	   			</li>
	   			<?php } ?>
	   		</ul>
	   		<!-- <ul class="what-wedo">
	   			<li class="list-wedo">
	   					<div class="grid">
	   						<div class="word-box">
	   							<h3>Head 1</h3>
	   							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem incidunt sapiente provident expedita amet esse quia aliquam aspernatur eveniet magni vero, laboriosam magnam quae a ut molestiae, vitae error perferendis.</p>
	   						</div>
	   					</div>
	   			</li>
	   			<li class="list-wedo">
	   					<div class="grid">
	   						<div class="word-box">
	   							<h3>Head 2</h3>
	   							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat numquam maxime quia. Magnam nostrum suscipit sequi quis, voluptatum similique hic sint, quod magni soluta, incidunt nisi culpa aspernatur neque voluptatem.</p>
	   						</div>
   						</div>
	   			</li>
	   			<li class="list-wedo">
	   					<div class="grid">
	   						<div class="word-box">
	   							<h3>Head 3</h3>
	   							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum voluptas quod, consequuntur accusamus distinctio praesentium, quae, culpa ratione temporibus asperiores possimus veniam sed ut quo maxime, maiores beatae omnis modi.</p>
	   						</div>
   						</div>
	   			</li>
	   		</ul> -->
		</div>
	</section>
		<!-- <section class="testimonial">
			<h3>HAPPY CLIENTS</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque fuga eveniet, ex, facere nam quis tempora minima voluptate impedit eius quod reiciendis excepturi labore est officia inventore hic. Autem, odit!</p>
		</section> -->
	<?php include 'footer.php'; ?>
</body>
</html>
