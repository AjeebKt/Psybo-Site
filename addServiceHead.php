<?php 
error_reporting(1);
include_once 'Database.php';
$objdb = new Database('localhost', 'root', 'asd', 'psybo-db');
if (isset($_POST['btnAdd'])) 
{
	$heading = $_POST['serviceHeadding'];
	$description =  $_POST['txtService'];
	if (!empty($heading) and !empty($description)) 
	{
		$values = array('service');
		if (preg_match('/^[A-Za-z0-9., \'_-]*$/',$heading) )
		{
			$error = 1;
			array_push($values, $_POST['serviceHeadding']); 
		}
		else
			$message = "<script type='text/javascript'>
						alert('Please enter correct Heading!!');
					</script>";
		if (!empty($description) and $error == 1) 
		{
			if (preg_match('/^[A-Za-z0-9\.\,\ \_\-\r\n]*$/', $description) )
			{
				$description = str_replace("\r\n", "<br />", $description);
				array_push($values, $description);
			}
		}
		else
		{
			$error = 0;
			$message = "<script type='text/javascript'>
						alert('Please re-enter!');
					</script>";
		}
		if ($error == 1) 
		{
			$fields = array('name', 'title', 'description');
			$objdb->insert("headings", $fields, $values);
			if ($objdb == true) 
			{
				$message = "<script type='text/javascript'>
								alert('Adding succefull');
								window.location.replace('tabService.php');
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
	header('location:tabService.php');

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
		<form action="" method="POST" id="firstServiceForm" name="firstServiceForm">
			<div class="first-content">
				<h3>Add Head</h3>
				<div class="group">
					<label for="serviceHeadding">Headding</label><br>
					<input type="text" name="serviceHeadding" id="serviceHeadding">
				</div>
				<div class="group">
					<label for="txtService">Description</label><br>
					<textarea name="txtService" id="txtService" cols="30" rows="5"></textarea>
				</div>
			</div>
			<div class="group pad-left">
				<button id="btnAdd" name="btnAdd">Add</button>
				<button id="btnCancel" name="btnCancel">Cancel</button>
			</div>
		</form>
	</section>
	<?php echo $message; ?>
</body>
</html>