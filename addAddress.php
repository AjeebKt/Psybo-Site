<?php 
	error_reporting();
	include_once 'Database.php';
	$objdb = new Database ('localhost', 'root', 'asd', 'psybo-db');
	if (isset($_POST['btnAdd'])) 
	{
		$phoneNo = $_POST['txtPhoneNo'];
		$email = $_POST['txtEmail'];
		$facebook = $_POST['txtFblink'];
		$twitter = $_POST['txtTwitter'];
		$linkedin = $_POST['txtLn'];
		$google_plus = $_POST['txtGp'];
		$address = $_POST['footerAddress'];
		$error = 1;
		$fields_address = array();
		$values_address = array();
		if ( !empty($phoneNo) )#and !empty($phoneNo) and !empty($email) and !empty($facebook) and !empty($twitter) and !empty($linkedin) and !empty($google_plus)) 
		{

			$error = 1;
			if (preg_match('/^[A-Za-z0-9+]*$/',$phoneNo) )
			{
				$error = 1;
				array_push($fields_address, 'mobile');
				array_push($values_address, $phoneNo); 
			}
			else
			{
				$error = 0;
				$message = "<script type='text/javascript'>
							alert('Please enter correct Phone Number!!');
						</script>";	
			}
		}
			
		if (!empty($email)) 
		{
		
			if (filter_var($email ,FILTER_VALIDATE_EMAIL) and $error == 1) 
			{
				array_push($fields_address, 'email');
				array_push($values_address, $email);
			}			
			else
			{
				$error = 0;
				$message = "<script type='text/javascript'>
							alert('Please enter correct email!!');
						</script>";	
			}
		}	

		if (!empty($facebook)) 
		{
			$preg = "/^(http(s?):\/\/)?(www\.)+[a-zA-Z0-9\.\-\_]+(\.[a-zA-Z]{2,3})+(\/[a-zA-Z0-9\_\-\s\.\/\?\%\#\&\=]*)?$/";
     		if (preg_match($preg, $facebook) != FALSE  and $error == 1) 
     		{
          // $valid_url=$_POST['txtFacebook'];

        	  	if (filter_var($facebook,FILTER_VALIDATE_URL)) 
	        	{
	        		$error = 1;
	            	array_push($values_address,$facebook );
	              	array_push($fields_address, "fb");
	        	}
	          	else
	          	{
	              	$link="https://".$facebook;
	              	array_push($values_address, $link );
	              	array_push($fields_address, "fb");
	      	    }
	      	}
	     	 else
	      	{
	          $error =0;
	          $message= "<script type='text/javascript'>
	              alert('The facebook link has not valid .Please Enter the correct link.!');
	          </script>"; 
	      	}
	    }
	    if (!empty($twitter) and $error == 1) 
		{
		        $preg = "/^(http(s?):\/\/)|(www\.)+[a-zA-Z0-9\.\-\_]+(\.[a-zA-Z]{2,3})+(\/[a-zA-Z0-9\_\-\s\.\/\?\%\#\&\=\@]*)?$/";
		        // $preg = "/^(http(s?):\/\/)|(www\.)+[a-zA-Z0-9\.\-\_]+(\.[a-zA-Z]{2,3})+(\/[a-zA-Z0-9\_\-\s\.\/\?\%\#\&\=\@]*)?$/";

		        if (preg_match($preg, $twitter) != FALSE ) 
		        {
		            if (filter_var($twitter,FILTER_SANITIZE_URL)) 
		            {
		                array_push($values_address,$twitter);
		                array_push($fields_address, "twiter");
		            }
		            else
		            {
		                $link="https://".$twitter;
		                array_push($values_address,$link );
		                array_push($fields_address, "twiter");
		            }
	        	}
		        else
		        {
		            $error=0;
		            $message= "<script type='text/javascript'>
		                alert('The twiter link has not valid .Please Enter the correct twitter link.!');
		            </script>"; 
		        }
	 	}
	 	


	 	if (!empty($linkedin)) 
	 	{
	 	
	    	if (!empty($linkedin) and $error == 1 )  
	      	{
		      $preg = "/^(((https?)\:\/\/\/?)|www\.)([a-zA-Z0-9-.]*)\.([a-z]{2,3})(\/([a-zA-Z0-9+\$_-]\.?)+)*\/?$/";
		      if (preg_match($preg, $linkedin) != FALSE ) 
		      	{
		          // $valid_url=$_POST['txtLinkedin'];
		          if (filter_var($linkedin,FILTER_SANITIZE_URL)) 
		       		{
		            	array_push($values_address, $linkedin );
		              	array_push($fields_address, "linkedin");
		        	}
		        	else
		        	{
			            $link="https://".$valid_url;
			            array_push($values_address, $link );
			            array_push($fields_address, "linkedin");
		        	}
		   		}
			    else
			    {
			        $error= 0;
			        $message= "<script type='text/javascript'>
			    	              alert('The linkedin link has not valid .Please Enter the correct link.!');
			        	      </script>"; 
			    }
	  		}
	  	}

	  	if (!empty($google_plus)) 
	  	{
	  	
			if (!empty($google_plus) and $error == 1) 
	        {
	            $preg = "/^((http(s?):\/\/)|www\.\.?)+[a-zA-Z0-9\.\-\_]+(\.[a-zA-Z]{2,3})+(\/[a-zA-Z0-9\_\-\s\.\/\?\%\#\&\=\+]*)?$/";
	            if (preg_match($preg, $google_plus) != FALSE ) 
	            {
	                // $valid_url=$_POST['txtGplus'];
	                if (filter_var($google_plus,FILTER_VALIDATE_URL)) 
	                {
	                    array_push($values_address, $google_plus );
	                    array_push($fields_address, "google_plus");
	                }
	                else
	                {
	                    $link="https://".$valid_url;
	                    array_push($values_address, $link );
	                    array_push($fields_address, "google_plus");
	                }
	            }
	            else
	            {
	                $error =0;
	                $message= "<script type='text/javascript'>
	                    alert('The google account  has not valid .Please Enter the correct link.!');
	                </script>"; 
	            }
	        }
	    }
	    if (!empty($address) and $error ==1) 
	    {
            if (preg_match('/^[A-Za-z0-9.$, ()_-]*$/', $Address) )
            {
                $values_address=array($address);
                $fields_address=array('address');
            }	
            else
            {
                $error=0;
                $message= "<script type='text/javascript'>
                        alert(' please enter Correct Address!');
                    </script>";
            }
        }
	    $objdb-> insert_mul_cmpDtls($values_address,$fields_address);
  	}
	if (isset($_POST['btnCancel'])) 
		header('location:tabService.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/admin-style.css">
	<title>Add Service</title>
</head>
<body>
	<?php include 'dash.php'; ?>
	<section class="add-service">
		<form action="" method="POST" id="firstForm">
			<div class="first-content">
				<h3>Add Address</h3>
				<div class="group">
					<label for="txtPhoneNo">Phone Number</label><br>
					<input type="text" name="txtPhoneNo" id="txtPhoneNo" required>
				</div>
				<div class="group">
					<label for="txtEmail">Email</label><br>
					<input type="text" name="txtEmail" id="txtEmail" required>
				</div>
				<div class="group">
					<label for="fbLink">Facebook</label><br>
					<input type="text" id="fbLink" name="txtFblink">
				</div>
				<div class="group">
					<label for="txtTwitter">Twitter</label><br>
					<input type="text" name="txtTwitter" id="txtTwitter">
				</div>
				<div class="group">
					<label for="txtLn">Linked In</label><br>
					<input type="text" name="txtLn" id="txtLn">
				</div>
				<div class="group">
					<label for="txtGp">Google Plus</label><br>
					<input type="text" name="txtGp" id="txtGp">
				</div>
				<div class="group width-80">
					<label for="footerAddress">Address</label><br>
					<textarea type="text" id="footerAddress" name="footerAddress" cols="30" rows="5" required></textarea>
				</div>
			</div>
			<div class="group pad-left">
				<button id="btnAdd" name="btnAdd">Add</button>
			</div>
		</form>
		<div class="group">
			<form action="tabContact.php">
				<button id="btnCancel" name="btnCancel">Cancel</button>
			</form>
		</div>
		<?php echo $message; ?>
	</section>
</body>
</html>