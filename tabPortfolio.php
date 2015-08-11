<?php 
	error_reporting(0);
	include 'Database.php';
	include 'file.php';
    // $objdb=new Database('psybotechnologies.com','psyboysg_test','psybotest','psyboysg_psybo-db');
    $objdb= new Database ('localhost','root','asd','psybo-db');
	$num_ptf=$objdb->num_row_ptf();
	$count_ptf=count($num_ptf);
	$actdir="/upload-image/";
	if (isset($_GET['delete_id'])) 
	{
		$ptf_id=$_GET['delete_id'];
		$result=$objdb->select("portfolio",array("files_id"),array("id",$ptf_id));
		foreach ($result[0] as $key => $value) 
		{
			if (is_string($key) and $key == "files_id")  
			{
				$files_id=$value;
			}
		}
		$result=$objdb->select("files",array("file_name"),array("id",$files_id));
		foreach ($result[0] as $key => $value) 
		{
			if (is_string($key) and $key== "file_name") 
			{
				$file_name=$value;
			}
		}
		$objdb->delete_portfolio($_GET['delete_id']);
		unlink(getcwd().$actdir.$file_name);
		if ($objdb == true) 
		{
			$message="<script type='text/javascript'>alert('Deleted!');
							window.location.replace('tabPortfolio.php');
						</script>";	
			$objdb->delete("files",array("id",$files_id));
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tab-Portfolio</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/css.css">
	<link rel="stylesheet" href="css/style.css">
	<script language="javascript" type="text/javascript">
	function DeleteCheck()
	{
		return confirm('Are you sure to delete this record?')
	}
	</script>
</head>
<body>
	<?php include 'dash.php' ?>
	<section>
	<div class="edit-form">
	<h3>Edit Portfolio</h3>
		<div class="edit-hidden">
			<form id="editForm" name="editForm" action="" method="POST">
				sa
			</form>
		</div>
	</div>
	<div class="form-add-portfolio">
		<form id="formShowportfolio" name="formShowportfolio" action="" method="POST">
			<a href="addPortfolio.php">Add Portfolio</a>
			<table class="show-item">
				<tr>
					<td>Name</td>
					<td>Description</td>
					<td>Link</td>
					<td>Image</td>
					<td>Edit</td>
					<td>Delete</td>
					</tr>
				<?php 
				for ($i=0; $i < $count_ptf; $i++) { 
				$result=$objdb->select_row_ptf($num_ptf[$i][0]);
				?>
				<tr>
					<td><?php foreach ($result as $key => $value) {
					if (is_string($key) and $key == 'name' )
					{
						echo $value;	
					}
					} ?></td>
					<td><?php foreach ($result as $key => $value) {
					if (is_string($key) and $key == 'about' )
					{
						echo $value;	
					}
					} ?></td>
					<td><?php foreach ($result as $key => $value) {
					if (is_string($key) and $key == 'link' )
					{
						echo $value;	
					}
					} ?></td>
					<td><img src=<?php foreach ($result as $key => $value) {
					if (is_string($key) and $key == 'file_name' )
					{
						echo "\"".$actdir.$value."\"";	
					}
					} ?> alt=""></td>
					<td><a href=<?php foreach ($result as $key => $value) {
					if (is_string($key) and $key == 'id' )
					{

						echo "\"editPortfolio.php?edit_id=".$value."\"";	
					}
					} ?> class="edit"></a></td>
					<td><a href=<?php foreach ($result as $key => $value) {
					if (is_string($key) and $key == 'id' )
					{

						echo "\"?delete_id=".$value."\" onclick=\"return DeleteCheck();\"";	
					}
					} ?> class="delete"></a></td>
				</tr>
				<?php } ?>
			</table>
		</form>
	</div>
	</section>
	<?php echo $message;
	include 'dash.php';
	 ?>
</body>
</html>

