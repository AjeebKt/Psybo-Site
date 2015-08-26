<?php 
	error_reporting(1);
	include_once 'Database.php';
	$objdb = new Database('localhost', 'root', 'asd', 'psybo-db');
	$resultHead = $objdb->select('headings', array('title', 'description','id'), array('name', 'contact',));
	$resulcmp = $objdb->select('company_details', array(),array());
	foreach ($resulcmp[0] as $key => $value) 
	{
		if ($key == 'address_id' and is_string($key)) 
		{
			$cmp_addr_id = $value;
			$resultadd = $objdb->select('address', array(), array('id', $cmp_addr_id));
		}
	}
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
	if (isset($_GET['deleteid'])) 
	{
		$cmp_id = $_GET['deleteid'];
		$resultDel = $objdb->select('company_details', array(), array('id',$cmp_id));
		foreach ($resultDel[0] as $key => $value) 
		{
			if ($key == 'address_id' and is_string($key)) 
			{
				$dele_address_id = $value;
			}
		}
		$objdb->delete('company_details', array('id', $cmp_id));
		var_dump($dele_address_id);
		$objdb->delete('address', array('id', $dele_address_id));
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
										if ($key == 'description' and is_string($key) ) {
										echo $val;
									} }?>
								</p>
							</td>
							<td>
								<a href=<?php foreach ($value as $key => $val) {
											if ($key == 'id' and is_string($key)) {
												echo "\"editContactMessage.php?heditId=".$val."\"";
											}
										} ?> class="edit"></a>
								<a href=<?php foreach ($value as $key => $val) {
											if ($key == 'id' and is_string($key)) {
												echo "\"?hdeleteid=".$val."\"";
											}
										} ?> class="delete" onclick="return DeleteCheck()">
								</a>
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
							<th>Place</th>
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
								<p>
									<?php 
										foreach ($resultadd[0] as $key => $value) 
										{
											if ($key == 'address' and is_string($key)) 
											{
												echo $value;
											}
										}
									 ?>
								</p>
							</td>
							<td>
								<p>
									<?php 
										foreach ($resultadd[0] as $key => $value) 
										{
											if ($key == 'mobile' and is_string($key)) 
											{
												echo $value;
											}
										}
									 ?>
								</p>
							</td>
							<td>
								<p>
									<?php 
										foreach ($resultadd[0] as $key => $value) 
										{
											if ($key == 'email' and is_string($key)) 
											{
												echo $value;
											}
										}
									 ?>
								</p>
							</td>
							<td>
								<p>
									<?php 
										foreach ($resultadd[0] as $key => $value) 
										{
											if ($key == 'place' and is_string($key)) 
											{
												echo $value;
											}
										}
									 ?>
								</p>
							</td>
							<td>
								<p><?php 
										foreach ($resultadd[0] as $key => $value) 
										{
											if ($key == 'fb' and is_string($key)) 
											{
												echo $value;
											}
										}
									 ?></p>
							</td>
							<td>
								<p>
									<?php 
										foreach ($resultadd[0] as $key => $value) 
										{
											if ($key == 'twiter' and is_string($key)) 
											{
												echo $value;
											}
										}
									 ?>
								</p>
							</td>
							<td>
								<p>
									<?php 
										foreach ($resultadd[0] as $key => $value) 
										{
											if ($key == 'linkedin' and is_string($key)) 
											{
												echo $value;
											}
										}
									 ?>
								</p>
							</td>
							<td>
								<p>
									<?php 
										foreach ($resultadd[0] as $key => $value) 
										{
											if ($key == 'google_plus' and is_string($key)) 
											{
												echo $value;
											}
										}
									 ?>
								</p>
							</td>
							<td>
								<a href=<?php  
											foreach ($resulcmp[0] as $key => $value) 
											{
												if ($key == 'id' and is_string($key)) 
												{
													echo "\"editAddress.php?editId=".$value."\"";
												}
											}
								?>  class="edit"></a>
								<a href=<?php  
											foreach ($resulcmp[0] as $key => $value) 
											{
												if ($key == 'id' and is_string($key)) 
												{
													echo "\"?deleteid=".$value."\"";
												}
											}
								?> class="delete" onclick="return DeleteCheck()"></a>
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

