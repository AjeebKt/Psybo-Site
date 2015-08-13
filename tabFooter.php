
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Address</title>
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
				<h3>Address</h3>
				<table class="show-item">
					<tbody>
						<tr>
							<th>Address</th>
							<th>Phone</th>
							<th>Email</th>
							<th>
								<a href="addAddress.php" class="page-button">+ Add</a>
							</th>
						</tr>
						<tr>
							<td>
								<p>Jaba jaba jaba</p>
							</td>
							<td>
								<p>+919633909701</p>
							</td>
							<td>
								<p>asd@asd.com</p>
							</td>
							<td>
								<a href="editAddress.php" class="edit"></a>
								<a href="" class="delete" onclick="DeleteCheck()"></a>
							</td>
						</tr>
					</tbody>
				</table>
				<h3>Social Links</h3>
				<table class="show-item">
					<tbody>
						<tr>
							<th>Facebook</th>
							<th>Twitter</th>
							<th>LinkedIn</th>
							<th>Google Plus</th>
							<th>
								<a href="addSocialLinks.php" class="page-button">+ Add</a>
							</th>
						</tr>
						<tr>
							<td>
								<p>fb.me/ajeebkt</p>
							</td>
							<td>
								<p>twittwer.com/ajeebkt</p>
							</td>
							<td>
								<p>linkedin.com/ajeebkt</p>
							</td>
							<td>
								<p>plus.google.com/ajeebkt</p>
							</td>
							<td>
								<a href="editSocialLinks.php" class="edit"></a>
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

