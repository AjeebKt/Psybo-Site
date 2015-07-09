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
 	<title>Add team member</title>
 	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/css.css">
	<link rel="stylesheet" href="css/style.css">
 </head>
 <body>
 	<?php include 'dash.php'; ?>
 	<section>
		<form id="formTeam" name="formTeam" method="POST" action="" enctype="multipart/form-data">	
			<div id="tabTeam" class="tab-team">
			<h3>ADD TEAM MEMBERS</h3>
				<div class="div-align-team">
					<label>Name</label><br>
					<input name="txtName" type="name" required><br>
				</div>
				<div class="div-align-team">
					<label>Designation</label><br>
					<input name="txtDesignation" type="text" required><br>
				</div>
				<div class="div-align-team">
					<label>Facebook</label><br>
					<input name="txtFacebook" type="text" optional><br>
				</div>					
				<div class="div-align-team">
					<label>Twitter</label><br>
					<input name="txtTwitter" type="text" optional><br>
				</div>
				<div class="div-align-team">
					<label>LinkedIn</label><br>
					<input name="txtLinkedin" type="text" optional><br>
				</div>
				<div class="div-align-team">
					<label>Google+</label><br>
					<input name="txtGplus" type="text" optional><br>
				</div>
				<div class="div-align-team">
					<label>Employee Image  (Image Must be in W:260px X H:320px)</label><br>
					<input name="uploadTeam" type="file" required= "required"><br>
				</div>
				<button name="btnTeamSubmit" class="submit">Submit</button>
				<button name="btnReset" class="reset">Reset</button>
			</div>
		</form>
	</section>
 </body>
 </html>

<?php 
	$name=filter_var($_POST['txtName'],FILTER_SANITIZE_SPECIAL_CHARS);
	$designation=filter_var($_POST['txtDesignation'],FILTER_SANITIZE_SPECIAL_CHARS);
	if (isset($_POST['btnTeamSubmit'])) 
	{
		if ( $name and $designation ) 
		{
			// echo "succes";
			$target_dir=getcwd()."/upload-image/";
			// var_dump("Target dir :  ".$target_dir);
			$target_file=$target_dir . basename($_FILES["uploadTeam"]["name"]);
			// var_dump("Target file  : ".$target_file);
			$file_name=basename($_FILES["uploadTeam"]["name"]);
			$file_type=pathinfo($target_file,PATHINFO_EXTENSION);
			// var_dump("image file type  :   ".$file_type);

			$check=getimagesize($_FILES["uploadTeam"]["tmp_name"]);
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
			if ($_FILES["uploadTeam"]["size"] > 30000000)
			{
				echo("sorry files is to large<br>");	
				$uploadok=0;
			}
			// echo "string";
			// echo "is an image ".$check["mime"].".";
			if (file_exists($target_file)) 
			{
				echo "sorry file already exist .please select onother file<br>";
				$uploadok=0;
			}
			if ($file_type != "jpg" and $file_type=="png" and $file_type =! "jpeg") 
			{
				echo "Only jp,jpeg,img files are allowed <br>";
				$uploadok=0;
			}
			if ($uploadok == 0) 
			{
				echo "sorry your file was not upload<br>";
			}
			else 
			{
				$upload=move_uploaded_file($_FILES["uploadTeam"]["tmp_name"], $target_file); 
				if ($upload !== TRUE) 
				{
					echo "Error in upload image";
				}
			}
				// array("name","linkedin","fb","twiter","google_plus");

			$values_emp=array($_POST['txtDesignation']);
			$values_emp_file=array($file_name,$file_type);
			$values_emp_add=array($_POST['txtName'],$_POST['txtLinkedin'],$_POST['txtFacebook'],$_POST['txtTwitter'],$_POST['txtGplus']);
			// var_dump($values_emp_add);
			$objdb->insert_mul_emp($values_emp,$values_emp_file,$values_emp_add);
		}
		else
			return trigger_error("Please enter full details");
	}	
?>
