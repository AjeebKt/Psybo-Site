	
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
		<form action="" method="POST" id="secondForm">
			<div class="service">
				<h3>Edit We do Item</h3>
				<div class="group">
					<label for="mainHead">Haedding</label><br>
					<input id="mainHead" type="text" name="homeWedo">
				</div>
				<div class="group">
					<label for="wedoLink">Link</label><br>
					<select class="selection" id="wedoLink" name="wedoLink">
						<option value="portfolio.php">Portfolio</option>
						<option value="service.php">Service</option>
						<option value="team.php">Team</option>
						<option value="about.php">About</option>
						<option value="contact.php">Contact</option>
					</select>
				</div>
				<div class="group">
					<label for="mainDescription">Description</label><br>
					<textarea name="homeWedoDescription" id="mainDescription" cols="30" rows="5"></textarea>
				</div>
				<div class="group">
					<label for="uploadWedo">Select Image</label>
					<input type="file" id="uploadWedo" name="homeWedoImg">
				</div>
			</div>
			<div class="group pad-left">
				<button id="btnAdd" name="btnAdd">Add</button>
				<button id="btnCancel" name="btnCancel">Cancel</button>
			</div>
		</form>
	</section>
</body>
</html>
