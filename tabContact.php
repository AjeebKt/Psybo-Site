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
				<h3>Address</h3>
				<table class="show-item">
					<tbody>
						<tr>
							<th>Address</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Facebook</th>
							<th>Twitter</th>
							<th>LinkedIn</th>
							<th>Google Plus</th>
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
								<a href="editAddress.php" class="edit"></a>
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

