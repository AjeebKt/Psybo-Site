<?php 
	error_reporting(1);
	include_once 'Database.php';
	$objdb = new Database('localhost', 'root', 'asd', 'psybo-db');
	$resultHead = $objdb->select('headings', array(), array('name', 'home',));
	$headId = $_GET['editid'];
	$headding = $_POST['homeHead'];
	$description = $_POST['homeDescription'];

	if (isset($_POST['btnAdd'])) 
	{
		if (!empty($headding) and !empty($description)) 
		{
			if (preg_match('/^[A-Za-z0-9., \'_-]*$/',$heading) )
			{
				$error = 1;
				$values = array($headding);
				$fields = array('title');
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
				if (preg_match('/^[A-Za-z0-9\.\,\ \_\-\’\r\n]*$/', $description))	
				{
					$description = str_replace("\r\n", "<br />", $description);
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
			if ($error ==1) 
			{
				$objdb->update('headings', $fields, $values,array('id', $headId));
				if ($objdb == true) 
				{
					$message = "<script type='text/javascript'>
									alert('update succesfull!');
									window.location.replace('tabHome.php');
								</script>";
				}
			}
		}
	}

	if (isset($_POST['btnCancel'])) 
	{
		header("location:tabHome.php");
	}
?>	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/admin-style.css">
	<title>Edit Title - Home</title>
</head>
<body>
	<?php include 'dash.php'; ?>
	<section class="add-service">
		<form action="" method="POST" id="secondForm">
			<div class="first-content">
				<h3>Edit Home Title</h3>
				<div class="group">
					<label for="mainHead">Headding</label><br>
					<input id="mainHead" type="text" name="homeHead" required value=<?php 
							foreach ($resultHead[0] as $key => $value) {
								if ($key == 'title' and is_string($key)) {
									echo "\"".$value."\"";
								}
							}
						 ?> >
				</div>
				<div class="group width-80">
					<label for="mainDescription">Description</label><br>
					<textarea name="homeDescription" id="mainDescription" cols="30" rows="5" required><?php 
							foreach ($resultHead[0] as $key => $value) {
								if ($key == 'description' and is_string($key)) {
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
			<form method="POST" action="">
				<button id="btnCancel" name="btnCancel">Cancel</button>
			</form>
		</div>
	</section>
	<?php echo $message; ?>
</body>
</html>
