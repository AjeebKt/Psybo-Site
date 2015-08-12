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
				<h2>Edit Address</h2>
				<div class="group">
					<label for="footerAddress">Address</label><br>
					<textarea type="text" id="footerAddress" cols="30" rows="10"></textarea>
				</div>
				<div class="group">
					<label for="txtPhoneNo">Phone Number</label><br>
					<input name="txtPhoneNo" id="txtPhoneNo">
				</div>
				<div class="group">
					<label for="txtEmail">Email</label><br>
					<input name="txtEmail" id="txtEmail">
				</div>
				<button id="btnAdd" name="btnAdd">Update</button>
				<button id="btnCancel" name="btnCancel">Cancel</button>
			</div>
		</form>
	</section>
</body>
</html>