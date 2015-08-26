<?php 
	error_reporting(1);
	include_once 'Database.php';
	$objdb = new Database('localhost' , 'root' , 'asd' , 'psybo-db');
	$serviceId = (int)$_GET['id'];
	$resultService = $objdb->Select('subHeadings', array(), array('id', $serviceId));
	foreach ($resultService[0] as $key => $value) 
	{
		if (is_string($key) and $key == 'files_id') 
		{
			$files_id = $value;
		}
	}
	$files_id = (int)$files_id;
	$resultFiles = $objdb->Select('files', array(), array('id', $files_id));
	foreach ($resultFiles[0] as $key => $value) 
	{
		if (is_string($key) and $key == 'file_name') 
		{
			$imageName = $value;
		}
	}
	if (isset($_POST['btnAdd'])) 
	{
		$headdings = $_POST['serviceItem'];
		$description = $_POST['serviceDescription'];

		$rand =  rand();
		$target_dir = getcwd().'/upload-image/';
		$file_name=basename($_FILES["serviceImg"]["name"]);
		$file_type=pathinfo(basename($_FILES["serviceImg"]["name"]),PATHINFO_EXTENSION);

		if (!empty($headdings) and !empty($description)) 
		{
			if (preg_match('/^[A-Za-z0-9., \'_-]*$/',$heading) )
			{
				$error = 1;
				$fields = array('title');
				$values = array($headdings);
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
					$error =0 ;
					$message ="<script type='text/javascript'>
									alert(' please enter Correct Description!');
								</script>";
				}
			}
			if (!empty($file_name) )#and $error == 1) 
			{
				$uploadok=1;
	         	$check=getimagesize($_FILES["serviceImg"]["tmp_name"]);
	         	if ($check !== FALSE) 
		        {
	         	 // echo "File is an image :" .$check["mime"].".";
	            $uploadok=1;
	        	}
	         	else
	         	{
	            	$message="<script type='text/javascript'>
	                	        alert('Please select onother image!');  
	                    	 </script>"; 
	            	$uploadok=0;
	         	}
	         	if ($_FILES["serviceImg"]["size"] > 10000000 and $uploadok == 1)
	         	{
	            	$message="<script type='text/javascript'>
	                	        alert('Sorry file to be large .please select onether file!');
	                    	 </script>"; 
	            	$uploadok=0;
	         	}
	         	if ($file_type != "jpg" and $file_type !="png" and $file_type != "jpeg" and $uploadok == 1) 
	         	{
		            $message= "<script type='text/javascript'>
		                     alert('PLease select jpg or png or jpeg file!');
	    	              </script>";
	        	    $uploadok=0;
	         	}
	         	if ($uploadok == 0) 
	         	{
	         		$message= "<script type='text/javascript'>
							alert('Upload failed try again later!');
						</script>";
	         	}
	         	elseif($uploadok == 1)
	         	{
	         		$upload = move_uploaded_file($_FILES['serviceImg']['tmp_name'], $target_dir.$rand.".".$file_type );
	         		if ($upload == true) 
		         	{
		         		$valueFile = array($rand.".".$file_type, $file_type);
		         		$fieldsFile = array('file_name', 'type');
		         		$objdb->update('files', $fieldsFile, $valueFile, array('id', $files_id) );
		         		if ($objdb == true) 
		         		{
		         			$objdb->update('subHeadings', $fields, $values, array('id', $serviceId));
		         			if ($objdb == true) 
		         			{
		         				$message = "<script type='text/javascript'>
												alert('Update succesfull');
												window.location.replace('tabService.php');
											</script>";	
		         			}
	         			}
	         		}
	         	}
			}
			else
			{
				$objdb->update('subHeadings', $fields, $values, array('id', $serviceId));
     			if ($objdb == true) 
     			{
     				$message = "<script type='text/javascript'>
									alert('Update succesfull');
									window.location.replace('tabService.php');
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
	<title>Add Service</title>
</head>
<body>
	<?php include 'dash.php'; ?>
	<section class="add-service">
		<form action="" method="POST" id="secondServiceForm" enctype="multipart/form-data">
			<div class="first-content">
				<h3>Edit Service</h3>
				<div class="group">
					<label for="serviceItem">Service</label><br>
					<input id="serviceItem" name="serviceItem" type="text" required value= <?php 
							foreach ($resultService[0] as $key => $value) {
								if ($key == 'title' and is_string($key)) {
									echo "\"".$value."\"";
								}
							}
					 ?> >
				</div>
				<div class="group width-80">
					<label for="serviceDescription">Description</label><br>
					<textarea name="serviceDescription" id="serviceDescription" cols="30" rows="5" required>
						<?php 
							foreach ($resultService[0] as $key => $value) {
								if ($key == 'description' and is_string($key)) {
									echo $value;
								}
							}
						?>						
					</textarea>
				</div>
				<div class="group">
					<label for="serviceImg">Select Image</label>
					<span>(Image Must be in 100X100 px)</span>
					<input type="file" id="serviceImg" name="serviceImg">
				</div>
			</div>
			<div class="group pad-left">
				<button id="btnAdd" name="btnAdd">Add</button>
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