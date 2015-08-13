<?php 
error_reporting(1);
include_once 'Database.php';
$objdb = new Database('localhost' , 'root' , 'asd' , 'psybo-db');
if (isset($_POST['btnAdd']) )
{
	$heading = $_POST['serviceItem'];	
	$description = $_POST['serviceDescription'];

	$rand=rand();
	$target_dir=getcwd()."/upload-image/";
	$file_name=basename($_FILES["serviceImg"]["name"]);
	$file_type=pathinfo(basename($_FILES["serviceImg"]["name"]),PATHINFO_EXTENSION);

	$fieldSrv = array('name');
	$valueSrv = array('service');
	$fieldFiles = array($file_name, $file_type);

	if (!empty($heading) and !empty($description) and !empty($file_name) )
	{
		if (preg_match('/^[A-Za-z0-9., \'_-]*$/',$heading) )
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
			if (preg_match('/^[A-Za-z0-9., \'?()"_-]*$/',$description) )
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
			if ($error == 1) 
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
					$upload=move_uploaded_file($_FILES["serviceImg"]["tmp_name"], $target_dir .$rand.".".$file_type ); 
					if ($upload == TRUE) 
					{
						$valueFiles=array($rand.".".$file_type,$file_type);
						$objdb->insert_mul_srvc($valueFiles,$fieldSrv,$valueSrv);
						
						if ($upload == TRUE and $objdb == TRUE) 
						{
							$message = "<script type='text/javascript'>
									alert('Adding succesfull');
									window.location.replace('/tabService.php');
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
	<title>Add Service</title>
</head>
<body>
	<?php include 'dash.php'; ?>
	<section class="add-service">
		<form action="" method="POST" id="secondServiceForm" name="secondServiceForm" enctype="multipart/form-data">
			<div class="service">
				<h3>Add Service</h3>
				<div class="group">
					<label for="serviceItem">Service</label><br>
					<input id="serviceItem" name="serviceItem" type="text">
				</div>
				<div class="group">
					<label for="serviceDescription">Description</label><br>
					<textarea name="serviceDescription" id="serviceDescription" cols="30" rows="10"></textarea>
					<input type="file" id="serviceImg" name="serviceImg">
				</div>
				<button name="btnAdd" >Add</button>
				<button name="btnCancel">Cancel</button>
			</div>
		</form>
	</section>
	<?php echo $message; ?>
</body>
</html>
