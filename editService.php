<?php 
	error_reporting(1);
	include_once 'Database.php';
	$objdb = new Database('localhost' , 'root' , 'asd' , 'psybo-db');
	$serviceId = $_GET['id'];
	$resultService = $objdb->Select('subHeadings', array(), array('id', $serviceId));
	foreach ($resultService[0] as $key => $value) 
	{
		if (is_string($key) and $key == 'files_id') 
		{
			$files_id = $value;
		}
	}
	$resultFiles = $objdb->Select('files', array(), array('id', $files_id));
	foreach ($resultFiles[0] as $key => $value) 
	{
		if (is_string($key) and $key == 'file_name') 
		{
			$imageName = $value;
		}
	}
	var_dump($imageName);
	if (isset($_POST['btnAdd'])) 
	{

	}
 ?>


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
		<form action="" method="POST" id="secondServiceForm">
			<div class="first-content">
				<h3>Edit Service</h3>
				<div class="group">
					<label for="serviceItem">Service</label><br>
					<input id="serviceItem" name="serviceItem" type="text" required value= <?php 
							foreach ($resultService[0] as $key => $value) {
								if ($key == 'title' and is_string($key)) {
									echo "\"".$value."\"";
								}
							}
					 ?> >
				</div>
				<div class="group width-80">
					<label for="serviceDescription">Description</label><br>
					<textarea name="serviceDescription" id="serviceDescription" cols="30" rows="5" required>
						<?php 
							foreach ($resultService[0] as $key => $value) {
								if ($key == 'description' and is_string($key)) {
									echo $value;
								}
							}
						?>						
					</textarea>
				</div>
				<div class="group">
					<label for="serviceImg">Select Image</label>
					<input type="file" id="serviceImg">
				</div>
			</div>
			<div class="group pad-left">
				<button id="btnAdd" name="btnAdd">Add</button>
			</div>
		</form>
		<div class="group">
			<form action="tabService.php">
				<button id="btnCancel" name="btnCancel">Cancel</button>
			</form>
		</div>
	</section>
</body>
</html>