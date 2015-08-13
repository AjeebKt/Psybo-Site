<?php 
error_reporting(1);
include_once 'Database.php';
$objdb = new Database('localhost' , 'root' , 'asd' , 'psybo-db');
if (isset($_POST['btnAdd']) ) 
{
	$heading = $_POST['aboutHeadding'];
	$description = $_POST['txtAbout'];

	$fieldSrv = array('name');
	$valueSrv = array('about');

	if (!empty($heading) and !empty($description) )
	{
		if (preg_match('/^[A-Za-z0-9., _-]*$/',$heading) )
		{
			$error = 1;
			array_push($valueSrv, $heading);
			array_push($fieldSrv, 'title');
		}
		else
		{
			$error = 0;
			$message ="<script type='text/javascript'>
							alert(' please enter Correct Heading!');
						</script>";
		}
		if (!empty($description) and $error == 1) 
		{
			if (preg_match('/^[A-Za-z0-9., _-]*$/',$description) )
			{
				$error = 1;
				array_push($valueSrv, $description);
				array_push($fieldSrv, 'description');
			}
			else
			{
				$message ="<script type='text/javascript'>
								alert(' please enter Correct Description!');
							</script>";
			}
		}
		if ($error == 1) 
		{
			$objdb->insert('headings', $fieldSrv, $valueSrv);
			if ($objdb == true) 
			{
				$message = "<script type='text/javascript'>
									alert('Adding succesfull');
									window.location.replace('/tabAbout.php');
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
	<title>Add Service</title>
</head>
<body>
	<?php include 'dash.php'; ?>
	<section class="add-service">
		<form action="" method="POST" id="firstForm">
			<div class="first-content">
				<h3>Add Item</h3>
				<div class="group">
					<label for="aboutHeadding">Headding</label><br>
					<input type="text" id="aboutHeadding" name="aboutHeadding">
				</div>
				<div class="group">
					<label for="txtAbout">Description</label><br>
					<textarea name="txtAbout" id="txtAbout" cols="30" rows="10"></textarea>
				</div>
				<button id="btnAdd" name="btnAdd">Add</button>
				<button id="btnCancel" name="btnCancel">Cancel</button>
			</div>
		</form>
	</section>
	<?php echo $message; ?>
</body>
</html>