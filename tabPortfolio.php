<?php 
	include 'Database.php';
	include 'file.php';
	$objdb=new Database("localhost","root","asd","psybo-db");
	$num_ptf=$objdb->num_row_ptf();
	// var_dump($num_ptf);
	$count_ptf=count($num_ptf);
	$actdir="/upload-image/";
	include 'dash.php'
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tabportfolio</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/css.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<section>
		<form id="formPortfolio" name="formPortfolio" method="POST" action="">
			<div id="tabPortfolio" class="tab-portfolio">
			<h3>PORTFLIO</h3>
				<label>Title</label>
				<input name="txtTitle" type="text">
				<label>Link</label>
				<input name="txtLink" type="text">
				<label>Description</label>
				<textarea name="portfolioDescription" id="portfolioDescription" cols="20" rows="5"></textarea><br>
				<label>Portfolio Image</label>
				<input name="uploadPortfolio" type="file" class="up"><br>
				<button class="submit" name="btnPortfolioSubmit">Submit</button>
				<button name="btnReset" class="reset">Reset</button>
			</div>
		</form>
	</section>
	<section>
		<form id="formShowportfolio" name="formShowportfolio" action="" method="POST">
			<ul class="show-portfolio">
				<li></li>
			</ul>
		</form>
		<div class="add-portfolio">
			<a></a>
		</div>
	</section>
</body>
</html>