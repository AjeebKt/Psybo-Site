<?php 
	error_reporting(1);
	include_once 'Database.php';
	$objdb = new Database('localhost', 'root', 'asd', 'psybo-db');
	if (isset($_POST['btnAdd'])) 
	{
		$heading = $_POST['headAbout'];
		$description =  $_POST['firstTxtAbout'];
		$secDescription = $_POST['SecondTxtAbout'];

		if(!empty($heading) and !empty($description) and !empty($secDescription) ) 
		{
			$values = array('about');
			if (preg_match('/^[A-Za-z0-9.,;\' ?_-]*$/',$heading) )
			{
				$error = 1;
				array_push($values, $heading); 
			}
			else
			{
				$error = 0;
				$message = "<script type='text/javascript'>
							alert('Please enter correct Heading!!');
						</script>";
			}
			if (!empty($description) and $error == 1) 
			{
				if (preg_match('/^[A-Za-z0-9\.\,\ \'\(\)\"\_\-\?\`\/\r\n]*$/', $description) )
				{
					$error =1;
					$description = str_replace("\r\n", "<br />", $description);
					$description = str_replace("/`", "</b>", $description);
					$description = str_replace("`", "<b>", $description);
					array_push($values, $description);
				}
				else
				{
					$error = 0;
					$message = "<script type='text/javascript'>
								alert('Please re-enter first description!');
							</script>";
				}
			}
			if (!empty($secDescription) and $error == 1) 
			{
				if (preg_match('/^[A-Za-z0-9\.\,\ \'\?\(\)\"\_\’\‘\’\-\`\/\r\n]*$/', $secDescription) )
				{
					$error =1;
					$secDescription = str_replace("\r\n", "<br />", $secDescription);
					$description = str_replace("/`", "</b>", $description);
					$description = str_replace("`", "<b>", $description);
					array_push($values, $secDescription);
				}
				else
				{
					$error = 0;
					$message = "<script type='text/javascript'>
								alert('Please re-enter second description!');
							</script>";
				}
			}
			if ($error == 1) 
			{
				$fields = array('name', 'title', 'description', 'secDescription');
				$objdb->insert("headings", $fields, $values);
				if ($objdb == true) 
				{
					$message = "<script type='text/javascript'>
									alert('Adding succefull');
									window.location.replace('tabAbout.php');
								</script>";
				}
			}
		}
		else
			$message = "<script type='text/javascript'>
							alert('Please enter full information!');
						</script>";
	}

	if (isset($_POST['btnCancel'])) 
	{
		header('location:tabService.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/admin-style.css">
	<title>Add About title</title>
</head>
<body>
	<?php include 'dash.php'; ?>
	<section class="add-service">
		<form action="" method="POST" id="firstForm">
			<div class="first-content">
				<h3>Add title</h3>
				<div class="group">
					<label for="aboutHeadding">Headding</label><br>
					<input type="text" id="aboutHeadding" name="headAbout" required>
				</div>
				<div class="group width-80">
					<label for="firstTxtAbout">First Description</label><br>
					<textarea name="firstTxtAbout" id="firstTxtAbout" cols="30" rows="5" required></textarea>
				</div>
				<div class="group width-80">
					<label for="SecondTxtAbout">Second Description</label><br>
					<textarea name="SecondTxtAbout" id="SecondTxtAbout" cols="30" rows="5" required></textarea>
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