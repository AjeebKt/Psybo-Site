
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tab-Portfolio</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/admin-style.css">
	<script language="javascript" type="text/javascript">
	function DeleteCheck() {
		return confirm('Are you sure to delete this record?');
	}
	</script>
</head>
<body>
	<?php include 'dash.php'; ?>
	<section>
		<div class="show-table">
			<form id="formShowService" name="formShowService" action="" method="POST">
				<a href="addServiceHead.php" class="page-button">Add Mian Headding</a>
				<a href="addService.php" class="page-button">Add Service</a>
				<table class="show-item">
					<tr>
						<td>Main Head</td>
						<td>Description</td>
						<td>Edit</td>
						<td>Delete</td>

					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>
							<a href="editServiceHead.php" class="edit"></a>
						</td>
						<td>
							<a href="" class="delete" onclick="DeleteCheck()"></a>
						</td>
					</tr>
				</table>
				<table class="show-item">
					<tr>
						<td>Service</td>
						<td>Description</td>
						<td>Image</td>
						<td>Edit</td>
						<td>Delete</td>

					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>
							<a href="editService.php" class="edit"></a>
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

