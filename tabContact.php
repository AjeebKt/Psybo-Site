
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
			<form id="formShowContact" name="formShowContact" action="" method="POST">
				<a href="addContactMessage.php" class="page-button">Add Main Head</a>
				<table class="show-item">
					<tr>
						<td>Message Headding</td>
						<td>Description</td>
						<td>Edit</td>
						<td>Delete</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>
							<a href="editContactMessage.php" class="edit"></a>
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

