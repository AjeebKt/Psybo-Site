
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
				<a href="addAddress.php" class="page-button">Add Address</a>
				<a href="addSocialLinks.php" class="page-button">Add Social Links</a>

				<table class="show-item">
					<tr>
						<td>Address</td>
						<td>Phone</td>
						<td>Email</td>
						<td>Edit</td>
						<td>Delete</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>
							<a href="editAddress.php" class="edit"></a>
						</td>
						<td>
							<a href="" class="delete" onclick="DeleteCheck()"></a>
						</td>
					</tr>
				</table>
				<table class="show-item">
					<tr>
						<td>Facebook</td>
						<td>Twitter</td>
						<td>LinkedIn</td>
						<td>Google Plus</td>
						<td>Edit</td>
						<td>Delete</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>
							<a href="editSocialLinks.php" class="edit"></a>
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

