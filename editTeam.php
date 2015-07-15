

<?php 
	// error_reporting(0);
	include 'Database.php';
	$objdb=new Database("localhost","root","asd","psybo-db");
	$emp_id=(int)$_GET['editid'];
	$result_emp=$objdb->select("employee",array(),array("id",$emp_id));
	foreach ($result_emp[0] as $key => $value) 
	{
		if (is_string($key) and $key == 'files_id') 
		$file_id=(int)$value;
	}
	foreach ($result_emp[0] as $key => $value) 
	{
		if (is_string($key) and $key == 'address_id') 
		$add_id=(int)$value;
	}
	$result_add=$objdb->select("address", array(),array("id",$add_id));
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
	<?php //include 'dash.php';?>
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
						if (is_string($key) and $key == 'linkedin')
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
			</div>
		</form>
		<form action="tabTeam.php" method="POST">
			<button name="btnReset" class="reset">Cancel</button>
		</form>
	</section>
</body>
 </html>
 <?php
	if (isset($_POST['btnTeamSubmit'])) 
	{
		//upload file details
		$rand=rand();
		$file_name=basename($_FILES["uploadTeam"]["name"]);
		$file_type=pathinfo(basename($_FILES["uploadTeam"]["name"]),PATHINFO_EXTENSION);
		$target_dir=getcwd()."/upload-image/";

		$name=$_POST['txtName'];

		$designation=$_POST['txtDesignation'];
		// $designation=strip_tags($_POST['txtDesignation']);
		// preg_replace('/[^A-Za-z0-9\s.]/', '', $designation);
		$values_emp_add=array();
		$fields_emp_add=array();

		if ( !empty($name) and !empty($designation) )
		{
      if (preg_match('/^[A-Za-z0-9., _-]*$/', $name))
      {
				$values_emp_add=array($name);
				$fields_emp_add=array("name");
      }
      else
      {
        echo "<script type='text/javascript'>
                alert(' please enter Correct name!');
            </script>";
        exit();
      }

      if (preg_match('/^[A-Za-z0-9., _-]*$/', $designation))
      {
          $values_emp=array($designation);
          $fields_emp=array("designation");
      }
      else
      {
      	echo "<script type='text/javascript'>
        	      alert(' please enter Correct Designation!');
             </script>";
        exit(); 
      }

			if (!empty($_POST['txtLinkedin']) ) 
    	{
	      $preg = "/^(http(s?):\/\/)?(www\.)+[a-zA-Z0-9\.\-\_]+(\.[a-zA-Z]{2,3})+(\/[a-zA-Z0-9\_\-\s\.\/\?\%\#\&\=]*)?$/";
	      if (preg_match($preg, $_POST['txtLinkedin']) != FALSE ) 
	      {
	        $valid_url=$_POST['txtLinkedin'];
	        if (filter_var($valid_url,FILTER_VALIDATE_URL)) 
	        {
	            array_push($values_emp_add, $_POST['txtLinkedin'] );
	            array_push($fields_emp_add, "linkedin");
	        }
	        else
	        {
	            $link="https://".$valid_url;
	            array_push($values_emp_add, $link );
	            array_push($fields_emp_add, "linkedin");
	        }
	      }
	      else
	      {
	        echo "<script type='text/javascript'>
	            alert('The linkedin link has not valid .Please Enter the correct link.!');
	        </script>"; 
	        exit();
	      }
	    }
		  if (!empty($_POST['txtFacebook']) ) 
		  {
		    $preg = "/^(http(s?):\/\/)?(www\.)+[a-zA-Z0-9\.\-\_]+(\.[a-zA-Z]{2,3})+(\/[a-zA-Z0-9\_\-\s\.\/\?\%\#\&\=]*)?$/";
		    if (preg_match($preg, $_POST['txtFacebook']) != FALSE ) 
		    {
		      $valid_url=$_POST['txtFacebook'];
		      if (filter_var($valid_url,FILTER_VALIDATE_URL)) 
		      {
		          array_push($values_emp_add, $_POST['txtFacebook'] );
		          array_push($fields_emp_add, "fb");
		      }
		      else
		      {
		          $link="https://".$valid_url;
		          array_push($values_emp_add, $link );
		          array_push($fields_emp_add, "fb");
		      }
		    }
		    else
		    {
		      echo "<script type='text/javascript'>
		        	  alert('The Facebook link has not valid .Please Enter the correct link.!');
		      		</script>"; 
		      exit();
		    }
		  }
			if (!empty($_POST['txtTwitter']) ) 
			{
			  $preg = "/^(http(s?):\/\/)?(www\.)+[a-zA-Z0-9\.\-\_]+(\.[a-zA-Z]{2,3})+(\/[a-zA-Z0-9\_\-\s\.\/\?\%\#\&\=]*)?$/";
			  if (preg_match($preg, $_POST['txtTwitter']) != FALSE ) 
			  {
				 	$valid_url=$_POST['txtTwitter'];
			    if (filter_var($valid_url,FILTER_VALIDATE_URL)) 
			    {
			        array_push($values_emp_add, $_POST['txtTwitter'] );
			        array_push($fields_emp_add, "twiter");
			    }
			    else
			    {
			        $link="https://".$valid_url;
			        array_push($values_emp_add, $link );
			        array_push($fields_emp_add, "twiter");
			    }
			  }
			  else
			  {
			  	echo "<script type='text/javascript'>
			      	  alert('The twiter link has not valid .Please Enter the correct link.!');
			   		 	</script>"; 
			    exit();
			  }
			}
			if (!empty($_POST['txtGplus']) ) 
			{
			  $preg = "/^(http(s?):\/\/)?(www\.)+[a-zA-Z0-9\.\-\_]+(\.[a-zA-Z]{2,3})+(\/[a-zA-Z0-9\_\-\s\.\/\?\%\#\&\=]*)?$/";
			  if (preg_match($preg, $_POST['txtGplus']) != FALSE ) 
			  {
			    $valid_url=$_POST['txtGplus'];
			    if (filter_var($valid_url,FILTER_VALIDATE_URL)) 
			    {
			      array_push($values_emp_add, $_POST['txtGplus'] );
			      array_push($fields_emp_add, "google_plus");
			    }
			    else
			    {
			      $link="https://".$valid_url;
			      array_push($values_emp_add, $link );
			      array_push($fields_emp_add, "google_plus");
			    }
			  }
			  else
			  {
			    echo "<script type='text/javascript'>
			      	  alert('The google account has not valid .Please Enter the correct link.!');
			  		  </script>"; 
			    exit();
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
					chmod($_FILES["uploadTeam"]["tmp_name"], 'a+rwxt');
					$upload=move_uploaded_file($_FILES["uploadTeam"]["tmp_name"], $target_dir .$rand.".".$file_type ); 
					if ($upload == TRUE ) 
					{
						$fields=array("type","file_name");
						$values=array($file_type,$rand.".".$file_type);
						$where=array("id" , $file_id);
						// var_dump($values);
						$objdb->update("files",$fields,$values,$where );
						
					}
					else
					{
						echo "<script type='text/javascript'>
								alert('Error in upload image.Please try again later');
							</script>";
							exit();
					}
				}
			}
		$objdb->update("address",$fields_emp_add,$values_emp_add,array("id",$add_id));	
		$objdb->update("employee",array("designation"),$values_emp,array("id",$emp_id));
		if ($objdb == TRUE) 
		{
		echo "<script type='text/javascript'>
					alert('Update succesfull');
					window.location.replace('tabTeam.php');
			</script>";
		}
	}
}	
?> 
 

