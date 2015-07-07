<?php 
	include 'dash.php';
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Edit Team</title>
 </head>
 <body>
 	<section>
		<form id="formTeam" name="formTeam" method="POST" action="">	
			<div id="tabTeam" class="tab-team">
			<h3>EDIT TEAM MEMBERS</h3>
				<div class="div-align-team">
					<label>Name</label><br>
					<input name="txtName" type="text"><br>
				</div>
				<div class="div-align-team">
					<label>Designation</label><br>
					<input name="txtDesignation" type="text"><br>
				</div>
				<div class="div-align-team">
					<label>Facebook</label><br>
					<input name="txtFacebook" type="text"><br>
				</div>					
				<div class="div-align-team">
					<label>Twitter</label><br>
					<input name="txtTwitter" type="text"><br>
				</div>
				<div class="div-align-team">
					<label>LinkedIn</label><br>
					<input name="txtLinkedin" type="text"><br>
				</div>
				<div class="div-align-team">
					<label>Google+</label><br>
					<input name="txtGplus" type="text"><br>
				</div>
				<div class="div-align-team">
					<label>Employee Image</label><br>
					<input name="uploadTeam" type="file"><br>
				</div>
				<button name="btnTeamSubmit" class="submit">Submit</button>
				<button name="btnReset" class="reset">Reset</button>
			</div>
		</form>
	</section>
 </body>
 </html>