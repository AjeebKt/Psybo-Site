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
		<form action="" method="POST" id="firstServiceForm">
			<div class="first-content">
				<div class="group">
					<label for="serviceHeadding">Headding</label><br>
					<input type="text" id="serviceHeadding">
				</div>
				<div class="group">
					<label for="txtService">Description</label><br>
					<textarea name="txtService" id="txtService" cols="30" rows="10"></textarea>
				</div>
				<button>Add</button>
				<button>Cancel</button>
			</div>
		</form>
	</section>
</body>
</html>