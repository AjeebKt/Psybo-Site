<?php 
	error_reporting(0);
	include 'Database.php';
	// $objdb=new Database("psybotechnologies.com","psyboysg_test","psybotest","psyboysg_psybo-db");
    $objdb= new Database ('localhost','root','asd','psybo-db');
	$num_ptf=$objdb->num_row_ptf();
	$count_ptf=count($num_ptf);
	$actdir="/upload-image/";
	
	if (isset($_POST['btnPortfolioSubmit']) ) 
	{	
		$title=$_POST['txtTitle'];
		$description=$_POST['portfolioDescription'];

		$rand=rand();
		$target_dir=getcwd()."/upload-image/";
		$file_name=basename($_FILES["uploadPortfolio"]["name"]);
		$file_type=pathinfo(basename($_FILES["uploadPortfolio"]["name"]),PATHINFO_EXTENSION);

		$fields_ptf=array();
		$values_ptf=array();
		$values_ptf_file=array($file_name,$file_type);

		if ( !empty($title) and isset($_FILES['uploadPortfolio']['tmp_name']) ) 
		{
			// var_dump($title);
			if (preg_match('/^[A-Za-z0-9., _&-]*$/', $title))
			{
				$error=1;
				$values_ptf=array($title);
				$fields_ptf=array("name");	
			}
			else
			{
				$error=0;
				$message="<script type='text/javascript'>
							alert(' please enter Correct title!');
						</script>";
			}
			
			if (!empty($description) and $error == 1) 
			{
				// if(strpos($description,'%') == FALSE)# or strpos($title,'%') !== FALSE)
				if (preg_match('/^[A-Za-z0-9., _-]*$/', $description))
				{
					$error = 1;
					array_push($values_ptf, $description);
					array_push($fields_ptf, "about");
				}
				else
				{
					$error=0;
					$message= "<script type='text/javascript'>
							alert(' please enter Correct description!');
						</script>";
				}
			}
			
		
			if (!empty($_POST['txtLink']) and $error = 1) 
			{

				$preg = "/^(http(s?):\/\/)?(www\.)+[a-zA-Z0-9\.\-\_]+(\.[a-zA-Z]{2,3})+(\/[a-zA-Z0-9\_\-\s\.\/\?\%\#\&\=]*)?$/";
				if (preg_match($preg, $_POST['txtLink']) != FALSE ) 
				{
					$valid_url=$_POST['txtLink'];
					if (filter_var($valid_url , FILTER_VALIDATE_URL))
					{ 
						array_push($values_ptf, $valid_url );
						array_push($fields_ptf, "link");
					}
					else
					{
						$link="https://".$valid_url;
						array_push($values_ptf, $link);
						array_push($fields_ptf, "link");
					}
				}
				
				else
				{
					$error = 0;
					$message= "<script type='text/javascript'>
						alert('The link has not valid .Please Enter the correct link.!');
					</script>";	
				}
			}	
				//uplaod file 
			$check=getimagesize($_FILES["uploadPortfolio"]["tmp_name"]);
			if ($check !== FALSE) 
			{
				// echo "File is an image :" .$check["mime"].".";
				$uploadok=1;
			}
			else
			{
				$message= "<script type='text/javascript'>
						alert('Please select onether image!');
					</script>";	
				$uploadok=0;
			}
			if ($_FILES["uploadPortfolio"]["size"] > 30000000 and $uploadok == 1)
			{
				$message="<script type='text/javascript'>
						alert('Sorry file to be large .please select onether file!');
					</script>";	
				$uploadok=0;
			}
			if ($file_type != "jpg" and $file_type=="png" and $file_type =! "jpeg" and $uploadok == 1)  
			{
				$mesage ="<script type='text/javascript'>
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
				$upload=move_uploaded_file($_FILES["uploadPortfolio"]["tmp_name"], $target_dir .$rand.".".$file_type ); 
				if ($upload == TRUE) 
				{
					$values_ptf_files=array($rand.".".$file_type,$file_type);
					// var_dump($values_ptf);

					$objdb->insert_mul_ptf($values_ptf_files,$fields_ptf,$values_ptf);
					if ($upload == TRUE and $objdb == TRUE) 
					{
						$message = "<script type='text/javascript'>
								alert('Adding succesfull');
								window.location.replace('tabPortfolio.php');
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Portfolio</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/admin-style.css">
</head>
<body>
	<?php include 'dash.php'; ?>
	<section class="add-service">
		<form id="formPortfolio" name="formPortfolio" method="POST" action="" enctype="multipart/form-data">
			<div id="tabPortfolio" class="first-content">
				<h3>ADD PORTFLIOS</h3>
				<div class="group">
					<label>Title</label><br>
					<input name="txtTitle" type="text" required>
				</div>
				<div class="group">
					<label>Link</label><br>
					<input name="txtLink" type="text" >
				</div>
				<div class="group left">
					<label>Description</label><br>
					<textarea name="portfolioDescription" id="portfolioDescription" cols="30" rows="5" optional></textarea><br>
				</div>
				<div class="group">
					<label>Select Portfolio Image</label><br>
					<input name="uploadPortfolio" type="file" class="up" required= "required"><br>
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
