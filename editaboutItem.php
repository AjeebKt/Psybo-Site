<?php 
	error_reporting(E_ALL);
	include_once 'Database.php';
	$objdb = new Database('localhost', 'root', 'asd', 'psybo-db');
	$hId = $_GET['itemid'];
	$resultHead = $objdb->select('subHeadings', array(), array('id', $hId));
	if (isset($_POST['btnAdd'])) 
	{
		$headding = $_POST['aboutHeadding'];
		$description = $_POST['txtAbout'];
		if (!empty($headding) and !empty($description)) 
		{
			if (preg_match('/^[A-Za-z0-9., \'()-_?]*$/',$headding) )
			{
				$error = 1;
				$fields =['title'];
				$values = [$headding];
			}	
			else
			{
				$error = 0;
				$message ="<script type='text/javascript'>
							alert(' please re-enter Heading!');
						</script>";
			}
			if ($error == 1) 
			{
				if (preg_match('/^[A-Za-z0-9\.\:\,\'\(\)\-\_\ \"\“\“\’\‘\’\?\`\/\r\n]*$/',$description) )
				{
					$error = 1;
					$description = str_replace("/`", "</b>", $description);
					$description = str_replace("`", "<b>", $description);
					$description = str_replace("\r\n", "<br />", $description);
					array_push($fields, 'description');
					array_push($values, $description);
				}
				else
				{
					$error = 0;
					$message ="<script type='text/javascript'>
								alert(' please re-enter Description!');
							</script>";
				}
				$objdb->update('subHeadings', $fields, $values, array('id', $hId));
				if ($objdb == true) 
				{
					$message = "<script type='text/javascript'>
									alert('Update succesfull');
									window.location.replace('tabAbout.php');
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
	<title>Edit About item</title>
</head>
<body>
	<?php include 'dash.php'; ?>
	<section class="add-service">
		<form action="" method="POST" id="firstForm">
			<div class="first-content">
				<h3>Edit Items</h3>
				<div class="group">
					<label for="aboutHeadding">Heading</label><br>
					<input type="text" id="aboutHeadding" name="aboutHeadding" required value=<?php 
								foreach ($resultHead[0] as $key => $value) {
									if (is_string($key) and $key == 'title') {
										echo "\"".$value."\"";
									}
								}
							?>>
				</div>
				<div class="group width-80">
					<label for="txtAbout">Description</label><br>
					<textarea name="txtAbout" id="txtAbout" cols="30" rows="5" required><?php 
							foreach ($resultHead[0] as $key => $value) {
								if (is_string($key) and $key == 'description') {
									$value = str_replace( "<b>","`", $value);
									$value = str_replace("</b>","/`", $value);
									echo $value;
								}
							}
						?></textarea>
				<span>Use `example/` for Bold</span>
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