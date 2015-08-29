<?php 
	error_reporting(E_ALL);
	include_once 'Database.php';
	$objdb = new Database('localhost', 'root', 'asd', 'psybo-db');
	$hId = $_GET['HeditId'];
	$resultHead = $objdb->select('headings', array(''), array('id', $hId) );
	if (isset($_POST['btnAdd'])) 
	{
		$headding = $_POST['headAbout'];
		$description = $_POST['txtServiceF'];
		$secDescription = $_POST['txtServiceS'];
		if (!empty($headding) and !empty($description) and !empty($secDescription))
		{
			if (preg_match('/^[A-Za-z0-9.,;\' ?_-]*$/',$headding) )
			{
				$error = 1;
				$feilds = ['title'];
				$values = [$headding];
			}
			else
			{
				$error = 0;
				$message = "<script type='text/javascript'>
							alert('Please enter correct Heading!!');
						</script>";
			}
			if ($error == 1) 
			{
				if (preg_match('/^[A-Za-z0-9\.\,\ \'\(\)\"\_\-\?\`\/\r\n]*$/', $description) )
				{
					$error = 1;
					$description = str_replace("/`", "</b>", $description);
					$description = str_replace("`", "<b>", $description);
					$description = str_replace("\r\n", "<br />", $description);
					array_push($values, $description);
					array_push($feilds, 'description');
				}
				else
				{
					$error = 0;
					$message = "<script type='text/javascript'>
								alert('Please re-enter first description!');
							</script>";
				}
			}
			if ($error == 1) 
			{
				if (preg_match('/^[A-Za-z0-9\.\,\ \'\?\(\)\"\_\’\‘\’\-\`\/\r\n]*$/', $secDescription) )
				{
					$error = 1;
					$secDescription = str_replace("\r\n", "<br />", $secDescription);
					array_push($values, $secDescription);
					array_push($feilds, 'secDescription');
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
				$objdb->update('headings', $feilds, $values, array('id', $hId));
				if ($objdb == true) 
				{
					$message = "<script type='text/javascript'>
									alert('Update succefull');
									window.location.replace('tabAbout.php');
								</script>";
				}
			}
		}
		else
		{
			$message = "<script type='text/javascript'>
							alert('Please check your feilds!');
						</script>";
		}	
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/admin-style.css">
	<title>Edit about title</title>
</head>
<body>
	<?php include 'dash.php'; ?>
	<section class="add-service">
		<form action="" method="POST" id="firstForm">
			<div class="first-content">
				<h3>Edit Title</h3>
				<div class="group">
					<label for="serviceHeadding">Heading</label><br>
					<input type="text" id="serviceHeadding" name="headAbout" required value=<?php
																								foreach ($resultHead[0] as $key => $value) {
																									if ($key == 'title' and is_string($key)) {
																										echo "\"".$value."\"";
																									}
																								}
																							?> >
				</div>
				<div class="group width-80">
					<label for="txtService">First Description</label><br>
					<textarea name="txtServiceF" id="txtService" cols="30" rows="5" required><?php
							foreach ($resultHead[0] as $key => $value) {
								if ($key == 'description' and is_string($key)) {
									$value = str_replace( "<b>","`", $value);
									$value = str_replace("</b>","/`", $value);
									echo $value;
								}
							}
						?></textarea>
				</div>
				<div class="group width-80">
					<label for="txtService">Second Description</label><br>
					<textarea name="txtServiceS" id="txtService" cols="30" rows="5" required><?php
							foreach ($resultHead[0] as $key => $value) {
								if ($key == 'secDescription' and is_string($key)) {
									$value = str_replace( "<b>","`", $value);
									$value = str_replace("</b>","/`", $value);
									echo $value;
								}
							}
						?></textarea>
				</div>
			</div>
			<div class="group pad-left">
				<button id="btnAdd" name="btnAdd">Update</button>
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