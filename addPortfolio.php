<?php 
	
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
					<input name="txtLink" type="text" required>
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
				<button name="btnReset" class="reset">Reset</button>
			</div>
		</form>
	</section>
</body>
</html>

<?php 
	$name="";
	$name=filter_var($_POST['txtTitle'],FILTER_SANITIZE_ENCODED);
	if (isset($_POST['btnPortfolioSubmit'])) 
	{
		
		$rand=rand();

		$target_dir=getcwd()."/upload-image/";
		// var_dump("Target dir :  ".$target_dir);
		$target_file=$target_dir ;
		// var_dump("Target file  : ".$target_file);
		$file_name=basename($_FILES["uploadPortfolio"]["name"]);
		$file_type=pathinfo(basename($_FILES["uploadPortfolio"]["name"]),PATHINFO_EXTENSION);
		// var_dump("image file type  :   ".$file_type);


		if ( $name and $designation ) 
		{
			$values_emp=array($designation);
			$values_emp_file=array($file_name,$file_type);
			$values_emp_add=array();
			$fields_emp_add=array();
			if( isset($name))
			{
				$values_emp_add=array($name);
				$fields_emp_add=array("name");
			}

			if (filter_var($_POST['txtLinkedin'] , FILTER_VALIDATE_URL)) 
			{
				filter_var($Linkedin , FILTER_SANITIZE_URL );
				array_push($values_emp_add, $_POST['txtLinkedin'] );
				array_push($fields_emp_add, "linkedin");
			}
			
			else
			{
				$linkedin="https://".$_POST['txtLinkedin'];
				if(filter_var($linkedin,FILTER_VALIDATE_URL))
				{
					filter_var($linkedin , FILTER_SANITIZE_URL );
					array_push($values_emp_add, $linkedin);
					array_push($fields_emp_add, "linkedin");
				}
			}

			if( filter_var($_POST['txtFacebook'] , FILTER_VALIDATE_URL) ) 
			{
				filter_var($_POST['txtFacebook'] , FILTER_SANITIZE_URL );
				array_push($values_emp_add, $_POST['txtFacebook']);
				array_push($fields_emp_add, "fb");
			}
			else
			{
				$facebook="https://".$_POST['txtFacebook'];
				if (filter_var($facebook,FILTER_VALIDATE_URL)) 
				{
					filter_var($facebook , FILTER_SANITIZE_URL );
					array_push($values_emp_add, $facebook);
					array_push($fields_emp_add, "fb");

				}
			}

			if( filter_var($_POST['txtTwitter'] , FILTER_VALIDATE_URL) ) 
			{
				filter_var($_POST['txtTwitter'] , FILTER_SANITIZE_URL );
				array_push($values_emp_add, $_POST['txtTwitter']);
				array_push($fields_emp_add, "twiter");
			}
			else
			{
				$twitter="https://".$_POST['txtTwitter'];
				if (filter_var($twitter,FILTER_VALIDATE_URL)) 
				{
					filter_var($twitter , FILTER_SANITIZE_URL );
					array_push($values_emp_add, $twitter);
					array_push($fields_emp_add, "twiter");
				}
			}

			if( filter_var($_POST['txtGplus'] , FILTER_VALIDATE_URL) ) 
			{
				filter_var($_POST['txtGplus'] , FILTER_SANITIZE_URL );
				array_push($values_emp_add, $_POST['txtGplus']);
				array_push($fields_emp_add, "google_plus");
			}
			else
			{
				$gplus="https://".$_POST['txtGplus'];
				if (filter_var($gplus,FILTER_VALIDATE_URL)) 
				{
					filter_var($_POST['txtGplus'] , FILTER_SANITIZE_URL );
					array_push($values_emp_add, $gplus);
					array_push($fields_emp_add, "google_plus");
				}
			}
			// var_dump($values_emp_add);
			// var_dump($fields_emp_add);	
			// $values_emp_add=array($_POST['txtName'],$_POST['txtLinkedin'],$_POST['txtFacebook'],$_POST['txtTwitter'],$_POST['txtGplus']);

		
		
			
			$check=getimagesize($_FILES["uploadPortfolio"]["tmp_name"]);
			// var_dump($check);
			if ($check !== FALSE) 
			{
				// echo "File is an image :" .$check["mime"].".";
				$uploadok=1;
			}
			else
			{
				echo "File is not an image";
			}
			if ($_FILES["uploadPortfolio"]["size"] > 30000000)
			{
				echo("sorry files is to large<br>");	
				$uploadok=0;
			}
			if ($file_type != "jpg" and $file_type=="png" and $file_type =! "jpeg") 
			{
				echo "Only jp,jpeg,img files are allowed <br>";
				$uploadok=0;
			}
			if ($uploadok == 0) 
				echo "sorry your file was not upload<br>";
			else 
			{
				$upload=move_uploaded_file($_FILES["uploadPortfolio"]["tmp_name"], $target_file .$rand.".".$file_type ); 
				if ($upload == TRUE) 
				{
					$values_emp_file=array($rand.".".$file_type,$file_type);
					$objdb->insert_mul_emp($values_emp,$values_emp_file,$fields_emp_add,$values_emp_add);
				}
				else
					echo "Error in upload image";
			}
		}
		else
			echo ("Please enter atleast name and designation");
	}
?>	