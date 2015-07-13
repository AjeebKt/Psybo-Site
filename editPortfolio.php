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
	// error_reporting(E_ALL);
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
	<?php include 'dash.php';?>
	<section>
	<div class="edit-form">
	</div>
		<form id="formPortfolio" name="formPortfolio" method="POST" action="" enctype="multipart/form-data">
			<div id="tabPortfolio" class="tab-portfolio">
			<h3>EDIT PORTFLIO</h3>
				<div class="div-align">
					<label for="txtTitle">Title</label><br>
					<input id="txtTitle"> name="txtTitle" type="text" <?php foreach ($result[0] as $key => $value) {
					if (is_string($key) and $key == 'name') {
							echo "value=\"".$value."\"";
						}	
					}?> required>
				</div>
				<div class="div-align">
					<label for="txtLink">Link</label><br>
					<input id="txtLink"> name="txtLink" type="text" <?php foreach ($result[0] as $key => $value) {
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
					<input id="uploadPortfolio"> name="uploadPortfolio" type="file" class="up" ><br>
				</div>
				<button class="submit" name="btnPortfolioSubmit">Submit</button>
				<button name="btnReset" class="reset">Reset</button>
			</div>
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

	$title="";
	$title=filter_var($_POST['txtTitle'],FILTER_SANITIZE_ENCODED);
	$title=str_replace("%20", " ", $title);
	if (isset($_POST["btnPortfolioSubmit"])) 
	{
		$rand=rand();
		$target_dir=getcwd()."/upload-image/";
		var_dump("Target dir :  ".$target_dir);
		$target_file=$target_dir ;
		var_dump("Target file  : ".$target_file);
		$file_name=basename($_FILES["uploadPortfolio"]["name"]);
		$file_type=pathinfo(basename($_FILES["uploadPortfolio"]["name"]),PATHINFO_EXTENSION);
		var_dump("image file type  :   ".$file_type);
		$fields_ptf=array();
		$values_ptf=array();
		$values_ptf_file=array($file_name,$file_type);
		if( isset($title))
		{
			$values_ptf=array($title);
			$fields_ptf=array("name");
		}

		if (filter_var($_POST['txtLink'] , FILTER_VALIDATE_URL)) 
		{
			filter_var($_POST['txtLink'] , FILTER_SANITIZE_URL );
			array_push($values_ptf, $_POST['txtLink'] );
			array_push($fields_ptf, "link");
		}
		else
		{
			$link="https://".$_POST['txtLink'];
			if(filter_var($link,FILTER_VALIDATE_URL))
			{
				filter_var($link , FILTER_SANITIZE_URL );
				array_push($values_ptf, $link);
				array_push($fields_ptf, "link");
			}
		}
		if( filter_var($_POST['portfolioDescription'] , FILTER_SANITIZE_ENCODED) ) 
		{
			array_push($values_ptf, $_POST['portfolioDescription']);
			array_push($fields_ptf, "about");
		}
		//upload image
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
				$upload=move_uploaded_file($_FILES["uploadPortfolio"]["tmp_name"], $target_file .$rand.".".$file_type ); 
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
		// var_dump($values_ptf);
		// var_dump($fields_ptf);	
		
		// var_dump($fields_ptf);
		$objdb->update("portfolio" , $fields_ptf,$values_ptf,array("id" , $ptf_id) );
		if ($objdb == TRUE) 
			header("location:tabPortfolio.php");
		// var_dump($values_files);
		// var_dump($files_id);
		// $objdb->update_mul_ptf($values_files,$files_id,$fields_ptf,$values_ptf,$ptf_id);
	}
?>