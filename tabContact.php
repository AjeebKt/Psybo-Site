<?php 
	error_reporting(1);
	include_once 'Database.php';
	$objdb = new Database('localhost', 'root', 'asd', 'psybo-db');
	$resultHead = $objdb->select('headings', array('title', 'description','id'), array('name', 'contact',));
	if (isset($_GET['hdeleteid']) )
	{
		$headId = $_GET['hdeleteid']; 
		$objdb->delete('headings', array('id', $headId));
		if ($objdb == true) 
		{
			$message = "<script type='text/javascript'>
						window.location.replace('tabContact.php');
					</script>";
		}
	}	
 ?>
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
								<p>
									<?php  foreach ($value as $key	 => $val) {
										if ($key == 'title' and is_string($key) ) {
										echo $val;
									} }?>
								</p>
							</td>
							<td>
								<a href="editContactMessage.php" class="edit"></a>
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
			</form>
		</div>
	</section>
</body>
</html>

