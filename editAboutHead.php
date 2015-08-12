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
		<form action="" method="POST" id="firstServiceForm">
			<div class="first-content">
				<h2>Edit Head</h2>
				<div class="group">
					<label for="serviceHeadding">Headding</label><br>
					<input type="text" id="serviceHeadding" name="headAbout">
				</div>
				<div class="group">
					<label for="txtService">First Description</label><br>
					<textarea name="txtService" id="txtService" cols="30" rows="10"></textarea>
				</div>
				<div class="group">
					<label for="txtService">Second Description</label><br>
					<textarea name="txtService" id="txtService" cols="30" rows="10"></textarea>
				</div>
				<button>Update</button>
				<button>Cancel</button>
			</div>
		</form>
	</section>
</body>
</html>