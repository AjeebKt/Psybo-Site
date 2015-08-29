

                                                                                                                                                                              

                                                                                                                                                                              <?php 
	error_reporting(1);
	include_once 'Database.php';
	$objdb = new Database('localhost' , 'root' , 'asd' , 'psybo-db');
	if (isset($_POST['btnAdd'])) 
	{
		$heading = $_POST['homeHead'];
		$description =  $_POST['homeDescription'];
		if (!empty($heading) and !empty($description)) 
		{
			$values = array('home');
			if (preg_match('/^[A-Za-z0-9., \'_-]*$/',$heading) )
			{
				$error = 1;
				array_push($values,$heading); 
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
				// $description = nl2br($description);
				// var_dump($description);
				if (preg_match('/^[A-Za-z0-9\.\,\ \_\-\’\/\`\r\n]*$/', $description) and $error ==1)	
				{
					$description = str_replace("\r\n", "<br />", $description);
					$description = str_replace("/`", "</b>", $description);
					$description = str_replace("`", "<b>", $description);
					array_push($values, $description);
				}
				else
				{
					$error = 0;
					$message = "<script type='text/javascript'>
								alert('Please re-enter description!');
							</script>";
				}
			}
			if ($error == 1) 
			{
				$fields = array('name', 'title', 'description');
				$objdb->insert("headings", $fields, $values);
				if ($objdb == true) 
				{
					$message = "<script type='text/javascript'>
									alert('Adding succefull');
									window.location.replace('tabHome.php');
								</script>";
				}
				else
				{
					$message = "<script type='text/javascript'>
									alert('Adding failed! please try again.');
								</script>";
				}
			}
		}
		else
			$message = "<script type='text/javascript'>
							alert('Please enter full information!');
						</script>";
}
if (isset($_POST['btnCancel']) ) 
{
	header('location:tabHome.php');
}
?>	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/admin-style.css">
	<title>Add Title - Home</title>
</head>
<body>
	<?php include 'dash.php'; ?>
	<section class="add-service">
		<form action="" method="POST" id="secondServiceForm">
			<div class="first-content">
				<h3>Add Home Title</h3>
				<div class="group">
					<label for="mainHead">Headding</label><br>
					<input id="mainHead" type="text" name="homeHead" required>
				</div>
				<div class="group width-80">
					<label for="mainDescription">Description</label><br>
					<textarea name="homeDescription" id="mainDescription" cols="30" rows="5" required></textarea>
				</div>
			</div>
			<div class="group pad-left">
				<button id="btnAdd" name="btnAdd">Add</button>
			</div>
		</form>
		<div class="group">
			<form action="" id="form2" name="form2" method="POST">
				<button id="btnCancel" name="btnCancel">Cancel</button>
			</form>
		</div>
	</section>
	<?php echo $message; ?>
</body>
</html>
