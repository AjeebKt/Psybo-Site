<?php 
	include "file.php";
    require_once 'Database.php';
	
	// use app\Database;

    $objdb=new Database('localhost','root','asd','psybo-db');
    $objfile=new File();
    $emp_id=$objdb->num_row_emp();// number of values of employee
    $count_emp=count($emp_id);
    // var_dump($count_emp);
 	$actdir="/upload-image/";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tab Team</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/css.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php include 'dash.php' ?>
	<section>
		<form id="formShowportfolio" name="formShowportfolio" action="" method="POST">
			<a href="addTeam.php">Add Team member</a>
			<table class="show-item">
				<tr>
					<td>Name</td>
					<td>Desigination</td>
					<td>Facebook ID</td>
					<td>Twitter ID</td>
					<td>LinkedIn</td>
					<td>Google+</td>
					<td><img src="img/user.png" alt=""></td>
					<!-- <td><a href="editTeam.php" class="edit"></a></td>
					<td><a href="" class="delete"></a></td> -->
				</tr>
				<?php for ($j=0; $j<$count_emp ;$j++)

			{ $result=$objdb->select_row_emp($emp_id[$j][0]);?>
				<tr>
					<td><?php foreach ($result as $key => $value) {
						if (is_string($key) and $key=="name") {
							echo $value;
						}
					} ?></td>
					<td><?php foreach ($result as $key => $value) {
						if (is_string($key) and $key=="designation") {
							echo $value;
						}
					} ?></td>
					<td><?php foreach ($result as $key => $value) {
						if (is_string($key) and $key=="fb") {
							echo $value;
						}
					} ?></td>
					<td><?php foreach ($result as $key => $value) {
						if (is_string($key) and $key=="twiter") {
							echo $value;
						}
					} ?></td>
					<td><?php foreach ($result as $key => $value) {
						if (is_string($key) and $key=="linkedin") {
							echo $value;
						}
					} ?></td>
					<td><?php foreach ($result as $key => $value) {
						if (is_string($key) and $key=="google_plus") {
							echo $value;
						}
					} ?></td>
					<td><img src=<?php foreach ($result as $key => $value) {
						if (is_string($key) and $key=="file_name") {
							// var_dump($actdir.$value);
							echo "\"".$actdir.$value."\"";
						}
					}; ?> alt=""></td>
					<td><a href=<?php foreach ($result as $key => $value) {
						if (is_string($key) and $key== 'id') 
						{
							echo "\"editTeam.php?editid=".$value."\"";
						}
					} ?> class="edit"></a></td>
					<td> 
					 <a href=<?php foreach ($result as $key => $value) {
					if (is_string($key) and $key == 'id' )
					{

						echo "\"?deleteid=".$value."\"";	
					}
					} ?> class="delete"></a></td>
				</tr>
				<?php } ?>
			</table>
		</form>
	</section>
</body>
</html>
<?php 

if (isset($_GET['deleteid'])) 
{
	$objdb->delete_team($_GET['deleteid']);
	// if ($objdb == true) 
	// {
	// 	echo "<script type='text/javascript'>alert('Delete succefully!');</script>";	
		
	// }
	header("location:tabTeam.php");
}

?>
