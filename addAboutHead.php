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
				<h3>Add Head</h3>
				<div class="group">
					<label for="aboutHeadding">Headding</label><br>
					<input type="text" id="aboutHeadding" name="headAbout">
				</div>
				<div class="group">
					<label for="firstTxtAbout">First Description</label><br>
					<textarea name="firstTxtAbout" id="firstTxtAbout" cols="30" rows="10"></textarea>
				</div>
				<div class="group">
					<label for="SecondTxtAbout">Second Description</label><br>
					<textarea name="SecondTxtAbout" id="SecondTxtAbout" cols="30" rows="10"></textarea>
				</div>
				<button id="btnAdd" name="btnAdd">Add</button>
				<button id="btnCancel" name="btnCancel">Cancel</button>
			</div>
		</form>
	</section>
</body>
</html>