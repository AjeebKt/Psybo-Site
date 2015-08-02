<?php 
include 'Database.php';
    $objdb=new Database('psybotechnologies.com','psyboysg_test','psybotest','psyboysg_psybo-db');
    // $objdb= new Database ('localhost','root','asd','psybo-db');
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

<?php //Sinclude 'dash.php';  ?>
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
                    <label for="uploadTeam">Employee Image  (Image Must be in W:260px X H:320px)</label><br>
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


