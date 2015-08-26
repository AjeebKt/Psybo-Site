<?php 
error_reporting(1);
include_once 'Database.php';
$objdb = new Database('localhost', 'root', 'asd', 'psybo-db');
$resultHead = $objdb->select('subHeadings', array(), array('name', 'about'));
$resultMainHead = $objdb->select('headings', array(), array('name', 'about'));
// var_dump($resultMainHead);
if (isset($_GET['hDeleteid']) )
{
	$headId = $_GET['hDeleteid']; 
	$objdb->delete('headings', array('id', $headId));
	if ($objdb == true) 
	{
		$message = "<script type='text/javascript'>
					window.location.replace('tabAbout.php');
				</script>";
	}
}


if (isset($_GET['subHeadDeleteid'])) 
{
	$serviceId=$_GET['subHeadDeleteid'];
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
							window.location.replace('tabAbout.php');
						</script>";
			}
		}
	}
}
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
				<h3>Main Heading</h3>
				<table class="show-item">
					<tbody>
						<tr>
							<th>Heading</th>
							<th>First Column Des.</th>
							<th>Second Column Des.</th>
							<th>
								<a href="addAboutHead.php" class="page-button">+ Add</a>
							</th>
						</tr>
						<?php foreach ($resultMainHead as $key => $value) {
					 ?>
						<tr>
							<td><?php  foreach ($value as $key	 => $val) {
									if ($key == 'title' and is_string($key) ) {
										echo $val;
								} }?>
							</td>
								<td>
									<p>
									<?php  foreach ($value as $key	 => $val) {
										if ($key == 'description' and is_string($key) ) {
										echo $val;
									} }?>
								</p>
							</td>
							<td>
								<p><?php  foreach ($value as $key	 => $val) {
									if ($key == 'secDescription' and is_string($key) ) {
									echo $val;
									} }?>
								</p>
							</td>
							<td>
								<a href=<?php foreach ($value as $key => $val) {
							 				if ($key == 'id' and is_string($key)) {
							 					echo "\"editAboutHead.php?HeditId=".$val."\"";
							 				}
							 			} ?> class="edit"></a>
							 	<a href=<?php foreach ($value as $key => $val) {
							 				if ($key == 'id' and is_string($key)) {
							 					echo "\"?hDeleteid=".$val."\"";
							 				}
							 			} ?> class="delete" onclick="return DeleteCheck()">
							 	</a>
							</td>
						</tr>
						<?php }	 ?>
					</tbody>
				</table>
				<h3>About Us</h3>
				<table class="show-item">
					<tbody>
						<tr>
							<th>Heading</th>
							<th>Description</th>
							<th>
								<a href="addAboutItem.php" class="page-button">+ Add</a>
							</th>
						</tr>
						<?php foreach ($resultHead as $key => $value) {
							// var_dump($resultHead);
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
								<a href=<?php foreach ($value as $key => $val) {
										if ($key == 'id' and is_string($key)) 
											echo "\"editaboutItem.php?itemid=".$val."\"";
										}?> class="edit">
								</a>
								<a href=<?php foreach ($value as $key => $val) {
									if ($key == 'id' and is_string($key)) {
										echo "\"?subHeadDeleteid=".$val."\"";
										}
									} ?> class="delete" onclick="return DeleteCheck()">
								</a>
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

