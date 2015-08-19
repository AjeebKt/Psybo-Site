<?php 
	error_reporting(1);
	include_once 'Database.php';
	$objdb = new Database('localhost', 'root','asd','psybo-db');
	$messageId =$_GET['editId'];
	$resultCmpDtl = $objdb->select('company_details', array(),array('id', $messageId));
	foreach ($resultCmpDtl[0] as $key => $value) 
	{
		if ($key == 'address_id' and is_string($key) )
		{
			$address_id = $value;
		}
	}
	$resultAddress = $objdb->select('address', array(), array('id', $address_id));
	if (isset($_POST['btnUpdate'])) 
	{
		echo "string";
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/admin-style.css">
	<title>Add Service</title>
</head>
<body>
	<?php include 'dash.php'; ?>
	<section class="add-service">
		<form action="" method="POST" id="firstForm">
			<div class="first-content">
				<h3>Edit Address</h3>
				<div class="group">
					<label for="txtPhoneNo">Phone Number</label><br>
					<input name="txtPhoneNo" id="txtPhoneNo" type="tel" value=<?php foreach ($resultAddress[0] as $key => $value) {
																					if (is_string($key) and $key == 'mobile') {
																						echo "\"".$value."\"";
																					}			
																				} ?> required>
				</div>
				<div class="group">
					<label for="txtEmail">Email</label><br>
					<input name="txtEmail" id="txtEmail" type="email" required value=<?php foreach ($resultAddress[0] as $key => $value) {
																					if (is_string($key) and $key == 'email') {
																						echo "\"".$value."\"";
																					}			
																				} ?> >
				</div>
				<div class="group">
					<label for="fbLink">Facebook</label><br>
					<input type="text" id="fbLink" type="url" value=<?php foreach ($resultAddress[0] as $key => $value) {
																					if (is_string($key) and $key == 'fb') {
																						echo "\"".$value."\"";
																					}			
																				} ?>>
				</div>
				<div class="group">
					<label for="txtTwitter">Twitter</label><br>
					<input name="txtTwitter" id="txtTwitter" type="url" value=<?php foreach ($resultAddress[0] as $key => $value) {
																					if (is_string($key) and $key == 'twiter') {
																						echo "\"".$value."\"";
																					}			
																				} ?>>
				</div>
				<div class="group">
					<label for="txtLn">Linked In</label><br>
					<input name="txtLn" id="txtLn" type="url" value=<?php foreach ($resultAddress[0] as $key => $value) {
																					if (is_string($key) and $key == 'linkedin') {
																						echo "\"".$value."\"";
																					}			
																				} ?>>
				</div>
				<div class="group">
					<label for="txtGp">Google Plus</label><br>
					<input name="txtGp" id="txtGp" type="url" value=<?php foreach ($resultAddress[0] as $key => $value) {
																					if (is_string($key) and $key == 'google_plus') {
																						echo "\"".$value."\"";
																					}			
																				} ?>>
				</div>
				<div class="group width-80">
					<label for="footerAddress">Address</label><br>
					<textarea type="text" id="footerAddress" cols="30" rows="5" required ><?php foreach ($resultAddress[0] as $key => $value) {
																					if (is_string($key) and $key == 'address') {
																						echo $value;
																					}			
																				} ?></textarea>
				</div>
			</div>
			<div class="group pad-left">
				<button id="btnAdd" name="btnUpdate">Update</button>
			</div>
		</form>
		<div class="group">
			<form action="tabContact.php">
				<button id="btnCancel" name="btnCancel">Cancel</button>
			</form>
		</div>
	</section>
</body>
</html>