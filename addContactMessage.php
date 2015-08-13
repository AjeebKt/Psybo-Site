<?php 
	error_reporting(1);
	include_once 'Database.php';
	$objdb = new Database('localhost' , 'root' , 'asd' , 'psybo-db');
	if (isset($_POST['btnAdd'])) 
	{
		$heading = $_POST['MsgContactHeadding'];
		$description = $_POST['txtMsgContact'];

		$fieldSrv = array('name');
		$valueSrv = array('contact');

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
				if ($objdb) 
				{
					$message = "<script type='text/javascript'>
									alert('Adding succesfull');
									window.location.replace('tabContact.php');
								</script>";
				}
				else
				{
					$message= "<script type='text/javascript'>
						alert('Adding failed try again later!');
					</script>";
				}
			}
		}
	}

	if (isset($_POST['btnCancel'])) 
	{
		header('location:tabContact.php');
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
		<form action="" method="POST" id="firstForm" name="firstForm">
			<div class="first-content">
				<h2>Add in Message</h2>
				<div class="group">
					<label for="MsgContactHeadding">Headding</label><br>
					<input type="text" id="MsgContactHeadding" name="MsgContactHeadding">
				</div>
				<div class="group">
					<label for="txtMsgContact">Description</label><br>
					<textarea name="txtMsgContact" id="txtMsgContact" cols="30" rows="10"></textarea>
				</div>
				<button id="btnAdd" name="btnAdd">Add</button>
				<button id="btnCancel" name="btnCancel">Cancel</button>
			</div>
		</form>
	</section>
	<?php echo $message; ?>
</body>
</html>