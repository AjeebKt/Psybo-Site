<?php 
error_reporting(1);
include_once 'Database.php';
$objdb = new Database('localhost' , 'root' , 'asd' , 'psybo-db');
if (isset($_POST['btnAdd'])) 
{
	$headding = $_POST['aboutHeadding'];
	$description = $_POST['txtAbout'];

	$fieldAbout = array('name');
	$valueAbout = array('about');
	if (!empty($headding) and !empty($description) ) 
	
	{
		if (preg_match('/^[A-Za-z0-9., \'()-_?]*$/',$headding) )
		{
			$error = 1;
			array_push($fieldAbout, 'title');
			array_push($valueAbout, $headding); 
		}
		else
		{
			$error = 0;
			$message ="<script type='text/javascript'>
							alert(' please re-enter Heading!');
						</script>";
		}
		if (preg_match_all('/^[A-Za-z0-9\.\:\,\'\(\)\-\_\ \"\“\“\’\‘\’\?\`\/\r\n]*$/',$description) and $error == 1)
		{
			$error = 1;
			$description = str_replace("\r\n", "<br />", $description);
			$description = str_replace("/`", "</b>", $description);
			$description = str_replace("`", "<b>", $description);
			array_push($fieldAbout, 'description');
			array_push($valueAbout, $description);
		}
		else
		{
			$error = 0;
			$message ="<script type='text/javascript'>
							alert(' please re-enter description!');
						</script>";
		}
		if ($error == 1) 
		{
			// insert_mul_srvc($values_files,$fields_srv,$values_srv);
			$values_files =array('','');
			$objdb->insert_mul_srvc($values_files,$fieldAbout,$valueAbout);
			if ($objdb == true) 
			{
				$message = "<script type='text/javascript'>
								alert('Adding succesfull');
								window.location.replace('tabAbout.php');
							</script>";
			}
		}	
	}
	else
		$message = "<script type='text/javascript'>
								alert('Please Complete !');
							</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/admin-style.css">
	<title>Add about Item</title>
</head>
<body>
	<?php include 'dash.php'; ?>
	<section class="add-service">
		<form action="" method="POST" id="firstForm">
			<div class="first-content">
				<h3>Add Items</h3>
				<div class="group">
					<label for="aboutHeadding">Headding</label><br>
					<input type="text" id="aboutHeadding" name="aboutHeadding" required>
				</div>
				<div class="group width-80">
					<label for="txtAbout">Description</label><br>
					<textarea name="txtAbout" id="txtAbout" cols="30" rows="5" required></textarea>
				</div>
			</div>
			<div class="group pad-left">
				<button id="btnAdd" name="btnAdd">Add</button>
			</div>
		</form>
		<div class="group">
			<form action="tabAbout.php">
				<button id="btnCancel" name="btnCancel">Cancel</button>
			</form>
		</div>
	</section>
	<?php echo $message; ?>
</body>
</html>