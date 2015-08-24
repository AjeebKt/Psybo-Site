<?php 
	error_reporting(1);
	include_once 'Database.php';
	$objdb = new Database('localhost', 'root', 'asd', 'psybo-db');
	$actdir = getcwd().'/upload-image/';
	$resulthead = $objdb->select('headings', array(), array('name', 'service'));
	$resultSub = $objdb->select('subHeadings', array(), array('name','service'));

	foreach ($resultSub[0] as $key => $value) 
	{
		if (is_string($key) and $key =='files_id' ) 
		{
			$file_id = $value;
		} 
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/theme.css">
	<link rel="stylesheet" href="css/responsive.css">
	<title>Our Service</title>
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
					<li class="active"><a href="service.php">SERVICE</a></li>
					<li><a href="team.php">TEAM</a></li>
					<li><a href="about.php">ABOUT</a></li>
					<li><a href="contact.php">CONTACT</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<section class="we-do">
		<div class="container">
			<div class="service-title">
				<!-- <h2>Our Services</h2> -->
				<h2>
					<?php foreach ($resulthead[0] as $key => $value) 
					{
						if (is_string($key) and $key =='title' ) 
						{
							echo $value;
						}
					}?>
				</h2>
				<!-- <p><b>Psybo technologies</b> is a technology wise creative company doing extensive projects in the field of Website Designing, Website Development and Software Development. Our mission to develop the clients performance in their business, our company is sincerely working harder for showing profit oriented results to their clients all over the World.“Together we build lasting relationships with the power of technology and our passion for extreme quality“</p> -->
				<p>
					<?php foreach ($resulthead[0] as $key => $value) 
					{
						if (is_string($key) and $key =='description' ) 
						{
							echo $value;
						}
					}?>
				</p>
			</div>
			<ul class="service-feature">
			<?php foreach ($resultSub as $key => $value) {
			 ?>
				<li class="features move-up">
					<!-- <img src="img/software-dev.png" alt=""> -->
					<?php foreach ($value as $key => $val) 
						{
							if (is_string($key) and $key =='files_id' ) 
							{
								$files_id = $val;
							}
						} 
						$resultimg = $objdb->select('files',array(),array('id', $files_id));
						// var_dump($resultimg[0]);
					?>
					<!-- <img src="img/html-coding.png" alt=""> -->
					<img <?php foreach ($resultimg[0] as $key => $image) {
								if (is_string($key) and $key == 'file_name') {
									echo "src=\"upload-image/".$image."\"";
								}
					} ?> alt="">
					<!-- <h3>Software Development</h3> -->
					<h3>
						<?php foreach ($value as $key => $val) 
						{
							if (is_string($key) and $key =='title' ) 
							{
								echo $val;
							}
						} ?>
					</h3>
					<!-- <p>Offer you complete end-to-end and cost-effective software solutions to your business requirements.</p> -->
					<p>
						<?php foreach ($value as $key => $val) 
						{
							if (is_string($key) and $key =='description' ) 
							{
								echo $val;
							}
						} ?>
					</p>
				</li>
				<?php } ?>
				<li class="features move-up">
					<img src="img/html-coding.png" alt="">
					<h3>Web Development</h3>
					<p>We make your web vision a reality. we create traditional, ecommerce, static , dynamic ,responsive web site.</p>
				</li>
				<li class="features move-up">
					<img src="img/software-consult.png" alt="">
					<h3>Software Consultancy</h3>
					<p>consultants with innovative strategies help customers transform their businesses, processes and operations.</p>
				</li>
				<li class="features move-up">
					<img src="img/ojt.jpg" alt="">
					<h3>On The Job Training</h3>
					<p>We make sure that the candidates get a good exposure on the various aspects of the Technologies currently in use.</p>
				</li>
				<li class="features move-up">
					<img src="img/online-BP.png" alt="">
					<h3>Online Business Promotion</h3>
					<p>We aim to transform Business Performance, Strategic Perspective on Process Improvement and enabling Technology as per the requirements to deliver Performance oriented tools.</p>
				</li>
				<li class="features move-up">
					<img src="img/academic-project.png" alt="">
					<h3>Live Academic Project Training</h3>
					<p>We provide assistance and guidance to students in doing their academic projects. Training division also renders the service of campus training where our technology experts handle training sessions for students inside our company.</p>
				</li>
			</ul>
		</div>
	</section>
	<?php include 'footer.php'; ?>
</body>
</html>