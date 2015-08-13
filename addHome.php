	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/admin-style.css">
	<title>PSYBO Technologies Home</title>
</head>
<body>
	<?php include 'dash.php'; ?>
	<section class="add-service">
		<form action="" method="POST" id="secondServiceForm">
			<div class="service">
				<h3>Add Home Head</h3>
				<div class="group">
					<label for="mainHead">Haedding</label><br>
					<input id="mainHead" type="text" name="homeHead">
				</div>
				<div class="group">
					<label for="mainDescription">Description</label><br>
					<textarea name="homeDescription" id="mainDescription" cols="30" rows="10"></textarea>
				</div>
				<button id="btnAdd" name="btnAdd">Add</button>
				<button id="btnCancel" name="btnCancel">Cancel</button>
			</div>
		</form>
	</section>
</body>
</html>
