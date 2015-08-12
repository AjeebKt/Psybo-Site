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
		<form action="" method="POST" id="secondServiceForm">
			<div class="service">
				<h2>Edit Service</h2>
				<div class="group">
					<label for="serviceItem">Service</label><br>
					<input id="serviceItem" type="text">
				</div>
				<div class="group">
					<label for="serviceDescription">Description</label><br>
					<textarea name="serviceDescription" id="serviceDescription" cols="30" rows="10"></textarea>
					<input type="file" id="serviceImg">
				</div>
				<button id="btnUpdate" name="btnUpdate">Update</button>
				<button id="btnCancel" name="btnCancel">Cancel</button>
			</div>
		</form>
	</section>
</body>
</html>