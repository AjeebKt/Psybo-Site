<?php 
	error_reporting(E_ALL);
	include 'Database.php';
	include 'file.php';
    // $objdb=new Database('psybotechnologies.com','psyboysg_test','psybotest','psyboysg_psybo-db');
    $objdb= new Database ('localhost','root','asd','psybo-db');
	$num_ptf=$objdb->num_row_ptf();
	$count_ptf=count($num_ptf);
	$actdir="/upload-image/";
	$message = "";
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
			$message="<script type='text/javascript'>
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
	<title>Portfolio - Dashboard</title>
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
			<h3>Portfolio</h3>
			<table class="show-item">
				<tbody>
					<tr>
						<th>Title</th>
						<th>Description</th>
						<th>Link</th>
						<th>Image</th>
						<th>
							<a href="addPortfolio.php" class="page-button">+ Add</a>
						</th>
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
						} ?> class="edit"></a>
						<a href=<?php foreach ($result as $key => $value) {
						if (is_string($key) and $key == 'id' )
						{

							echo "\"?delete_id=".$value."\" onclick=\"return DeleteCheck();\"";	
						}
						} ?> class="delete"></a></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</form>
	</div>
	</section>
	<?php echo $message;
	 ?>
</body>
</html>

