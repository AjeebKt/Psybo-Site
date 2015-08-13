
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home - Dashboard</title>
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
			<h3>Main Head</h3>
			<table class="show-item">
				<tbody>
					<tr>
						<th>Head</th>
						<th>Description</th>
						<th>
							<a href="addHome.php" class="page-button">+ Add</a>
						</th>
					</tr>
					<tr>
						<td>Headding</td>
						<td>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui fuga, nemo magni ea nulla maxime tempora eligendi fugiat quod quo adipisci ipsa in temporibus. Laboriosam commodi nesciunt ipsum, reprehenderit blanditiis.</p>
						</td>
						<td>
							<a href="editHome.php" class="edit"></a>
							<a href="" class="delete" onclick="DeleteCheck()"></a>
						</td>
					</tr>
				</tbody>
			</table>
			<h3>Sub Head</h3>
			<table class="show-item">
				<tbody>
					<tr>
						<th>Sub Head</th>
						<th>Description</th>
						<th>Image</th>
						<th>Link</th>
						<th>
							<a href="addWedo.php" class="page-button">+ Add</a>
						</th>
					</tr>
					<tr>
						<td>Sub Headding</td>
						<td>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fugit provident! Cum, consectetur excepturi velit totam nisi non molestiae corrupti iure, dolore deserunt repellat iste rerum nam, voluptas accusantium enim!</p>
						</td>
						<td>
							<img src="" alt="">
						</td>
						<td>
							<a href="#">link</a>
						</td>
						<td>
							<a href="editWedo.php" class="edit"></a>
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

