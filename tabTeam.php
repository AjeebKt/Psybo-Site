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
			<table class="show-portfolio">
				<tr>
					<td>title</td>
					<td>link</td>
					<td>Description</td>
					<td><img src="img/user.png" alt=""></td>
					<td><a href="editTeam.php" class="edit"></a></td>
					<td><a href="" class="delete"></a></td>
				</tr>
			</table>
		</form>
	</section>
</body>
</html>