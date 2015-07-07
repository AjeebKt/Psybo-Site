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
		<form id="formShowportfolio" name="formShowportfolio" action="" method="POST">
			<table class="show-portfolio">
				<tr>
					<td>title</td>
					<td>link</td>
					<td>Description</td>
					<td><img src="img/user.png" alt=""></td>
					<td><a href="addPortfolio.php" class="edit"></a></td>
					<td><a href="" class="delete"></a></td>
				</tr>
			</table>
		</form>
		<!-- <div class="add-portfolio">
			<a></a>
		</div> -->
	</section>
</body>
</html>