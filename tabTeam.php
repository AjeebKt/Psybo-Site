<?php 
include 'dash.php';
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
			<table class="show-item">
				<tr>
					<td>Name</td>
					<td>Desigination</td>
					<td>Facebook ID</td>
					<td>Twitter ID</td>
					<td>LinkedIn</td>
					<td>Google+</td>
					<td><img src="img/user.png" alt=""></td>
					<td><a href="editTeam.php" class="edit"></a></td>
					<td><a href="" class="delete"></a></td>
				</tr>
			</table>
		</form>
	</section>
</body>
</html>