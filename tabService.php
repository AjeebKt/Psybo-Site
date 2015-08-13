
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Service - Dashboard</title>
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
			<h3>Main Head</h3>
			<form id="formShowService" name="formShowService" action="" method="POST">
				<table class="show-item">
					<tbody>
						<tr>
							<th>Main Head</th>
							<th>Description</th>
							<th>
								<a href="addServiceHead.php" class="page-button">+ Add</a>
							</th>
						</tr>
						<tr>
							<td>Headding</td>
							<td>
								<p>jaba jaba</p>
							</td>
							<td>
								<a href="editServiceHead.php" class="edit"></a>
								<a href="" class="delete" onclick="DeleteCheck()"></a>
							</td>
						</tr>
					</tbody>
				</table>
				<h3>Service</h3>
				<table class="show-item">
					<tbody>
						<tr>
							<th>Service</th>
							<th>Description</th>
							<th>Image</th>
							<th>
								<a href="addService.php" class="page-button">Add Service</a>
							</th>
						</tr>
						<tr>
							<td>Service</td>
							<td>
								<p>jaba jaba</p>
							</td>
							<td>
								<img src="" alt="">
							</td>
							<td>
								<a href="editService.php" class="edit"></a>
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

