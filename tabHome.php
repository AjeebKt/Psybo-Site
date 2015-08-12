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
	<link rel="stylesheet" href="css/admin-style.css">
	<script language="javascript" type="text/javascript">
	function DeleteCheck()
	{
		return confirm('Are you sure to delete this record?');
	}
	</script>
</head>
<body>
	<?php include 'dash.php'; ?>
	<section>
	<div class="show-table">
		<form id="formShowportfolio" name="formShowportfolio" action="" method="POST">
			<a href="addHome.php">Add Main Head</a><br><br>
			<a href="addWedo.php">Add we-Do</a>
			<table class="show-item">
				<tr>
					<td>Head</td>
					<td>Description</td>
					<td>Edit</td>
					<td>Delete</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td>
						<a href="editHome.php" class="edit"></a>
					</td>
					<td>
						<a href="" class="delete" onclick="DeleteCheck()"></a>
					</td>
				</tr>
			</table>
			<table class="show-item">
				<tr>
					<td>Sub Head</td>
					<td>Description</td>
					<td>Image</td>
					<td>Link</td>
					<td>Delete</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>
						<a href="editWedo.php" class="edit"></a>
					</td>
					<td>
						<a href="" class="delete" onclick="DeleteCheck()"></a>
					</td>
				</tr>
			</table>
		</form>
	</div>
	</section>
</body>
</html>

