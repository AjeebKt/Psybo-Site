<?php 
error_reporting(1);
include_once 'Database.php';
$objdb = new Database('localhost', 'root', 'asd', 'psybo-db');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>About - Dashboard</title>
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
				<h3>Main Head</h3>
				<table class="show-item">
					<tbody>
						<tr>
							<th>Mian Head</th>
							<th>First Column Des.</th>
							<th>Second Column Des.</th>
							<th>
								<a href="addAboutHead.php" class="page-button">+ Add</a>
							</th>
						</tr>
						<tr>
							<td>Main Head</td>
							<td>
								<p>jaba jaba</p>
							</td>
							<td>
								<p>jaba jaba</p>
							</td>
							<td>
								<a href="editAboutHead.php" class="edit"></a>
								<a href="" class="delete" onclick="DeleteCheck()"></a>
							</td>
						</tr>
					</tbody>
				</table>
				<h3>About Us</h3>
				<table class="show-item">
					<tbody>
						<tr>
							<th>Headding</th>
							<th>Description</th>
							<th>
								<a href="addAboutItem.php" class="page-button">+ Add</a>
							</th>
						</tr>
						<tr>
							<td>Headding</td>
							<td>
								<p>Jaba jaba</p>
							</td>
							<td>
								<a href="editaboutItem.php" class="edit"></a>
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

