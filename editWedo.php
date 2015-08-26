<?php 
	error_reporting(1);
	include_once 'Database.php';
	$objdb = new Database('localhost', 'root', 'asd', 'psybo-db');
	$wedoId = $_GET['editid'];
	$resultwedo = $objdb->select('subHeadings', array(), array('id', $wedoId) );
	$headding = $_POST['homeWedo'];
	$description = $_POST['homeWedoDescription'];
	$link = $_POST['wedoLink'];
	if (isset($_POST['btnAdd'])) 
	{
		if (!empty($headding) and !empty($description) and !empty($link)) 
		{
			if (preg_match('/^[A-Za-z0-9., \'_-]*$/',$heading) )
			{
				$error = 1;
				$values = array($headding);
				$fields = array('title');
			}
			else
			{
				$error =0;
				$message = "<script type='text/javascript'>
							alert('Please enter correct Heading!!');
						</script>";
			}
			if (preg_match('/^[A-Za-z0-9\.\:\,\'\(\)\-\_\ \"\“\“\’\‘\’\?\r\n]*$/', $description))	
			{
				$error = 1;
				array_push($values, $description);
				array_push($fields, 'description');
			}
			else
			{
				$error =0;
				$message = "<script type='text/javascript'>
							alert('Please enter correct description!!');
						</script>";
			}
			if (preg_match('/^[A-Za-z0-9., \'_-]*$/',$link) )
			{
				$error = 1;
				array_push($values, $link);
				array_push($fields, 'link');
			}
			else
			{
				$error =0;
				$message = "<script type='text/javascript'>
							alert('Please select correct link!!');
						</script>";
			}
			if ($error == 1) 
			{
				$objdb->update('subHeadings', $fields, $values, array('id', $wedoId));
				if ($objdb == true) 
				{
					$message = "<script type='text/javascript'>
								alert('update succesfull!');
								window.location.replace('tabHome.php');
							</script>";
				}
			}
		}
	}

?>	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/admin-style.css">
	<title>Edit We-do Item</title>
</head>
<body>
	<?php include 'dash.php'; ?>
	<section class="add-service">
		<form action="" method="POST" id="secondForm">
			<div class="first-content">
				<h3>Edit We do Item</h3>
				<div class="group">
					<label for="mainHead">Heading</label><br>
					<input id="mainHead" type="text" name="homeWedo" required value=<?php foreach ($resultwedo[0] as $key => $value) {
																							if ($key == 'title'  and is_string($key)) {
																								echo "\"".$value."\"";
																							}
																						} 
																					?>>
				</div>
				<div class="group">
					<label for="wedoLink">Link</label><br>
					<select class="selection" id="wedoLink" name="wedoLink" >
						<option value="portfolio.php">Portfolio</option>
						<option value="service.php">Service</option>
						<option value="team.php">Team</option>
						<option value="about.php">About</option>
						<option value="contact.php">Contact</option>
					</select>
				</div>
				<div class="group width-80">
					<label for="mainDescription">Description</label><br>
					<textarea name="homeWedoDescription" id="mainDescription" cols="30" rows="5" requierd>
						<?php foreach ($resultwedo[0] as $key => $value) {
								if ($key == 'description'  and is_string($key)) {
									echo $value;
								}
							} 
						?>
					</textarea>
				</div>
				<!-- <div class="group">
					<label for="uploadWedo">Select Image</label><br>
					<input type="file" id="uploadWedo" name="homeWedoImg">
				</div> -->
			</div>
			<div class="group pad-left">
				<button id="btnAdd" name="btnAdd">Add</button>
			</div>
		</form>
		<div class="group">
			<form action="tabHome.php">
				<button id="btnCancel" name="btnCancel">Cancel</button>
			</form>
		</div>
	</section>
	<?php echo $message; ?>
</body>
</html>
