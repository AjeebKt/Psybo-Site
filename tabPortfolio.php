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
			<a href="addPortfolio.php">Add Portfolio</a>
			<table class="show-portfolio">
			<?php //var_dump($count_ptf);
			for($i = 0;$i < $count_ptf; $i++) 
			
				{?>
				<tr>
				<?php //var_dump($num_ptf[0][$i]);
					$result=$objdb->select_row_ptf($num_ptf[0][$i]);
					?>
					<td><?php foreach ($result as $key => $value) {
					if (is_string($key) and $key == 'about' )
					{
						echo $value;	
					}
					} ?></td>
					<td><?php foreach ($result as $key => $value) {
					if (is_string($key) and $key == 'name' )
					{
						echo $value;	
					}
					} ?></td>
					<td><?php foreach ($result as $key => $value) {
					if (is_string($key) and $key == 'link' )
					{
						echo $value;	
					}
					} ?></td>
					<td><img src="img/user.png" alt=""></td>
					<td><a href="editPortfolio.php" class="edit"></a></td>
					<td><a href="" class="delete"></a></td>
				</tr>
				<?php } ?>
			</table>
		</form>
	</section>
</body>
</html>