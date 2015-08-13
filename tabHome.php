<?php 
error_reporting(1);
include_once 'Database.php';
$objdb = new Database('localhost', 'root', 'asd', 'psybo-db');
$resultHead = $objdb->select('headings', array('title', 'description','id'), array('name', 'home',));

if (isset($_GET['hdeleteid']) )
{
	$headId = $_GET['hdeleteid']; 
	$objdb->delete('headings', array('id', $headId));
	if ($objdb == true) 
	{
		$message = "<script type='text/javascript'>
					window.location.replace('tabHome.php');
				</script>";
	}
}	
?>
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
					<?php foreach ($resultHead as $key => $value) {
					 ?>
					<tr>
						<td>
							<?php  foreach ($value as $key	 => $val) {
							if ($key == 'title' and is_string($key) ) {
								echo $val;
							} }?>						
						</td>
						<td>
							<p><?php  foreach ($value as $key	 => $val) {
							if ($key == 'description' and is_string($key) ) {
								echo $val;
							} }?></p>
						</td>
						<td>
							<a href="" class="edit"></a>
							<a href=<?php foreach ($value as $key => $val) {
									if ($key == 'id' and is_string($key)) {
										echo "\"?hdeleteid=".$val."\"";
									}
							} ?> class="delete" onclick="return DeleteCheck()"></a>
						</td>
					</tr>
					<?php } ?>
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
	<?php echo $message; ?>
</body>
</html>

