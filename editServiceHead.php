<?php 
	error_reporting(E_ALL);
	include_once 'Database.php';
	$objdb = new Database('localhost', 'root', 'asd', 'psybo-db');
	$headId = $_GET['id'];
	$resultHead = $objdb->select('headings', array(), array('id', $headId));
	$message = "";
	if (isset($_POST['btnAdd'])) 
	{
		$heading = $_POST['serviceHeadding'];
		$description = $_POST['txtService'];
		if (!empty($heading) and !empty($description))
		{
			if (preg_match('/^[A-Za-z0-9., \'_-]*$/',$heading) )
				{
					$error = 1;
					$fields = ['title'];
					$values = [$heading];
				}
			else
			{
				$error =0;
				$message = "<script type='text/javascript'>
							alert('Please enter correct Heading!!');
						</script>";	
			}
			if ($error == 1) 
			{
				// if (preg_match('/^[A-Za-z0-9\.\,\ \_\-\’\r\n]*$/', $description) )	
				if (preg_match('/^[A-Za-z0-9\.\,\ \_\’\'\"\-\`\/\r\n]*$/', $description) )
				{
					$description = str_replace("\r\n", "<br />", $description);
					$description = str_replace("/`", "</b>", $description);
					$description = str_replace("`", "<b>", $description);
					array_push($values, $description);
					array_push($fields, 'description');
				}
				else
				{
					$error = 0;
					$message = "<script type='text/javascript'>
								alert('Please re-enter description!');
							</script>";
				}
			}
			if ($error ==1 ) 
			{

				$objdb->update('headings', $fields, $values, array('id', $headId));
				if ($objdb == true) 
				{
					$message = "<script type='text/javascript'>
									alert('update succesfull!');
									window.location.replace('tabService.php');
								</script>";
				}
			}
		}
		else
		{
			$message = "<script type='text/javascript'>
									alert('Check the fields!');
								</script>";
		}
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
	<title>Edit Service Title</title>
</head>
<body>
	<?php include 'dash.php'; ?>
	<section class="add-service">
		<form action="" method="POST" id="firstServiceForm">
			<div class="first-content">
				<h3>Edit Title</h3>
				<div class="group">
					<label for="serviceHeadding">Heading</label><br>
					<input type="text" id="serviceHeadding" name="serviceHeadding" required value=<?php 
																foreach ($resultHead[0] as $key => $value) {
																			if ($key == 'title' and is_string($key)) {
																				echo "\"".$value."\"";
																			}
																		}
																	 ?> >
				</div>
				<div class="group width-80">
					<label for="txtService">Description</label><br>
					<textarea name="txtService" id="txtService" cols="30" rows="5" required><?php 
							foreach ($resultHead[0] as $key => $value) {
										if ($key == 'description' and is_string($key)) {
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
			<form action="tabService.php">
				<button id="btnCancel" name="btnCancel">Cancel</button>
			</form>
		</div>
	</section>
	<?php echo $message; ?>
</body>
</html>