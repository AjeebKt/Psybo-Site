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
</head>
<body>
	<section>
		<form id="formPortfolio" name="formPortfolio" method="POST" action="">
			<div id="tabPortfolio" class="tab-portfolio">
			<h3>PORTFLIO</h3>
				<div class="div-align">
					<label>Title</label><br>
					<input name="txtTitle" type="text">
				</div>
				<div class="div-align">
					<label>Link</label><br>
					<input name="txtLink" type="text">
				</div>
				<div class="div-align left">
					<label>Description</label><br>
					<textarea name="portfolioDescription" id="portfolioDescription" cols="40" rows="2"></textarea><br>
				</div>
				<div class="div-align">
					<label>Portfolio Image</label><br>
					<input name="uploadPortfolio" type="file" class="up"><br>
				</div>
				<button class="submit" name="btnPortfolioSubmit">Submit</button>
				<button name="btnReset" class="reset">Reset</button>
			</div>
		</form>
	</section>
	<section>
		<form id="formShowportfolio" name="formShowportfolio" action="" method="POST">
			<table class="show-portfolio">
				<tr>
					<td>title</td>
					<td>link</td>
					<td>Description</td>
					<td><img src="img/user.png" alt=""></td>
					<td>edit</td>
					<td>Delete</td>
				</tr>
			</table>
		</form>
		<!-- <div class="add-portfolio">
			<a></a>
		</div> -->
	</section>
</body>
</html>