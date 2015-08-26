<?php 
error_reporting(1);
include_once 'Database.php';
$objdb = new Database('localhost', 'root', 'asd', 'psybo-db');
$resultHead = $objdb->select('headings', array('title', 'description','id'), array('name', 'service',));
$resultService = $objdb->select('subHeadings', array(), array('name', 'service'));

$actdir = '/upload-image/';
if (isset($_GET['deleteid'])) 
{
	$serviceId=$_GET['deleteid'];
	$result = $objdb->select('subHeadings', array('files_id'), array('id', $serviceId));
	foreach ($result[0] as $key => $value) 
	{
		if (is_string($key) and $key == 'files_id') 
		{
			$resultfile = $objdb->select('files',array('file_name'),array('id', $value));
			foreach ($resultfile[0] as $key => $val) 
			{
				if (is_string($key) and $key == 'file_name') 
				{
					$file_name = $val;
				}
			}
			$objdb->delete('subHeadings', array('id',$serviceId));
			$objdb->delete('files', array('id', $value));
			unlink($actdir.$file_name);
			if ($objdb == true) 
			{
				$message = "<script type='text/javascript'>
							window.location.replace('tabService.php');
						</script>";
			}
		}
	}
}
if (isset($_GET['hdeleteid']) )
{
	$headId = $_GET['hdeleteid']; 
	$objdb->delete('headings', array('id', $headId));
	if ($objdb == true) 
	{
		$message = "<script type='text/javascript'>
					window.location.replace('tabService.php');
				</script>";
	}
}	
?>

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
			<h3>Main Heading</h3>
			<form id="formShowService" name="formShowService" action="" method="POST">
				<table class="show-item">
					<tbody>
						<tr>
							<th>Main Heading</th>
							<th>Description</th>
							<th>
								<a href="addServiceHead.php" class="page-button">+ Add</a>
							</th>
						</tr>
						<?php foreach ($resultHead as $key => $value) {
					 ?>
					<tr>
						<td><?php  foreach ($value as $key	 => $val) {
							if ($key == 'title' and is_string($key) ) {
								echo $val;
							} }?>
						</td>
						<td>
							<p><?php  foreach ($value as $key	 => $val) {
							if ($key == 'description' and is_string($key) ) {
								echo $val;
							} }?>
							</p>
						</td>
						<td>
							<a href=<?php foreach ($value as $key => $val) {
									if ($key == 'id' and is_string($key)) {
										echo "\"?hdeleteid=".$val."\"";
									}
							} ?> class="delete" onclick="return DeleteCheck()"></a>
							<a href=<?php foreach ($value as $key => $val) {
										if ($key == 'id' and is_string($key)) {
											echo "\"editServiceHead.php?id=".$val."\"";
										}
							} ?> class="edit"></a>
						</td>
					</tr>
						<?php }; ?>
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
								<a href="addService.php" class="page-button">+ Add</a>
							</th>
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
							<td>
								<img src= <?php
										foreach ($value as $key	 => $val) {
										if ($key == 'files_id' and is_string($key) ) {
											$imag_id = $val;
											} 
										}
										$resultImg = $objdb->select('files', array(), array('id', $imag_id));
										foreach ($resultImg[0] as $key => $value1) {
											if ($key == 'file_name' and is_string($key)) {
												echo "\"".$actdir.$value1."\"";
											}
										}			
									?>
								alt="">
							</td>
							<td>
								<a href=<?php foreach ($value as $key => $val) {
											if ($key == 'id' and is_string($key)) {
												echo "\"?deleteid=".$val."\"";
											}
								} ?>  class="delete" onclick="return DeleteCheck()"></a>
								<a href=<?php foreach ($value as $key => $val) {
											if ($key == 'id' and is_string($key)) {
													echo "\"editService.php?id=".$val."\"";
											}
								} ?> class="edit"></a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</form>
		</div>
	</section>
	<?php echo $message; ?>
</body>
</html>

