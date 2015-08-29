<?php 
error_reporting(E_ALL);
include_once 'Database.php';
$objdb = new Database('localhost', 'root', 'asd', 'psybo-db');
$resultHead = $objdb->select('headings', array(), array('name', 'home',));
$resultWedo = $objdb->select('subHeadings', array(), array('name', 'wedo'));
$actdir = '/upload-image/';
$message = "";

if (isset($_GET['deleteid'])) 
{
	$wedoid=$_GET['deleteid'];
	$result = $objdb->select('subHeadings', array('files_id'), array('id', $wedoid));
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
			$objdb->delete('subHeadings', array('id',$wedoid));
			$objdb->delete('files', array('id', $value));
			unlink($actdir.$file_name);
			if ($objdb == true) 
			{
				$message = "<script type='text/javascript'>
							window.location.replace('tabHome.php');
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
			<h3>Main Title</h3>
			<table class="show-item">
				<tbody>
					<tr>
						<th>Heading</th>
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
							<a href=<?php foreach ($value as $key => $val) {
									if ($key == 'id' and is_string($key)) {
										echo "\"editHome.php?editid=".$val."\"";
									}
							} ?> class="edit"></a>
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
			<h3>We Do Items</h3>
			<table class="show-item">
				<tbody>
					<tr>
						<th>Sub Heading</th>
						<th>Description</th>
						<th>Image</th>
						<th>Link</th>
						<th>
							<a href="addWedo.php" class="page-button">+ Add</a>
						</th>
					</tr>
					<?php foreach ($resultWedo as $key => $value) {
					 ?>
					<tr>
						<td><?php  foreach ($value as $key	 => $val) {
							if ($key == 'title' and is_string($key) ) {
								echo $val;
							} }?></td>
						<td>
							<p><?php  foreach ($value as $key	 => $val) {
							if ($key == 'description' and is_string($key) ) {
								echo $val;
							} }?></p>
						</td>
						<td>
							<img src=<?php
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
							<p><?php  foreach ($value as $key	 => $val) {
							if ($key == 'link' and is_string($key) ) {
								echo $val;
							} }?></p>
						</td>
						<td>
							<a href=<?php foreach ($value as $key => $val) {
											if ($key == 'id' and is_string($key)) {
												echo "\"editWedo.php?editid=".$val."\"";
											}
										} 
									?> class="edit"></a>
							<a href=<?php foreach ($value as $key => $val) {
											if ($key == 'id' and is_string($key)) {
												echo "\"?deleteid=".$val."\"";
											}
										} ?> class="delete" onclick="return DeleteCheck()"></a>
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

