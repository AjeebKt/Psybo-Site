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
				<h3>Edit Social Links</h3>
				<div class="group">
					<label for="fbLink">Facebook</label><br>
					<input type="text" id="fbLink">
				</div>
				<div class="group">
					<label for="txtTwitter">Twitter</label><br>
					<input name="txtTwitter" id="txtTwitter">
				</div>
				<div class="group">
					<label for="txtLn">Linked In</label><br>
					<input name="txtLn" id="txtLn">
				</div>
				<div class="group">
					<label for="txtGp">Google Plus</label><br>
					<input name="txtGp" id="txtGp">
				</div>
				<button id="btnAdd" name="btnAdd">Update</button>
				<button id="btnCancel" name="btnCancel">Cancel</button>
			</div>
		</form>
	</section>
</body>
</html>