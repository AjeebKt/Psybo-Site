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
				<h3>Add Address</h3>
				<div class="group">
					<label for="footerAddress">Address</label><br>
					<textarea type="text" id="footerAddress" cols="30" rows="5"></textarea>
				</div>
				<div class="group">
					<label for="txtPhoneNo">Phone Number</label><br>
					<input name="txtPhoneNo" id="txtPhoneNo">
				</div>
				<div class="group">
					<label for="txtEmail">Email</label><br>
					<input name="txtEmail" id="txtEmail">
				</div>
			</div>
			<div class="group pad-left">
				<button id="btnAdd" name="btnAdd">Add</button>
				<button id="btnCancel" name="btnCancel">Cancel</button>
			</div>
		</form>
	</section>
</body>
</html>