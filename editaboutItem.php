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
				<h3>Edit Item</h3>
				<div class="group">
					<label for="aboutHeadding">Headding</label><br>
					<input type="text" id="aboutHeadding">
				</div>
				<div class="group">
					<label for="txtAbout">Description</label><br>
					<textarea name="txtAbout" id="txtAbout" cols="30" rows="10"></textarea>
				</div>
				<button id="btnUpdate" name="btnUpdate">Update</button>
				<button id="btnCancel" name="btnCancel">Cancel</button>
			</div>
		</form>
	</section>
</body>
</html>