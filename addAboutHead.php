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
			if (preg_match('/^[A-Za-z0-9.,;\' _-]*$/',$heading) )
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
				if (preg_match('/^[A-Za-z0-9., _-]*$/', $description) )
				{
					$error =1;
					array_push($values, $_POST['firstTxtAbout']);
				}
				else
				{
					$error = 0;
					$message = "<script type='text/javascript'>
								alert('Please re-enter!');
							</script>";
				}
			}
			if (!empty($secDescription) and $error == 1) 
			{
				if (preg_match('/^[A-Za-z0-9., _-]*$/', $secDescription) )
				{
					$error =1;
					array_push($values, $_POST['SecondTxtAbout']);
				}
				else
				{
					$error = 0;
					$message = "<script type='text/javascript'>
								alert('Please re-enter!');
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
	<title>About PSYBO Technologies</title>
</head>
<body>
	<?php include 'dash.php'; ?>
	<section class="add-service">
		<form action="" method="POST" id="firstForm">
			<div class="first-content">
				<h3>Add Head</h3>
				<div class="group">
					<label for="aboutHeadding">Headding</label><br>
					<input type="text" id="aboutHeadding" name="headAbout">
				</div>
				<div class="group">
					<label for="firstTxtAbout">First Description</label><br>
					<textarea name="firstTxtAbout" id="firstTxtAbout" cols="30" rows="10"></textarea>
				</div>
				<div class="group">
					<label for="SecondTxtAbout">Second Description</label><br>
					<textarea name="SecondTxtAbout" id="SecondTxtAbout" cols="30" rows="10"></textarea>
				</div>
				<button id="btnAdd" name="btnAdd">Add</button>
				<button id="btnCancel" name="btnCancel">Cancel</button>
			</div>
		</form>
	</section>
	<?php echo $message; ?>
</body>
</html>