<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/admin-style.css">
	<title>Our Service</title>
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
		<form action="" method="POST" id="secondServiceForm">
			<div class="service">
				<h2>Add Service</h2>
				<div class="group">
					<label for="serviceItem">Service</label><br>
					<input id="serviceItem" type="text">
				</div>
				<div class="group">
					<label for="serviceDescription">Description</label><br>
					<textarea name="serviceDescription" id="serviceDescription" cols="30" rows="10"></textarea>
					<input type="file" id="serviceImg">
				</div>
				<button>Add</button>
				<button>Cancel</button>
			</div>
		</form>
	</section>
</body>
</html>