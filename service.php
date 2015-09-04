<?php 
	error_reporting(0);
	include_once 'Database.php';
	// $objdb = new Database('localhost', 'root', 'asd', 'psybo-db');
	$objdb = new Database('psybotechnologies.com','psyboysg_test','psybotest','psyboysg_psybo-db');
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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
				<h2>
					<?php foreach ($resulthead[0] as $key => $value) 
					{
						if (is_string($key) and $key =='title' ) 
						{
							echo $value;
						}
					}?>
				</h2>
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
					<img <?php foreach ($resultimg[0] as $key => $image) {
								if (is_string($key) and $key == 'file_name') {
									echo "src=\"upload-image/".$image."\"";
								}
					} ?> alt="">
					<h3>
						<?php foreach ($value as $key => $val) 
						{
							if (is_string($key) and $key =='title' ) 
							{
								echo $val;
							}
						} ?>
					</h3>
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
			</ul>
		</div>
	</section>
	<?php include 'footer.php'; ?>
</body>
</html>