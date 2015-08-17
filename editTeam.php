<?php 
	error_reporting(0);
	include 'Database.php';
    $objdb=new Database('psybotechnologies.com','psyboysg_test','psybotest','psyboysg_psybo-db');
    // $objdb=new Database('localhost','root','asd','psybo-db');
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
	$result_file=$objdb->select("files",array(),array("id",$file_id));
	foreach ($result_file[0] as $key => $value)
	{
		
		if (is_string($key) and $key == 'file_name') 
		{
			$image_name=$value;
		}
	}


	if (isset($_POST['btnTeamSubmit'])) 
	{
		//upload file details
		if ($_FILES['uploadTeam']['tmp_name']) 
		{
			
			$file_name=basename($_FILES["uploadTeam"]["name"]);
			$file_type=pathinfo(basename($_FILES["uploadTeam"]["name"]),PATHINFO_EXTENSION);
			$target_dir=getcwd()."/upload-image/";
		}

		$name=$_POST['txtName'];
		$designation=$_POST['txtDesignation'];
		// $designation=strip_tags($_POST['txtDesignation']);
		// preg_replace('/[^A-Za-z0-9\s.]/', '', $designation);
		$values_emp_add=array();
		$fields_emp_add=array();


		if ( !empty($name) and !empty($designation) )
		{
	    	if (preg_match('/^[A-Za-z0-9., _-&]*$/', $name))
	      	{
	      		$error=1;
				$values_emp_add=array($name);
				$fields_emp_add=array("name");
	    	}
		    else
		    {
		    	$error=0;
		    	$message= "<script type='text/javascript'>
		  		        		alert(' please enter Correct name!');
	        	   			</script>";
		    }

		    if (preg_match('/^[A-Za-z0-9., _-]*$/', $designation) and $error == 1)
		    {
		    	$error=1;
		        $values_emp=array($designation);
		        $fields_emp=array("designation");
		    }
		    else
		    {
		    	$error=0;
		      	$message = "<script type='text/javascript'>
		        	     		 alert(' please enter Correct Designation!');
		             		</script>";
		    }

			if (!empty($_POST['txtLinkedin']) ) 
		    {
			    $preg = "/^(http(s?):\/\/)?(www\.)+[a-zA-Z0-9\.\-\_]+(\.[a-zA-Z]{2,3})+(\/[a-zA-Z0-9\_\-\s\.\/\?\%\#\&\=]*)?$/";
			    if (preg_match($preg, $_POST['txtLinkedin']) != FALSE ) 
			    {
			    	$error=1;
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
			    	$error=0;
			    	$message="<script type='text/javascript'>
			            		alert('The linkedin link has not valid .Please Enter the correct link.!');
			        		</script>"; 
			    }
			}
			else
			{
				$error = 1;
				array_push($values_emp_add, "" );
			    array_push($fields_emp_add, "linkedin");
			}
			if (!empty($_POST['txtFacebook']) and $error == 1) 
			{
			    $preg = "/^(http(s?):\/\/)?(www\.)+[a-zA-Z0-9\.\-\_]+(\.[a-zA-Z]{2,3})+(\/[a-zA-Z0-9\_\-\s\.\/\?\%\#\&\=]*)?$/";
			    if (preg_match($preg, $_POST['txtFacebook']) != FALSE ) 
			    {
			    	$error = 1;
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
			    	$error=0;
			    	$message="<script type='text/javascript'>
			        		alert('The Facebook link has not valid .Please Enter the correct link.!');
			      		</script>"; 
			    }
			}
			else
			{
				$error=1;
				array_push($values_emp_add, "" );
				array_push($fields_emp_add, "fb");
			}

			if (!empty($_POST['txtTwitter']) and $error == 1) 
			{
				$preg = "/^(http(s?):\/\/)?(www\.)+[a-zA-Z0-9\.\-\_]+(\.[a-zA-Z]{2,3})+(\/[a-zA-Z0-9\_\-\s\.\/\?\%\#\&\=]*)?$/";
			  	if (preg_match($preg, $_POST['txtTwitter']) != FALSE ) 
			  	{
			  		$error = 1;
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
			  		$error=0;
				  	echo "<script type='text/javascript'>
				      	  alert('The twiter link has not valid .Please Enter the correct link.!');
				   		 	</script>"; 
				}
			}
			else
			{
				$error=1;
				array_push($values_emp_add, "" );
				array_push($fields_emp_add, "twiter");
			}
			if (!empty($_POST['txtGplus']) and $error == 1) 
			{
				$preg = "/^((http(s?):\/\/)|www\.\.?)+[a-zA-Z0-9\.\-\_]+(\.[a-zA-Z]{2,3})+(\/\+[a-zA-Z0-9\_\-\s\.\/\?\%\#\&\=\+]*)?$/";
			  	if (preg_match($preg, $_POST['txtGplus']) != FALSE ) 
			  	{
			  		$error=1;
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
				  	$error=0;
				    $message= "<script type='text/javascript'>
				      	  alert('The google account has not valid .Please Enter the correct link.!');
				  		  </script>"; 
			  	}
			}
			else
			{
				array_push($values_emp_add, "" );
				array_push($fields_emp_add, "google_plus");
			}

			// upload file
			$uploadok=1;
			if (!empty($file_name)) 
			{
				$rand=rand();
				$check=getimagesize($_FILES["uploadTeam"]["tmp_name"]);
				// echo curl_errno($check);
				if ($check !== FALSE) 
				{
					// echo "File is an image :" .$check["mime"].".";
					$uploadok=1;
				}
				else
				{
					$uploadok=0;
					$message="<script type='text/javascript'>
								alert('Please select a image!');
							</script>";	
				}
				if ($_FILES["uploadTeam"]["size"] > 30000000 and $uploadok == 1)
				{
					$message="<script type='text/javascript'>
								alert('File to be large, Please select another file !');
							</script>";
					$uploadok=0;
				}
				if ($file_type != "jpg" and $file_type=="png" and $file_type =! "jpeg" and $uploadok == 1) 
				{
					$message="<script type='text/javascript'>
							alert('Please select jpg or png or jpeg files!');
						</script>";
					$uploadok=0;
				}
				if ($uploadok == 0) 
				{
					$message="<script type='text/javascript'>
							alert('Canot upload photo at this time .please try again later !');
						</script>";
				}
				else if ($uploadok == 1) 
				{
					// chmod($target_dir, "a+rwxt");
					$upload=move_uploaded_file($_FILES["uploadTeam"]["tmp_name"], $target_dir .$rand.".".$file_type ); 
					if ($upload == TRUE ) 
					{
						$fields=array("type","file_name");
						$values=array($file_type,$rand.".".$file_type);
						$where=array("id" , $file_id);
						// var_dump($values);
						$actdir="/upload-image/";
						unlink(getcwd().$actdir.$image_name );
						$objdb->update("files",array("type","file_name"),array("",""),array("id",$file_id));
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
			// delete photo
			// else
			// {
			// 	$actdir="/upload-image/";
			// 	unlink(getcwd().$actdir.$image_name );
			// 	$objdb->update("files",array("type","file_name"),array("",""),array("id",$file_id));
			// }
			
			if ($error == 1 and $uploadok == 1) 
			{
				
				$objdb->update("address",$fields_emp_add,$values_emp_add,array("id",$add_id));
				if ($objdb == TRUE) 
					$update_add=1;					
				$objdb->update("employee",array("designation"),$values_emp,array("id",$emp_id));
				if ($objdb == TRUE and $update_add) 
				{
					$message = "<script type='text/javascript'>
								alert('Update succesfull');
								window.location.replace('tabTeam.php');
							</script>";
				}
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Team</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/admin-style.css">
</head>
<body>
	<?php include 'dash.php';?>
 	<section class="add-service">
		<form id="formTeam" name="formTeam" method="POST" action="" enctype="multipart/form-data">	
			<div id="tabTeam" class="first-content">
				<h3>EDIT TEAM MEMBERS</h3>
				<div class="group">
					<label for="txtName">Name</label><br>
					<input id="txtName" name="txtName" <?php foreach ($result_add[0] as $key => $value) {
						if (is_string($key) and $key == 'name')
							echo "value=\"".$value."\"";
					} ?> ><br>
				</div>
				<div class="group">
					<label for="txtDesignation">Designation</label><br>
					<input id="txtDesignation" name="txtDesignation" <?php foreach ($result_emp[0] as $key => $value) {
						if (is_string($key) and $key == 'designation')
							echo "value=\"".$value."\"";
					} ?> ><br>
				</div>
				<div class="group">
                    <label for="txtDesignation">Gender</label><br>
                     <select class="selection">
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select> 
                </div>
				<div class="group">
					<label for="txtFacebook">Facebook</label><br>
					<input id="txtFacebook" name="txtFacebook" <?php foreach ($result_add[0] as $key => $value) {
						if (is_string($key) and $key == 'fb')
							echo "value=\"".$value."\"";
					} ?>><br>
				</div>					
				<div class="group">
					<label for="txtTwitter">Twitter</label><br>
					<input id="txtTwitter" name="txtTwitter" <?php foreach ($result_add[0] as $key => $value) {
						if (is_string($key) and $key == 'twiter')
							echo "value=\"".$value."\"";
					} ?> ><br>
				</div>
				<div class="group">
					<label for="txtLinkedin">LinkedIn</label><br>
					<input id="txtLinkedin" name="txtLinkedin" <?php foreach ($result_add[0] as $key => $value) {
						if (is_string($key) and $key == 'linkedin')
							echo "value=\"".$value."\"";
					} ?> ><br>
				</div>
				<div class="group">
					<label for="txtGplus">Google+</label><br>
					<input id="txtGplus" name="txtGplus" <?php foreach ($result_add[0] as $key => $value) {
						if (is_string($key) and $key == 'google_plus')
							echo "value=\"".$value."\"";
					} ?>  ><br>
				</div>
				<div class="group">
					<label for="uploadTeam">Select Image</label><br>
					<input type="file" id="uploadTeam" name="uploadTeam">
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


