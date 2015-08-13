
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contact - Dashboard</title>
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
				<h3>Message</h3>
				<table class="show-item">
					<tbody>
						<tr>
							<th>Message Headding</th>
							<th>Description</th>
							<th>
								<a href="addContactMessage.php" class="page-button">+ Add</a>
							</th>
						</tr>
						<tr>
							<td>Message</td>
							<td>
								<p>jaba jaba</p>
							</td>
							<td>
								<a href="editContactMessage.php" class="edit"></a>
								<a href="" class="delete" onclick="DeleteCheck()"></a>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</section>
</body>
</html>

