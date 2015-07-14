<?php 
	include 'Database.php' ;
	$objdb=new Database("localhost","root","asd","psybo-db");
	$ptf_id=$_GET['edit_id'];
	$ptf_id=(int)$ptf_id;
	// echo $ptf_id;
	$fields=array();
	// var_dump($fields);
	$where=array("id",$ptf_id);
	// var_dump($where);
	$result=$objdb->select("portfolio",$fields,$where);
	error_reporting(E_ALL);
	// ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>edit Portfolio</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/css.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php //include 'dash.php';?>
	<section>
	<div class="edit-form">
	</div>
		<form id="formPortfolio" name="formPortfolio" method="POST" action="" enctype="multipart/form-data">
			<div id="tabPortfolio" class="tab-portfolio">
			<h3>EDIT PORTFLIO</h3>
				<div class="div-align">
					<label for="txtTitle">Title</label><br>
					<input id="txtTitle" name="txtTitle" type="text" <?php foreach ($result[0] as $key => $value) {
					if (is_string($key) and $key == 'name') {
							echo "value=\"".$value."\"";
						}	
					}?> required>
				</div>
				<div class="div-align">
					<label for="txtLink">Link</label><br>
					<input id="txtLink" name="txtLink" type="text" <?php foreach ($result[0] as $key => $value) {
					if (is_string($key) and $key == 'link') {
							echo "value=\"".$value."\"";
						}	
					}?> required>
				</div>
				<div class="div-align left">
					<label for="portfolioDescription">Description</label><br>
					<textarea name="portfolioDescription" optional id="portfolioDescription" cols="40" rows="2"><?php foreach ($result[0] as $key => $value) {
					if (is_string($key) and $key == 'about') {
							echo $value;	
						}	
					}?></textarea><br>
				</div>
				<div class="div-align">
					<label for="uploadPortfolio">Portfolio Image</label><br>
					<input id="uploadPortfolio" name="uploadPortfolio" type="file" class="up" ><br>
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


	foreach ($result[0] as $key => $value) 
	{
		if (is_string($key) and $key='files_id') 
		{
			$files_id=$value;
		}
	}
	$files_id=(int)$files_id;

	if (isset($_POST["btnPortfolioSubmit"])) 
	{
		$title=$_POST['txtTitle'];
		// $title=filter_var($title,FILTER_SANITIZE_STRING);
		// $title=str_replace("%20", " ", $title);
		// $title=strip_tags($title);
		$description=$_POST['portfolioDescription'];
		// $description=filter_var($description,FILTER_SANITIZE_STRING);
		// $description=strip_tags($description);

		$rand=rand();

		$target_dir=getcwd()."/upload-image/";
		$target_dir=$target_dir ;
		$file_name=basename($_FILES["uploadPortfolio"]["name"]);
		$file_type=pathinfo(basename($_FILES["uploadPortfolio"]["name"]),PATHINFO_EXTENSION);
		$fields_ptf=array();
		$values_ptf=array();

		$fields_ptf_Add=array();
		$values_ptf_Add=array();

		$values_ptf_file=array($file_name,$file_type);


		if( !empty($title) and (strpos($title, '%') == FALSE) )
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
				// if (strpos($description, '%') == FALSE) 
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

			if (!empty($_POST['txtLink']) ) 
			{
				$preg = "/^(http(s?):\/\/)?(www\.)+[a-zA-Z0-9\.\-\_]+(\.[a-zA-Z]{2,3})+(\/[a-zA-Z0-9\_\-\s\.\/\?\%\#\&\=]*)?$/";
				if (preg_match($preg, $_POST['txtLink']) != FALSE ) 
				{
					$valid_url=$_POST['txtLink'];
					if (filter_var($valid_url , FILTER_VALIDATE_URL)) 
					{
						array_push($values_ptf_add, $_POST['txtLink'] );
						array_push($fields_ptf_Add, "link");
					}
					else
					{
						$link = "https://".$valid_url;
						array_push($values_ptf_Add, $_POST['txtLink'] );
						array_push($fields_ptf_Add, "link");
					}
				}
			}
			else
			{
				echo "<script type='text/javascript'>
						alert('The link has not valid .Please Enter the correct link.!');
					</script>";	
				exit();
			}
			// if( filter_var($_POST['portfolioDescription'] , FILTER_SANITIZE_ENCODED) ) 
			// {
			// 	array_push($values_ptf, $_POST['portfolioDescription']);
			// array_push($fields_ptf, "about");
		}
		else
		{
			echo "<script type='text/javascript'>
						alert('Update failed !');
					</script>";
			exit();
		}


		// //upload image
		if (!empty($file_name) )
		{
			// echo "string";
			$check=getimagesize($_FILES["uploadPortfolio"]["tmp_name"]);
			if ($check !== FALSE) 
			{
				// echo "File is an image :" .$check["mime"].".";
				$uploadok=1;
			}
			else
			{
				echo "<script type='text/javascript'>
						alert('Please select a image!');
					</script>";
				$uploadok=0;
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
						alert('Please select jpg or png or jpeg files!');
					</script>";
				$uploadok=0;
			}
			if ($uploadok == 0) 
				echo "<script type='text/javascript'>
						alert('Canot upload photo at this time .please try again later !');
					</script>";
			else 
			{
				$upload=move_uploaded_file($_FILES["uploadPortfolio"]["tmp_name"], $target_dir .$rand.".".$file_type ); 
				if ($upload == TRUE) 
				{
					echo "success uploading";
					$values=array($rand.".".$file_type,$file_type);
					$fields=array("file_name","type");
					$where=array("id",$files_id);
					$objdb->update("files",$fields , $values , $where);
				}
				else
					"<script type='text/javascript'>
						alert('Canot upload photo at this time .please try again later !');
					</script>";
			}
		}
		// echo $values_ptf;
		// var_dump($fields_ptf);	
		// var_dump($values_ptf);
		
		$objdb->update("portfolio" , $fields_ptf,$values_ptf,array("id" , $ptf_id) );
		if ($objdb == TRUE) 
		{
			echo "<script type='text/javascript'>
				alert('Update succesfull');
				window.location.replace('tabPortfolio.php');
			</script>";	
			// header("location:tabPortfolio.php");
		}
	}
?>