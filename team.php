<?php 
	include "file.php";
    require_once 'Database.php';
	
	// use app\Database;

    $objdb=new Database('localhost','root','asd','psybo-db');
    $objfile=new File();
    $emp_id=$objdb->num_row_emp();// number of values of employee
    // var_dump($emp_id);
    $count_emp=count($emp_id);
    // var_dump($count_emp);
 	$actdir="/upload-image/";
 	$cmp_details=$objdb->select_row_cmp(); //select the row from company details
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
				<a href="index.php"><img src="img/logo-go.png" alt="Psybo Logo"></a>
			</div>
			<nav>
				<ul class="navigation-links">
					<li><a href="index.php">HOME</a></li>
					<li><a href="portfolio.php">PORTFOLIO</a></li>
					<li><a class="active" href="team.php">TEAM</a></li>
				</ul>
			</nav>
		</div>			
	</header>
	<section class="team">
		<div class="container">
			<h2>TEAM PSYBO</h2>
			<ul class="team-member">
			<?php for ($j=0; $j<$count_emp ;$j++)
			{ $result=$objdb->select_row_emp($emp_id[$j][0]);?>
				<li>
					<img src=<?php foreach ($result as $key => $value) {
						if (is_string($key) and $key=="file_name") {
							// var_dump($actdir.$value);
							echo "\"".$actdir.$value."\"";
						}
					}; ?> class="display-img" alt="">
					<h4><?php foreach ($result as $key => $value) {
						if (is_string($key) and $key=="name") {
							echo $value;
						}
					} ?></h4>
					<h4><?php foreach ($result as $key => $value) {
						if (is_string($key) and $key=="designation") {
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
							<a class="twitter" <?php foreach ($result as $key => $value) {
						if (is_string($key) and $key=="twiter") {
							echo ("href=\"".$value."\"");}}?> ></a>
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
							<a class="gplus" <?php foreach ($result as $key => $value) {
						if (is_string($key) and $key=="google_plus") {
							echo ("href=\"".$value."\"");}}?> ></a>
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
 