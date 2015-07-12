<?php 
	include 'Database.php';
	$objdb=new Database("localhost","root","asd","psybo-db");
	$num_ptf=$objdb->num_row_ptf();
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

<?php include 'dash.php';  ?>
 	<section>
		<form id="formTeam" name="formTeam" method="POST" action="" enctype="multipart/form-data">	
			<div id="tabTeam" class="tab-team">
			<h3>ADD TEAM MEMBERS</h3>
				<div class="div-align-team">
					<label>Name</label><br>
					<input name="txtName" type="name" ><br>
				</div>
				<div class="div-align-team">
					<label>Designation</label><br>
					<input name="txtDesignation" type="text" ><br>
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
					<!-- <input name="uploadTeam" type="file" > -->
				</div>
				<button name="btnTeamSubmit" class="submit">Submit</button>
				<button name="btnReset" class="reset">Reset</button>
			</div>
		</form>
	</section>
 </body>
 </html>

<?php 
  	$name="";
	$name=filter_var($_POST['txtName'],FILTER_SANITIZE_ENCODED);
	$name=str_replace("%20", " ", $name);
	$name=strip_tags($_POST['txtName']);
	// $name=preg_replace('/[^A-Za-z0-9\s.', '', $name);
	// $designation=
	$designation=strip_tags($_POST['txtDesignation']);
	preg_replace('/[^A-Za-z0-9\s.', '', $designation);
	// $designation=filter_var($_POST['txtDesignation'],FILTER_SANITIZE_ENCODED);
	// $designation=str_replace("%20", " ", $designation);
	if (isset($_POST['btnTeamSubmit'])) 
	{
		$rand=rand();
		$target_dir=getcwd()."/upload-image/";
		// var_dump("Target dir :  ".$target_dir);
		$target_file=$target_dir ;
		// var_dump("Target file  : ".$target_file);
		$file_name=basename($_FILES["uploadTeam"]["name"]);
		$file_type=pathinfo(basename($_FILES["uploadTeam"]["name"]),PATHINFO_EXTENSION);
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
				filter_var($_POST['txtLinkedin'] , FILTER_SANITIZE_URL );
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
			$check=getimagesize($_FILES["uploadTeam"]["tmp_name"]);
			// var_dump($check);
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
			}
			if ($_FILES["uploadTeam"]["size"] > 30000000)
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
				$upload=move_uploaded_file($_FILES["uploadTeam"]["tmp_name"], $target_file .$rand.".".$file_type ); 
				if ($upload == TRUE) 
				{
					$values_emp_file=array($rand.".".$file_type,$file_type);
					$objdb->insert_mul_emp($values_emp,$values_emp_file,$fields_emp_add,$values_emp_add);
					echo "<script type='text/javascript'>
						alert('Adding sucesfull!');
					</script>";
					header("location:tabTeam.php");
				}
				else
					echo "<script type='text/javascript'>
						alert('Upload filed try again later!');
					</script>";	
			}
		}
		else
		{
			echo "<script type='text/javascript'>
					alert('Please enter name and designation!');
				</script>";	
		}	
?>
