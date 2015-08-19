<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/admin-style.css">
	<title>About PSYBO Technologies</title>
</head>
<body>
	<?php include 'dash.php'; ?>
	<section class="add-service">
		<form action="" method="POST" id="firstForm">
			<div class="first-content">
				<h3>Edit Head</h3>
				<div class="group">
					<label for="serviceHeadding">Headding</label><br>
					<input type="text" id="serviceHeadding" name="headAbout" required>
				</div>
				<div class="group width-80">
					<label for="txtService">First Description</label><br>
					<textarea name="txtService" id="txtService" cols="30" rows="5" required></textarea>
				</div>
				<div class="group width-80">
					<label for="txtService">Second Description</label><br>
					<textarea name="txtService" id="txtService" cols="30" rows="5" required></textarea>
				</div>
			</div>
			<div class="group pad-left">
				<button id="btnAdd" name="btnAdd">Add</button>
			</div>
		</form>
		<div class="group">
			<form action="tabAbout.php">
				<button id="btnCancel" name="btnCancel">Cancel</button>
			</form>
		</div>
	</section>
</body>
</html>