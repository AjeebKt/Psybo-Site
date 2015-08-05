<?php 
	error_reporting(0);
	include "file.php";
    require_once 'Database.php';
	// use app\Database;
    // $objdb=new Database('psybotechnologies.com','psyboysg_test','psybotest','psyboysg_psybo-db');
    $objdb=new Database('localhost','root','asd','psybo-db');
    $objfile=new File();
    $emp_id=$objdb->num_row_emp();// number of values of employee
    $count_emp=count($emp_id);
 	$actdir="/upload-image/";
 	$cmp_details=$objdb->select_row_cmp(); //select the row from company details
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/normalize.css">
	<!-- <link rel="stylesheet" href="css/css.css"> -->
	<link rel="stylesheet" href="css/theme.css">
	<title>About PSYBO</title>
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
					<li><a href="portfolio.php">PORTFOLIO</a></li>
					<li class="active"><a href="team.php">TEAM</a></li>
					<li><a href="service.php">SERVICE</a></li>
					<li><a href="about.php">ABOUT</a></li>
					<li><a href="contact.php">CONTACT</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<div class="container">
		<section class="team">
			<h2>Meet Our Team</h2>
			<ul class="team-member">
			<?php for ($j=0; $j<$count_emp ;$j++)
			{ $result=$objdb->select_row_emp($emp_id[$j][0]);#var_dump($result);?>
				<li>
					<a href="#" class="team-dp">
						<img src="upload-image/default-pic.png" alt="">
						<img <?php foreach ($result as $key => $value) {
							if (is_string($key) and $key == "file_name") {
								if (!empty($value)) 
									echo "src=\"".$actdir.$value."\"";
								else
									echo "src=\"".$actdir."default-pic.png\"";
							}
						} ?> alt="">
					</a>
					<h4> <?php foreach ($result as $key => $value) {
						if (is_string($key) and $key=="name") {
							echo $value;
						}
					} ?> </h4> 

					<h4 class="dev-small"> <?php foreach ($result as $key => $value) {
						if (is_string($key) and $key=="designation") {
							echo $value;
						}
					} ?> </h4>

					<div class="center-ul">
						<ul class="personal-links" >

						<?php foreach ($result as $key => $value) {
							if (is_string($key) and $key=="fb") {
							if (!empty($value)) { ?>

							<li>
								<a class="facebook" target="_blank" <?php 
								echo ("href=\"".$value."\"");?> ></a>
							</li>
							<?php }}}  ?>

							<?php foreach ($result as $key => $value) {
							if (is_string($key) and $key=="twiter") {
								if (!empty($value)) {?>
							<li>
								<a class="twitter" <?php 
								echo ("href=\"".$value."\"");?> ></a>
							</li>
							<?php }}}  ?>

							<?php foreach ($result as $key => $value) {
									if (is_string($key) and $key=="linkedin") {
										if (!empty($value)){?>
							<li>
								<a class="linkedin" 
								<?php 
										echo ("href=\"".$value."\"");
								?>> </a>
							</li>
							<?php }}}  ?>		

							 <?php foreach ($result as $key => $value) {
									if (is_string($key) and $key=="google_plus") {
										if (!empty($value)) { ?>
							<li>
								<a class="gplus"
										<?php echo ("href=\"".$value."\"");
								 ?> ></a>
							</li>
							<?php }}}  ?>		
						</ul>
					</div>
				</li>
				<?php } ?>
			</ul>
		</section>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
 