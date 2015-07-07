<?php 
include 'dash.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tab Team</title>
</head>
<body>
	<section>
		<form id="formTeam" name="formTeam" method="POST" action="">	
			<div id="tabTeam" class="tab-team">
			<h3>TEAM MEMBERS</h3>
				<label>Name</label>
				<input name="txtName" type="text"><br>
				<label>Designation</label>
				<input name="txtDesignation" type="text"><br>
				<label>Facebook</label>
				<input name="txtFacebook" type="text"><br>
				<label>Twitter</label>
				<input name="txtTwitter" type="text"><br>
				<label>LinkedIn</label>
				<input name="txtLinkedin" type="text"><br>
				<label>Google+</label>
				<input name="txtGplus" type="text"><br>
				<label>Employee Image</label>
				<input name="uploadTeam" type="file"><br>
				<button name="btnTeamSubmit" class="submit">Submit</button>
				<button name="btnReset" class="reset">Reset</button>
			</div>
		</form>
	</section>
</body>
</html>