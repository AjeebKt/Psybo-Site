<?php 
include 'dash.php';
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
</head>
<body>
	<section>
		<form id="formShowportfolio" name="formShowportfolio" action="" method="POST">
			<a href="addTeam.php">Add Team member</a>
			<table class="show-portfolio">
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
					<td><a href="editTeam.php" class="edit"></a></td>
					<td><a href="" class="delete"></a></td>
				</tr>
				<?php } ?>
			</table>
		</form>
	</section>
</body>
</html>