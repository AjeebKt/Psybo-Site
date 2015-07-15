<?php 
	// error_reporting(0);
	include 'Database.php';
	$objdb=new Database("localhost","root","asd","psybo-db");
	$num_ptf=$objdb->num_row_ptf();
	// var_dump($num_ptf);
	$count_ptf=count($num_ptf);
	$actdir="/upload-image/";
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Portfolio</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/css.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php include 'dash.php'; ?>
	<section>
		<form id="formPortfolio" name="formPortfolio" method="POST" action="" enctype="multipart/form-data">
			<div id="tabPortfolio" class="tab-portfolio">
			<h3>ADD PORTFLIOS</h3>
				<div class="div-align">
					<label>Title</label><br>
					<input name="txtTitle" type="text" required>
				</div>
				<div class="div-align">
					<label>Link</label><br>
					<input name="txtLink" type="text" >
				</div>
				<div class="div-align left">
					<label>Description</label><br>
					<textarea name="portfolioDescription" id="portfolioDescription" cols="40" rows="2" optional></textarea><br>
				</div>
				<div class="div-align">
					<label>Portfolio Image</label><br>
					<input name="uploadPortfolio" type="file" class="up" required= "required"><br>
				</div>
				<button class="submit" name="btnPortfolioSubmit">Submit</button>
			</div>
		</form>
		<form action="tabPortfolio.php" method="POST">
			<button name="btnReset" class="reset">Cancel</button>
		</form>
	</section>
</body>
</html>

<?php 
	
	
	if (isset($_POST['btnPortfolioSubmit']) ) 
	{	
		$title=$_POST['txtTitle'];
		// $title=filter_var($title,FILTER_SANITIZE_ENCODED);
		// $title=str_replace("%20", " ", $title);
		// $title=strip_tags($title);

		$description=$_POST['portfolioDescription'];
		// $description=filter_var($_POST['portfolioDescription'],FILTER_SANITIZE_ENCODED);
		// $discription=strip_tags($description)	;
		// $description=str_replace("%20", " ", $description);
		

		$rand=rand();

		$target_dir=getcwd()."/upload-image/";
		// var_dump("Target dir :  ".$target_dir);
		$file_name=basename($_FILES["uploadPortfolio"]["name"]);
		$file_type=pathinfo(basename($_FILES["uploadPortfolio"]["name"]),PATHINFO_EXTENSION);
		// var_dump("image file type  :   ".$file_type);

		$fields_ptf=array();
		$values_ptf=array();
		$values_ptf_file=array($file_name,$file_type);

		if ( !empty($title) and isset($_FILES['uploadPortfolio']['tmp_name']) ) 
		{
			if (preg_match('/^[A-Za-z0-9., _-]*$/', $title))
			{
				$values_ptf=array($title);
				$fields_ptf=array("name");	
			}
			else
			{
				echo "<script type='text/javascript'>
							alert(' please enter Correct title!');
						</script>";
				exit();
			}
			
			if (!empty($description)) 
			{
				// if(strpos($description,'%') == FALSE)# or strpos($title,'%') !== FALSE)
				if (preg_match('/^[A-Za-z0-9., _-]*$/', $description))
				{
					array_push($values_ptf, $description);
					array_push($fields_ptf, "about");
				}
				else
				{
					echo "<script type='text/javascript'>
							alert(' please enter Correct description!');
						</script>";
					exit();
				}
			}
			
		
			if (!empty($_POST['txtLink'])) 
			{

				$preg = "/^(http(s?):\/\/)?(www\.)+[a-zA-Z0-9\.\-\_]+(\.[a-zA-Z]{2,3})+(\/[a-zA-Z0-9\_\-\s\.\/\?\%\#\&\=]*)?$/";
				if (preg_match($preg, $_POST['txtLink']) != FALSE ) 
				{
					// filter_var($_POST['txtLink'] , FILTER_SANITIZE_URL );
					
					$valid_url=$_POST['txtLink'];
					if (filter_var($valid_url , FILTER_VALIDATE_URL))
					{ 
						array_push($values_ptf, $valid_url );
						array_push($fields_ptf, "link");
					}
					else
					{
						$link="https://".$valid_url;
						// filter_var($link , FILTER_SANITIZE_URL );
						array_push($values_ptf, $link);
						array_push($fields_ptf, "link");
					
					}

				}
				
				else
				{
					echo "<script type='text/javascript'>
						alert('The link has not valid .Please Enter the correct link.!');
					</script>";	
					exit();

					// $link="https://".$validated_url;
					// if(filter_var($link,FILTER_VALIDATE_URL))
					// {
					// 	filter_var($link , FILTER_SANITIZE_URL );
					// 	array_push($values_ptf, $link);
					// 	array_push($fields_ptf, "link");
					// }
				}
			}	
			// if( filter_var($_POST['portfolioDescription'] , FILTER_SANITIZE_ENCODED) ) 
			// if (!empty($description))
			// {
			// 	// array_push($values_ptf, $_POST['portfolioDescription']);
			// 	array_push($values_ptf, $description);
			// 	array_push($fields_ptf, "about");
			// }

			//uplaod file 
			$check=getimagesize($_FILES["uploadPortfolio"]["tmp_name"]);
			if ($check !== FALSE) 
			{
				// echo "File is an image :" .$check["mime"].".";
				$uploadok=1;
			}
			else
			{
				echo "<script type='text/javascript'>
						alert('Please select onether image!');
					</script>";	
				exit();
			}
			if ($_FILES["uploadPortfolio"]["size"] > 30000000)
			{
				echo "<script type='text/javascript'>
						alert('Sorry file to be large .please select onether file!');
					</script>";	
				$uploadok=0;
			}
			if ($file_type != "jpg" and $file_type=="png" and $file_type =! "jpeg") 
			{
				echo "<script type='text/javascript'>
						alert('PLease select jpg or png or jpeg file!');
					</script>";
				$uploadok=0;
			}
			if ($uploadok == 0) 
			{
				echo "<script type='text/javascript'>
						alert('Upload failed try again later!');
					</script>";			
			}
			else 
			{
				$upload=move_uploaded_file($_FILES["uploadPortfolio"]["tmp_name"], $target_dir .$rand.".".$file_type ); 
				if ($upload == TRUE) 
				{
					// var_dump($values_ptf);
					// var_dump($fields_ptf);	
					$values_ptf_files=array($rand.".".$file_type,$file_type);
					// var_dump($fields_ptf);
					$objdb->insert_mul_ptf($values_ptf_files,$fields_ptf,$values_ptf);
					// header("location:tabPortfolio.php");
					if ($upload == TRUE and $objdb == TRUE) 
					{
						echo "<script type='text/javascript'>
								alert('Adding succesfull');
								window.location.replace('tabPortfolio.php');
							</script>";
					}			
					
				}
				else
				{
					echo "<script type='text/javascript'>
						alert('Upload failed try again later!');
					</script>";
				}
			}
		}
		else
		{
			echo "<script type='text/javascript'>
					alert('Adding failed try again later!');
				</script>";
		}
		// if ($upload == TRUE and $objdb == TRUE) 
		// {
		// 	echo "<script type='text/javascript'>
		// 					alert('Adding succesfull');
		// 					window.location.replace('tabPortfolio.php');
		// 				</script>";
		// }
	}

?>	