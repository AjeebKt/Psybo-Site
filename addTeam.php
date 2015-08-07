<?php 
    error_reporting(0);
    include 'Database.php';
    $objdb=new Database('psybotechnologies.com','psyboysg_test','psybotest','psyboysg_psybo-db');
    // $objdb= new Database ('localhost','root','asd','psybo-db');
    $num_ptf=$objdb->num_row_ptf();
    $count_ptf=count($num_ptf);
    $actdir="/upload-image/";
    // error_reporting(0);
    if (isset($_POST['btnTeamSubmit'])) 
    {   
        $name=$_POST['txtName'];
        // $name=filter_var($_POST['txtName'],FILTER_SANITIZE_ENCODED);
        // $name=str_replace("%20", " ", $name);
        // $name=strip_tags($_POST['txtName']);

        $designation=$_POST['txtDesignation'];
        // $designation=strip_tags($_POST['txtDesignation']);
        // $designation=filter_var($_POST['txtDesignation'],FILTER_SANITIZE_ENCODED);
        // $designation=str_replace("%20", " ", $designation);

        
        $target_dir=getcwd()."/upload-image/";
        $file_name=basename($_FILES["uploadTeam"]["name"]);
        $file_type=pathinfo(basename($_FILES["uploadTeam"]["name"]),PATHINFO_EXTENSION);

        if ( !empty($name) and !empty($designation) )#and isset($_FILES['uploadTeam']['tmp_name']) ) 
        {
            $values_emp_add=array();
            $fields_emp_add=array();
            
            $values_emp_file=array($file_name,$file_type);
            $error="";

            if (preg_match('/^[A-Za-z0-9., _-]*$/', $name))
            {
                $error=1;
                $values_emp_add=array($name);
                $fields_emp_add=array("name");
            }
            else
            {
                $error=0;
                $message="<script type='text/javascript'>
                           alert(' please enter Correct name!');
                        </script>";
            }
            if (!empty($designation) and $error == 1) 
            {
            
                if (preg_match('/^[A-Za-z0-9.$, _-]*$/', $designation) and $error == 1)
                {
                    $values_emp=array($designation);
                    $fields_emp=array("designation");
                }
                else
                {
                    $error=0;
                    $message= "<script type='text/javascript'>
                            alert(' please enter Correct Designation!');
                        </script>";
                }
            }

            if (!empty($_POST['txtLinkedin']) and $error == 1) 
            {
                $preg = "/^(((https?)\:\/\/\/?)|www\.)([a-zA-Z0-9-.]*)\.([a-z]{2,3})(\/([a-zA-Z0-9+\$_-]\.?)+)*\/?$/";
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
                    $error= 0;
                    $message= "<script type='text/javascript'>
                            alert('The linkedin link has not valid .Please Enter the correct link.!');
                        </script>"; 
                }
            }
            if (!empty($_POST['txtFacebook']) and $error == 1) 
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
                    $error =0;
                    $message= "<script type='text/javascript'>
                        alert('The facebook link has not valid .Please Enter the correct link.!');
                    </script>"; 
                }
            }


            if (!empty($_POST['txtTwitter']) and $error == 1) 
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
                        array_push($values_emp_add,$link );
                        array_push($fields_emp_add, "twiter");
                    }
                }
                else
                {
                    $error=0;
                    $message= "<script type='text/javascript'>
                        alert('The twiter link has not valid .Please Enter the correct link.!');
                    </script>"; 
                }
            }
            if (!empty($_POST['txtGplus']) and $error == 1) 
            {
                $preg = "/^((http(s?):\/\/)|www\.\.?)+[a-zA-Z0-9\.\-\_]+(\.[a-zA-Z]{2,3})+(\/\+[a-zA-Z0-9\_\-\s\.\/\?\%\#\&\=\+]*)?$/";
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
                    $error =0;
                    $message= "<script type='text/javascript'>
                        alert('The google account  has not valid .Please Enter the correct link.!');
                    </script>"; 
                }
            }

            if ($error == 1 and $_FILES['uploadTeam']['tmp_name'] ) 
            {
                $uploadok=1;
                $check=getimagesize($_FILES["uploadTeam"]["tmp_name"]);
                if ($check !== FALSE) 
                {
                    // echo "File is an image :" .$check["mime"].".";
                    $uploadok=1;
                }
                else
                {
                    $message="<script type='text/javascript'>
                                alert('Please select onother image!');
                            </script>"; 
                    $uploadok=0;
                }
                if ($_FILES["uploadTeam"]["size"] > 10000000 and $uploadok == 1)
                {
                    $message="<script type='text/javascript'>
                                alert('Sorry file to be large .please select onether file!');
                            </script>"; 
                    $uploadok=0;
                }
                if ($file_type != "jpg" and $file_type=="png" and $file_type =! "jpeg" and $uploadok == 1) 
                {
                    $message= "<script type='text/javascript'>
                                alert('PLease select jpg or png or jpeg file!');
                            </script>";
                    $uploadok=0;
                }
            }
            else
                $uploadok=0;

            if ($uploadok == 1 and $error == 1) 
            {
                $rand=rand();
                $rand.=".";
                $upload=move_uploaded_file($_FILES["uploadTeam"]["tmp_name"], $target_dir .$rand.$file_type ); 
            // }
                // if ( $error == 1 )
                // {
                $values_emp_file=array($rand.$file_type,$file_type);
                $objdb->insert_mul_emp($values_emp,$values_emp_file,$fields_emp_add,$values_emp_add);
                if ($objdb == TRUE) 
                {
                    $message= "<script type='text/javascript'>
                                alert('Adding succesfull');
                                window.location.replace('tabTeam.php');
                        </script>";
                }
            }
            else if ($error == 1) 
            {
                $values_emp_file=array($rand.$file_type,$file_type);
                $objdb->insert_mul_emp($values_emp,$values_emp_file,$fields_emp_add,$values_emp_add);
                if ($objdb == TRUE) 
                {
                    $message= "<script type='text/javascript'>
                                alert('Adding succesfull');
                                window.location.replace('tabTeam.php');
                        </script>";
                } 
            }
            // else
            // $message= "<script type='text/javascript'>
            //         alert('Please Enter Correct Information!');
            //     </script>";     
        }    
        else
        {
            $message= "<script type='text/javascript'>
                    alert('Please enter valid name and designation!');
                </script>"; 
        }
    }       
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
                    <label for="txtName">Name</label><br>
                    <input id="txtName" name="txtName" type="name" required><br>
                </div>
                <div class="div-align-team">
                    <label for="txtDesignation">Designation</label><br>
                    <input id="txtDesignation" name="txtDesignation" type="text" required><br>
                </div>
                <div class="div-align-team">
                    <label for="txtFacebook">Facebook</label><br>
                    <input id="txtFacebook" name="txtFacebook" type="text" optional><br>
                </div>                  
                <div class="div-align-team">
                    <label for="txtTwitter">Twitter</label><br>
                    <input id="txtTwitter" name="txtTwitter" type="text" optional><br>
                </div>
                <div class="div-align-team">
                    <label for="txtLinkedin">LinkedIn</label><br>
                    <input id="txtLinkedin" name="txtLinkedin" type="text" optional><br>
                </div>
                <div class="div-align-team">
                    <label for="txtGplus">Google+</label><br>
                    <input id="txtGplus" name="txtGplus" type="text" optional><br>
                </div>
                <div class="div-align-team">
                    <!-- <label for="uploadTeam">Employee Image  (Image Must be in W:260px X H:320px)</label><br> -->
                    <input id="uploadTeam" name="uploadTeam" type="file" ><br>
                    <!-- <input name="uploadTeam" type="file" > -->
                </div>
                <button name="btnTeamSubmit" class="submit">Add</button>
            </div>
        </form>
        <form action="tabTeam.php" method="POST">
            <button name="btnCancel" class="reset">Cancel</button>
        </form>
    </section>
    <?php echo $message; ?>
</body>
</html>


