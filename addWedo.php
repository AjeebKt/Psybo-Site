<?php 
	error_reporting(1);
	include_once 'Database.php';
	$objdb = new Database('localhost' , 'root' , 'asd' , 'psybo-db');
	if (isset($_POST['btnAdd']) )
	{
		$heading = $_POST['homeWedo'];	
		$description = $_POST['homeWedoDescription'];
		$link = $_POST['wedoLink'];

		$rand=rand();
		$target_dir=getcwd()."/upload-image/";
		$file_name=basename($_FILES["homeWedoImg"]["name"]);
		$file_type=pathinfo(basename($_FILES["homeWedoImg"]["name"]),PATHINFO_EXTENSION);
		
		$fieldSrv = array('name');
		$valueSrv = array('wedo');
		$fieldFiles = array($file_name, $file_type);

		if (!empty($heading) and !empty($description) and !empty($file_name) )
		{
			if (preg_match('/^[A-Za-z0-9., _\'-]*$/',$heading) )
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
				if (preg_match('/^[A-Za-z0-9., \'_-]*$/',$description) )
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
				if (!empty($link) and $error == 1) 
				{
					if (preg_match('/^[A-Za-z0-9., _-]*$/',$link) )
					{
						$error = 1;
						array_push($valueSrv, $link);
						array_push($fieldSrv, 'link');

					}
					else
					{
						$message ="<script type='text/javascript'>
										alert(' please Select a page !');
									</script>";
					}
				}
				if ($error == 1) 
				{
					$uploadok=1;
	            $check=getimagesize($_FILES["homeWedoImg"]["tmp_name"]);
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
	            if ($_FILES["homeWedoImg"]["size"] > 10000000 and $uploadok == 1)
	            {
	               $message="<script type='text/javascript'>
	                           alert('Sorry file to be large .please select onether file!');
	                        </script>"; 
	               $uploadok=0;
	            }
	            if ($file_type != "jpg" and $file_type=="png" and $file_type =! "jpeg" and $uploadok == 1) 
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
	            else
	            {
						$upload=move_uploaded_file($_FILES["homeWedoImg"]["tmp_name"], $target_dir .$rand.".".$file_type ); 
						if ($upload == TRUE) 
						{
							$valueFiles=array($rand.".".$file_type,$file_type);
							$objdb->insert_mul_srvc($valueFiles,$fieldSrv,$valueSrv);
							if ($upload == TRUE and $objdb == TRUE) 
							{
								$message = "<script type='text/javascript'>
										alert('Adding succesfull');
										window.location.replace('/tabHome.php');
									</script>";
							}	
							else	
							{
								$message = "<script type='text/javascript'>
										alert('Adding failed! please try again.');
									</script>";
							}
						}
						else
						{
							$message= "<script type='text/javascript'>
								alert('Upload failed try again later!');
							</script>";
						}
					}
				}
				else
				{
					$message= "<script type='text/javascript'>
							alert('Adding failed try again later!');
						</script>";
				}
			}
		}
		else
		{
			$message ="<script type='text/javascript'>
								alert(' please enter full information!');
							</script>";
		}
	}	
	if (isset($_POST['btnCancel'])) 
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
	<title>PSYBO Technologies Home</title>
</head>
<body>
	<?php include 'dash.php'; ?>
	<section class="add-service">
		<form action="" method="POST" id="secondServiceForm" enctype="multipart/form-data">
			<div class="service">
				<h3>Add We do Item</h3>
				<div class="group">
					<label for="mainHead">Haedding</label><br>
					<input id="mainHead" type="text" name="homeWedo">
				</div>
				<div class="group">
					<label for="wedoLink">Link</label><br>
					<select class="selection" id="wedoLink" name="wedoLink" >
						<!-- <option value="" placeholder="select"></option> -->
						<option value="portfolio.php">Portfolio</option>
						<option value="service.php">Service</option>
						<option value="team.php">Team</option>
						<option value="about.php">About</option>
						<option value="contact.php">Contact</option>
					</select>
				</div>
				<div class="group">
					<label for="mainDescription">Description</label><br>
					<textarea name="homeWedoDescription" id="mainDescription" cols="30" rows="5"></textarea>
				</div>
				<div class="group bottom-0">
					<label for="uploadWedo">Select Image</label>
					<input type="file" id="uploadWedo" name="homeWedoImg">
				</div>
			</div>
			<div class="group pad-left width-100">
				<button id="btnAdd" name="btnAdd">Add</button>
				<button id="btnCancel" name="btnCancel">Cancel</button>
			</div>
		</form>
	</section>
	<?php echo $message; ?>
</body>
</html>
