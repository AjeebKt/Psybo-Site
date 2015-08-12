<?php 
error_reporting(1);
include_once 'Database.php';
$objdb = new Database('localhost', 'root', 'asd', 'psybo-db');
$resultHead = $objdb->select('headings', array('title', 'description','id'), array('name', 'service',));
$resultService = $objdb->select('subHeadings', array('title', 'description', 'id'), array('name', 'service'));
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tab-Service</title>
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
					<?php foreach ($resultHead as $key => $value) {
					 ?>
					<tr>
						<td><?php  foreach ($value as $key	 => $val) {
							if ($key == 'title' and is_string($key) ) {
								echo $val;
							} }?>
						</td>
						<td><?php  foreach ($value as $key	 => $val) {
							if ($key == 'description' and is_string($key) ) {
								echo $val;
							} }?></td>
						<td>
							<a href=<?php foreach ($value as $key => $val) {
										if ($key == 'id' and is_string($key)) {
											echo "\"editServiceHead.php?id=".$val."\"";
										}
							} ?> class="edit"></a>
						</td>
						<td>
							<a href="" class="delete" onclick="DeleteCheck()"></a>
						</td>
					</tr>
						<?php }; ?>
				</table>
				<table class="show-item">
					<tr>
						<td>Service</td>
						<td>Description</td>
						<td>Image</td>
						<td>Edit</td>
						<td>Delete</td>

					</tr>
					<?php foreach ($resultService as $key => $value) {

					 ?>
					<tr>
						<td><?php foreach ($value as $key => $val) {
								if ($key == 'title' and is_string($key)) 
								{
									echo $val;
								}
							} ?>
						</td>
						<td><?php foreach ($value as $key => $val) {
								if ($key == 'description' and is_string($key)) 
								{
									echo $val;
								}
							} ?>
						</td>
						<td>img</td>
						<td>
							<a href=<?php foreach ($value as $key => $val) {
										if ($key == 'id' and is_string($key)) {
											echo "\"editServiceHead.php?id=".$val."\"";
										}
							} ?> class="edit"></a>
						</td>
						<td>
							<a href="" class="delete" onclick="DeleteCheck()"></a>
						</td>
					</tr>
					<?php } ?>
				</table>
			</form>
		</div>
	</section>
</body>
</html>

