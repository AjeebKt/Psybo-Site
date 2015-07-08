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
				<tr>
					<td>Name</td>
					<td>description</td>
					<td>link</td>
					<td>Image</td>
					</tr>
				<?php 
				// var_dump($num_ptf);
				for ($i=0; $i < $count_ptf; $i++) { 
				$result=$objdb->select_row_ptf($num_ptf[$i][0]);
				// var_dump($result); 
				?>
				<tr>
					<td><?php foreach ($result as $key => $value) {
					if (is_string($key) and $key == 'name' )
					{
						echo $value;	
					}
					} ?></td>
					<td><?php foreach ($result as $key => $value) {
					if (is_string($key) and $key == 'about' )
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
					<td><img src=<?php foreach ($result as $key => $value) {
					if (is_string($key) and $key == 'file_name' )
					{
						echo "\"".$actdir.$value."\"";	
					}
					} ?> alt=""></td>
					<td><a href="editPortfolio.php" class="edit"></a></td>
					<td><a href=<?php foreach ($result as $key => $value) {
					if (is_string($key) and $key == 'id' )
					{

						echo "\"?id=".$value."\"";	
					}
					} ?> class="delete"></a></td>
				</tr>
				<?php } ?>
			</table>
		</form>
	</section>
</body>
</html>
<?php if (isset($_GET['id'])) 
{
	// echo $value;
	$objdb->delete_portfolio($_GET['id']);
	header("refresh:0");
} 
?>