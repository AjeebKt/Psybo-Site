
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tab-Portfolio</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/admin-style.css">
	<script language="javascript" type="text/javascript">
	function DeleteCheck()
	{
		return confirm('Are you sure to delete this record?');
	}
	</script>
</head>
<body>
	<?php include 'dash.php'; ?>
	<section>
	<div class="show-table">
		<form id="formShowHome" name="formShowHome" action="" method="POST">
			<a href="addHome.php">Add Main Head</a><br><br>
			<a href="addWedo.php">Add we-Do</a>
			<table class="show-item">
				<tr>
					<td>Head</td>
					<td>Description</td>
					<td>Edit</td>
					<td>Delete</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>
						<a href="editHome.php" class="edit"></a>
					</td>
					<td>
						<a href="" class="delete" onclick="DeleteCheck()"></a>
					</td>
				</tr>
			</table>
			<table class="show-item">
				<tr>
					<td>Sub Head</td>
					<td>Description</td>
					<td>Image</td>
					<td>Link</td>
					<td>Delete</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>
						<a href="editWedo.php" class="edit"></a>
					</td>
					<td>
						<a href="" class="delete" onclick="DeleteCheck()"></a>
					</td>
				</tr>
			</table>
		</form>
	</div>
	</section>
</body>
</html>

