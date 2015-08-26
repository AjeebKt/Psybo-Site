<?php 
	error_reporting(1);
	include_once 'Database.php';
	$objdb = new Database('localhost', 'root', 'asd', 'psybo-db');
	$editId = $_GET['heditId'];
	$resultcontact = $objdb->select('headings', array(), ['id', $editId]);
	$headding = $_POST['MsgContactHeadding'];
	$description = $_POST['txtMsgContact'];
	if (isset($_POST['btnAdd'])) 
	{
		if (!empty($headding) and !empty($description)) 
		{
			if (preg_match('/^[A-Za-z0-9., _-]*$/',$heading) )
			{
				$error = 1;
				$fields = ['title'];
				$values = [$headding];
			}
			else
			{
				$error = 0;
				$message ="<script type='text/javascript'>
								alert(' please enter Correct Heading!');
						</script>";
			}
			if ($error == 1) 
			{
				if (preg_match('/^[A-Za-z0-9\.\,\ \_\-\/\’\‘\’\r\n]*$/',$description) )
				{
					$error = 1;
					$description = str_replace("\r\n", "<br />", $description);
					array_push($values, $description);
					array_push($fields, 'description');
				}
				else
				{
					$message ="<script type='text/javascript'>
									alert(' please enter Correct Description!');
								</script>";
				}

			//update the content
				$objdb->update('headings', $fields, $values, array('id', $editId));
				if ($objdb == true) 
				{
					$message = "<script type='text/javascript'>
									alert('Update succesfull');
									window.location.replace('tabContact.php');
								</script>";
				}
			}
		}
		else
		{

			$message= "<script type='text/javascript'>
						alert('Please enter full details!');
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
	<title>Edit title - Contact</title>
</head>
<body>
	<?php include 'dash.php'; ?>
	<section class="add-service">
		<form action="" method="POST" id="firstForm">
			<div class="first-content">
				<h3>Edit Message title</h3>
				<div class="group">
					<label for="MsgContactHeadding">Heading</label><br>
					<input type="text" id="MsgContactHeadding" name="MsgContactHeadding" required value=<?php 
																											foreach ($resultcontact[0] as $key => $value) {
																												if ($key == 'title' and is_string($key)) {
																													echo "\"".$value."\"";
																												}
																											 } ?> >
				</div>
				<div class="group width-80">
					<label for="txtMsgContact">Description</label><br>
					<textarea name="txtMsgContact" id="txtMsgContact" cols="30" rows="5" required>
						<?php 
							foreach ($resultcontact[0] as $key => $value) {
								if ($key == 'description' and is_string($key)) {
									echo $value;
								}
						 	}  ?>
					</textarea>
				</div>
			</div>
			<div class="group pad-left">
				<button id="btnAdd" name="btnAdd">Update</button>
			</div>
		</form>
		<div class="group">
			<form action="tabContact.php">
				<button id="btnCancel" name="btnCancel">Cancel</button>
			</form>
		</div>
	</section>
	<?php echo $message; ?>
</body>
</html>