

<?php 
	include 'Database.php';
	$objdb=new Database("localhost","root","asd","psybo-db");
	$emp_id=(int)$_GET['editid'];
	$result_emp=$objdb->select("employee",array(),array("id",$emp_id));
	// var_dump($result_emp);
	foreach ($result_emp[0] as $key => $value) 
	{
		if (is_string($key) and $key == 'files_id') 
		$file_id=$value;
	}
	foreach ($result_emp[0] as $key => $value) 
	{
		if (is_string($key) and $key == 'address_id') 
		$add_id=$value;
	}
	$result_add=$objdb->select("address", array(),array("id",$add_id));
	// var_dump($result_add);
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Edit Team</title>
 	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/css.css">
	<link rel="stylesheet" href="css/style.css">
 </head>
 <body>
	<?php include 'dash.php';?>
 	<section>
		<form id="formTeam" name="formTeam" method="POST" action="" enctype="multipart/form-data">	
			<div id="tabTeam" class="tab-team">
			<h3>EDIT TEAM MEMBERS</h3>
				<div class="div-align-team">
					<label for="txtName">Name</label><br>
					<input id="txtName" name="txtName" <?php foreach ($result_add[0] as $key => $value) {
						if (is_string($key) and $key == 'name')
							echo "value=\"".$value."\"";
					} ?> ><br>
				</div>
				<div class="div-align-team">
					<label for="txtDesignation">Designation</label><br>
					<input id="txtDesignation" name="txtDesignation" <?php foreach ($result_emp[0] as $key => $value) {
						if (is_string($key) and $key == 'designation')
							echo "value=\"".$value."\"";
					} ?> ><br>
				</div>
				<div class="div-align-team">
					<label for="txtFacebook">Facebook</label><br>
					<input id="txtFacebook" name="txtFacebook" <?php foreach ($result_add[0] as $key => $value) {
						if (is_string($key) and $key == 'fb')
							echo "value=\"".$value."\"";
					} ?>><br>
				</div>					
				<div class="div-align-team">
					<label for="txtTwitter">Twitter</label><br>
					<input id="txtTwitter" name="txtTwitter" <?php foreach ($result_add[0] as $key => $value) {
						if (is_string($key) and $key == 'twiter')
							echo "value=\"".$value."\"";
					} ?> ><br>
				</div>
				<div class="div-align-team">
					<label for="txtLinkedin">LinkedIn</label><br>
					<input id="txtLinkedin" name="txtLinkedin" <?php foreach ($result_add[0] as $key => $value) {
						if (is_string($key) and $key == 'Linkedin')
							echo "value=\"".$value."\"";
					} ?> ><br>
				</div>
				<div class="div-align-team">
					<label for="txtGplus">Google+</label><br>
					<input id="txtGplus" name="txtGplus" <?php foreach ($result_add[0] as $key => $value) {
						if (is_string($key) and $key == 'google_plus')
							echo "value=\"".$value."\"";
					} ?>  ><br>
				</div>
				<div class="div-align-team">
					<label for="uploadTeam">Employee Image</label><br>
					<input id="uploadTeam" name="uploadTeam" type="file" ><br>
				</div>
				<button name="btnTeamSubmit" class="submit">Submit</button>
				<button name="btnReset" class="reset">Reset</button>
			</div>
		</form>
	</section>
	<section class="show-error style="
    background-color: 0f5;>
		
	</section>
 </body>
 </html>
 <?php 	
	if (isset($_POST['btnTeamSubmit'])) 
	{
		//upload file details
		$file_name=basename($_FILES["uploadTeam"]["name"]);
		$file_type=pathinfo(basename($_FILES["uploadTeam"]["name"]),PATHINFO_EXTENSION);
		$rand=rand();
		$target_dir=getcwd()."/upload-image/";
		$target_file=$target_dir ;
		$file_name=basename($_FILES["uploadTeam"]["name"]);
		$file_type=pathinfo(basename($_FILES["uploadTeam"]["name"]),PATHINFO_EXTENSION);

		$name=$_POST['txtName'];
		$name=strip_tags($_POST['txtName']);
		$name=preg_replace('/[^A-Za-z0-9\s.]/', '', $name);
		// echo $name;
		$designation=strip_tags($_POST['txtDesignation']);
		preg_replace('/[^A-Za-z0-9\s.]/', '', $designation);
		
		if( !empty($name) )
		{
			$values_add=array($name);
			$fields_add=array("name");
			// var_dump($values_add);
			// var_dump($fields_add);
		}

		if (filter_var($_POST['txtLinkedin'] , FILTER_VALIDATE_URL)) 
		{
			filter_var($_POST['txtLinkedin'] , FILTER_SANITIZE_URL );
			array_push($values_add, $_POST['txtLinkedin'] );
			array_push($fields_add, "linkedin");
		}
		
		else
		{
			$linkedin="https://".$_POST['txtLinkedin'];
			if(filter_var($linkedin,FILTER_VALIDATE_URL))
			{
				filter_var($linkedin , FILTER_SANITIZE_URL );
				array_push($values_add, $linkedin);
				array_push($fields_add, "linkedin");
			}
		}

		if( filter_var($_POST['txtFacebook'] , FILTER_VALIDATE_URL) ) 
		{
			filter_var($_POST['txtFacebook'] , FILTER_SANITIZE_URL );
			array_push($values_add, $_POST['txtFacebook']);
			array_push($fields_add, "fb");
		}
		else
		{
			$facebook="https://".$_POST['txtFacebook'];
			if (filter_var($facebook,FILTER_VALIDATE_URL)) 
			{
				filter_var($facebook , FILTER_SANITIZE_URL );
				array_push($values_add, $facebook);
				array_push($fields_add, "fb");

			}
		}

		if( filter_var($_POST['txtTwitter'] , FILTER_VALIDATE_URL) ) 
		{
			filter_var($_POST['txtTwitter'] , FILTER_SANITIZE_URL );
			array_push($values_add, $_POST['txtTwitter']);
			array_push($fields_add, "twiter");
		}
		else
		{
			$twitter="https://".$_POST['txtTwitter'];
			if (filter_var($twitter,FILTER_VALIDATE_URL)) 
			{
				filter_var($twitter , FILTER_SANITIZE_URL );
				array_push($values_add, $twitter);
				array_push($fields_add, "twiter");
			}
		}

		if( filter_var($_POST['txtGplus'] , FILTER_VALIDATE_URL) ) 
		{
			filter_var($_POST['txtGplus'] , FILTER_SANITIZE_URL );
			array_push($values_add, $_POST['txtGplus']);
			array_push($fields_add, "google_plus");
		}
		else
		{
			$gplus="https://".$_POST['txtGplus'];
			if (filter_var($gplus,FILTER_VALIDATE_URL)) 
			{
				filter_var($_POST['txtGplus'] , FILTER_SANITIZE_URL );
				array_push($values_add, $gplus);
				array_push($fields_add, "google_plus");
			}
		}

		if (!empty($file_name)) 
		{
			$check=getimagesize($_FILES["uploadTeam"]["tmp_name"]);
			// echo curl_errno($check);
			if ($check == FALSE) 
			{
				echo "<script type='text/javascript'>
						alert('Please select a image!');
					</script>";	
			}
			if ($check !== FALSE) 
			{
				// echo "File is an image :" .$check["mime"].".";
				$uploadok=1;
			}
			// else
			// {
			// 	echo "File is not an image";
			// }
			if ($_FILES["uploadTeam"]["size"] > 30000000)
			{
				"<script type='text/javascript'>
						alert('File to be large, Please select another file !');
					</script>";
				$uploadok=0;
			}
			if ($file_type != "jpg" and $file_type=="png" and $file_type =! "jpeg") 
			{
				"<script type='text/javascript'>
						alert('Please select jpg or png or jpeg files!');
					</script>";
				$uploadok=0;
			}
			if ($uploadok == 0) 
			{
				"<script type='text/javascript'>
						alert('Canot upload photo at this time .please try again later !');
					</script>";
					exit();
			}
			else 
			{
				$upload=move_uploaded_file($_FILES["uploadTeam"]["tmp_name"], $target_file .$rand.".".$file_type ); 
				if ($upload == TRUE ) 
				{
					$fields=array("type","file_name");
					$values=array($file_type,$rand.".".$file_type);
					$where=array("id" , $file_id);
					// var_dump($values);
					$objdb->update("files",$fields,$values,$where );
					
				}
				else
					echo "<script type='text/javascript'>
							alert('Error in upload image.Please try again later');
						</script>";
			}
		}
	 	if (!empty($designation))
	 	{
			$objdb->update("address",$fields_add,$values_add,array("id",$add_id));	
			$objdb->update("employee",array("designation"),array($designation),array("id",$emp_id));
	 	}

		echo "<script type='text/javascript'>
				alert('Update succesfull');
			</script>";
		header('location:tabTeam.php');
		
	}	

?> 
 

