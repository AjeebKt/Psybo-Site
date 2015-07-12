
<?php 
	// include 'dash.php';
	include 'Database.php';
	$objdb=new Database("localhost","root","asd","psybo-db");
	$emp_id=(int)$_GET['editid'];
	$result=$objdb->select("employee",array(),array("id",$emp_id));
	var_dump($result);
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Edit Team</title>
 	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/css.css">
	<link rel="stylesheet" href="css/style.css">
 </head>
 <body>
	<?php include 'dash.php';?>
 	<section>
		<form id="formTeam" name="formTeam" method="POST" action="">	
			<div id="tabTeam" class="tab-team">
			<h3>EDIT TEAM MEMBERS</h3>
				<div class="div-align-team">
					<label>Name</label><br>
					<input name="txtName" type="name" value=<?php foreach ($result[0] as $key => $value) {
						
					} ?> required><br>
				</div>
				<div class="div-align-team">
					<label>Designation</label><br>
					<input name="txtDesignation" type="text" required><br>
				</div>
				<div class="div-align-team">
					<label>Facebook</label><br>
					<input name="txtFacebook" type="text" optional><br>
				</div>					
				<div class="div-align-team">
					<label>Twitter</label><br>
					<input name="txtTwitter" type="text" optional><br>
				</div>
				<div class="div-align-team">
					<label>LinkedIn</label><br>
					<input name="txtLinkedin" type="text" optional><br>
				</div>
				<div class="div-align-team">
					<label>Google+</label><br>
					<input name="txtGplus" type="text" optional><br>
				</div>
				<div class="div-align-team">
					<label>Employee Image</label><br>
					<input name="uploadTeam" type="file" required><br>
				</div>
				<button name="btnTeamSubmit" class="submit">Submit</button>
				<button name="btnReset" class="reset">Reset</button>
			</div>
		</form>
	</section>
	<section class="show-error style="
    background-color: 0f5;>
		
	</section>
 </body>
 </html>
 

