
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tab-Portfolio</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/admin-style.css">
	<script language="javascript" type="text/javascript">
	function DeleteCheck()	{
		return confirm('Are you sure to delete this record?');
	}
	</script>
</head>
<body>
	<?php  include 'dash.php'; ?>
	<section>
		<div class="show-table">
			<form id="formShowAbout" name="formShowAbout" action="" method="POST">
				<a href="addAboutHead.php" class="page-button">Add Main Head</a>
				<a href="addAboutItem.php" class="page-button">Add Item</a>

				<table class="show-item">
					<tr>
						<td>Mian Head</td>
						<td>First Column Des.</td>
						<td>Second Column Des.</td>
						<td>Edit</td>
						<td>Delete</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>
							<a href="editAboutHead.php" class="edit"></a>
						</td>
						<td>
							<a href="" class="delete" onclick="DeleteCheck()"></a>
						</td>
					</tr>
				</table>
				<table class="show-item">
					<tr>
						<td>Headding</td>
						<td>Description</td>
						<td>Edit</td>
						<td>Delete</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>
							<a href="editaboutItem.php" class="edit"></a>
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

