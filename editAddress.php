<?php 
	error_reporting(1);
	include_once 'Database.php';
	$objdb = new Database('localhost', 'root','asd','psybo-db');
	$messageId =$_GET['editId'];
	$resultCmpDtl = $objdb->select('company_details', array(),array('id', $messageId));
	foreach ($resultCmpDtl[0] as $key => $value) 
	{
		if ($key == 'address_id' and is_string($key) )
		{
			$address_id = $value;
		}
	}
	$resultAddress = $objdb->select('address', array(), array('id', $address_id));
	if (isset($_POST['btnUpdate'])) 
	{
		$phoneNo = $_POST['txtPhoneNo'];
		$email = $_POST['txtEmail'];
		$facebook = $_POST['fbLink'];
		$twitter = $_POST['txtTwitter'];
		$linkedin = $_POST['txtLn'];
		$google_plus = $_POST['txtGp'];
		$address = $_POST['footerAddress'];
		$place = $_POST['txtPlace'];
		$error = 1;
		$fields_address = array();
		$values_address = array();
		if ( !empty($phoneNo) and !empty($address) )#and !empty($phoneNo) and !empty($email) and !empty($facebook) and !empty($twitter) and !empty($linkedin) and !empty($google_plus)) 
		{

			if (preg_match('/^[A-Za-z0-9\+]*$/',$phoneNo) )
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
			if (!empty($email) and $error == 1) 
			{
			
				if (filter_var($email ,FILTER_VALIDATE_EMAIL) ) 
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
			else
			{
				array_push($fields_address, 'email');
				array_push($values_address, ""); 
			}	

			if (!empty($facebook) and $error ==1) 
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
		    else
			{
				array_push($fields_address, 'fb');
				array_push($values_address, ""); 
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
		 	else
			{
				array_push($fields_address, 'twiter');
				array_push($values_address, ""); 
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
		  	else
			{
				array_push($fields_address, 'linkedin');
				array_push($values_address, ""); 
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
		    else
			{
				array_push($fields_address, 'google_plus');
				array_push($values_address, ""); 
			}
		    // if (!empty($place)) 
		    // {
		    // 	if (preg_match('/^[A-Za-z0-9.$, ()_-]*$/', $place) )
	     //        {
	     //            array_push($values_address, $place );
		    //         array_push($fields_address, "place");
	     //        }	
	     //        else
	     //        {
	     //            $error=0;
	     //            $message= "<script type='text/javascript'>
	     //                    alert(' please enter Correct place!');
	     //                </script>";
	     //        }
		    // }
		    if (!empty($address) and $error ==1) 
		    {
	            if (preg_match('/^[A-Za-z0-9\.\&\,\ \(\)\_\-\:]*$/', $Address) )
	            {
	                array_push($values_address, $address );
		            array_push($fields_address, "address");
	            }	
	            else
	            {
	                $error=0;
	                $message= "<script type='text/javascript'>
	                        alert(' please enter Correct Address!');
	                    </script>";
	            }
	        }
	        if ($error == 1) 
	        {
	        	$objdb->Update('address', $fields_address, $values_address,array('id',$address_id));
			    if ($objdb == true) 
			    {
			    	 $message= "<script type='text/javascript'>
		                                alert('Update succesfull');
		                                window.location.replace('tabContact.php');
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
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/admin-style.css">
	<title>Edit Address</title>
</head>
<body>
	<?php include 'dash.php'; ?>
	<section class="add-service">
		<form action="" method="POST" id="firstForm">
			<div class="first-content">
				<h3>Edit Address</h3>
				<div class="group">
					<label for="txtPhoneNo">Phone Number</label><br>
					<input name="txtPhoneNo" id="txtPhoneNo" type="tel" value=<?php foreach ($resultAddress[0] as $key => $value) {
																					if (is_string($key) and $key == 'mobile') {
																						echo "\"".$value."\"";
																					}			
																				} ?> required>
				</div>
				<div class="group">
					<label for="txtEmail">Email</label><br>
					<input name="txtEmail" id="txtEmail" type="email" required value=<?php foreach ($resultAddress[0] as $key => $value) {
																					if (is_string($key) and $key == 'email') {
																						echo "\"".$value."\"";
																					}			
																				} ?> >
				</div>
				<div class="group">
					<label for="fbLink">Facebook</label><br>
					<input name="fbLink" type="text" id="fbLink" type="url" value=<?php foreach ($resultAddress[0] as $key => $value) {
																					if (is_string($key) and $key == 'fb') {
																						echo "\"".$value."\"";
																					}			
																				} ?>>
				</div>
				<div class="group">
					<label for="txtTwitter">Twitter</label><br>
					<input name="txtTwitter" id="txtTwitter" type="url" value=<?php foreach ($resultAddress[0] as $key => $value) {
																					if (is_string($key) and $key == 'twiter') {
																						echo "\"".$value."\"";
																					}			
																				} ?>>
				</div>
				<div class="group">
					<label for="txtLn">Linked In</label><br>
					<input name="txtLn" id="txtLn" type="url" value=<?php foreach ($resultAddress[0] as $key => $value) {
																					if (is_string($key) and $key == 'linkedin') {
																						echo "\"".$value."\"";
																					}			
																				} ?>>
				</div>
				<div class="group">
					<label for="txtGp">Google Plus</label><br>
					<input name="txtGp" id="txtGp" type="url" value=<?php foreach ($resultAddress[0] as $key => $value) {
																					if (is_string($key) and $key == 'google_plus') {
																						echo "\"".$value."\"";
																					}			
																				} ?>>
				</div>
				<div class="group">
					<label for="txtPlace">Place</label><br>
					<input name="txtPlace" id="txtPlace" type="text" value=<?php foreach ($resultAddress[0] as $key => $value) {
																					if (is_string($key) and $key == 'place') {
																						echo "\"".$value."\"";
																					}			
																				} ?>>
				</div>
				<div class="group width-80">
					<label for="footerAddress">Address</label><br>
					<textarea type="text" id="footerAddress" name="footerAddress" cols="30" rows="5" required ><?php foreach ($resultAddress[0] as $key => $value) {
																					if (is_string($key) and $key == 'address') {
																						echo $value;
																					}			
																				} ?></textarea>
				</div>
			</div>
			<div class="group pad-left">
				<button id="btnAdd" name="btnUpdate">Update</button>
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