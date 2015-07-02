<?php 
	include "file.php";
    require_once 'Database.php';
	
	// use app\Database;

    $objdb=new Database('localhost','root','1234','psybo-db');
    $objfile=new File();
   
    $count=$objdb->num_row();
    var_dump($count);
 	$actdir="/upload-image/";
 	$image=$objfile->view_image($actdir);
 	$cmp_details=$objdb->select_row_cmp();
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/css.css">
	<title>About PSYBO</title>
</head>
<body>
	<header>
		<div class="container">
			<div class="logo">
				<img src="img/logo-go.png" alt="Psybo Logo">
			</div>
			<nav>
				<ul class="navigation-links">
					<li><a href="index.html">HOME</a></li>
					<li><a href="portfolio.html">PORTFOLIO</a></li>
					<li><a class="active" href="empoyee.php">TEAM</a></li>
				</ul>
			</nav>
		</div>			
	</header>
	<section class="team">
		<div class="container">
			<h2>TEAM PSYBO</h2>
			<ul class="team-member">
			<?php for ($i=1; $i <= $count; $i++)
			{ $result=$objdb->select_row_emp($i);?>
				<li>
					<img width="145px" hight="194px"<?php foreach ($result as $key => $value) {
								if (is_string($key) and $key=="file_name") {
									// var_dump($value);
									// var_dump(basename($image));
									if ($value == basename($image)) 
									echo("<img src=\"".$image."\"");
								}
							}
					 	?> alt="">
					<h4><?php foreach ($result as $key => $value) {
						if (is_string($key) and $key=="name") {
							echo $value;
						}
					} ?></h4>
					<ul class="personal-links">
						<li>
							<a class="facebook" target="_blank" <?php foreach ($result as $key => $value) {
						if (is_string($key) and $key=="fb") {
							echo ("href=\"".$value."\"");}}?> ></a>
						</li>
						<li>
							<a class="twitter" href="https://twitter.com/"></a>
						</li>
						<li>
							<a class="linkedin" 
							<?php foreach ($result as $key => $value) {
								if (is_string($key) and $key=="linkedin") {
									echo ("href=\"".$value."\"");
								}
							} ?>  ></a>
						</li>
						<li>
							<a class="gplus" href="https://plus.google.com/"></a>
						</li>
					</ul>
				</li>
				<?php } ?>
			</ul>
		</div>
	</section>
	<footer>
		<div class="container">
			<div class="footer-details">
				<ul class="social-links">
					<li>
						<a class="facebook" <?php foreach ($cmp_details as $key => $value) {
								if (is_string($key) and $key=="fb") {
									echo ("href=\"".$value."\"");
								}
							} ?> ></a>
					</li>
					<li>
						<a class="twitter" <?php foreach ($cmp_details as $key => $value) {
								if (is_string($key) and $key=="twiter") {
									echo ("href=\"".$value."\"");
								}
							} ?> ></a>
					</li>
					<li>
						<a class="linkedin"  <?php foreach ($cmp_details as $key => $value) {
								if (is_string($key) and $key=="linkedin") {
									echo ("href=\"".$value."\"");
								}
							} ?>></a>
					</li>
					<li>
						<a class="gplus" <?php foreach ($cmp_details as $key => $value) {
								if (is_string($key) and $key=="google_plus") {
									echo ("href=\"".$value."\"");
								}
							} ?>></a>
					</li>
				</ul>	
				<div class="site-details">
					<p>All Right Recieved @ PSYBO Technologies PVT.LTD</p>
					<p>PSYBO Technologies</p>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>
 