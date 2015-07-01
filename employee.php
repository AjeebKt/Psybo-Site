<?php 
	include "file.php";
    require_once 'Database.php';
	
	// use app\Database;

    $objdb=new Database('localhost','root','asd','psybo-db');

    // $query=$objdb->insert("admin",array("username","password"),array("admin","admin"));
    // $query=$objdb->alter_table("address",array("google_plus","varchar(85)"),"","");
    // if ($query==TRUE) 
    // {
    // 	echo "succes";
    // }
    $result=$objdb->select_row();
    var_dump($result);
?>
    
    <html>
    	<table border="1px">
    		<tr>
    		<?php foreach ($result as $key => $value) 
    		{ 
    			if (is_string($key)) 
    			{?>
    				<td><?php echo $value; ?></td>  <?php 
    			}
    		} ?>
    		</tr>
    	</table>
    </html>
    			
<?php 
	$actdir="/photo_employee/";
	$dir=getcwd().$actdir;
	
	$images=glob($dir."*.jpg");
	foreach($images as $image) 
	{	
		$image=$actdir.(basename($image));
		// echo '<img src="'.$image.'" /><br />';
	}
	// echo '<img src="/photo_employee/canberra_hero_image1.jpg" />';
 ?>