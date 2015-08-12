	
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
				<h2>Edit We do Item</h2>
				<div class="group">
					<label for="mainHead">Haedding</label><br>
					<input id="mainHead" type="text" name="homeWedo">
				</div>
				<div class="group">
					<label for="mainDescription">Description</label><br>
					<textarea name="homeWedoDescription" id="mainDescription" cols="30" rows="10"></textarea>
				</div>
				<div class="group">
					<label for="wedoLink">Link</label><br>
					<input type="text" id="wedoLink" name="wedoLink">
					<input type="file" id="uploadWedo" name="homeWedoImg">
				</div>
				<button id="btnUpdate" name="btnUpdate">Update</button>
				<button id="btnCancel" name="btnCancel">Cancel</button>
			</div>
		</form>
	</section>
</body>
</html>
