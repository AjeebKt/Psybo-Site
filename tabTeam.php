<?php 
	error_reporting(0);
	include "file.php";
    require_once 'Database.php';
	// use app\Database;
    // $objdb=new Database('psybotechnologies.com','psyboysg_test','psybotest','psyboysg_psybo-db');
    $objdb= new Database ('localhost','root','asd','psybo-db');
    $objfile=new File();
    $emp_id=$objdb->num_row_emp();// number of values of employee
    $count_emp=count($emp_id);
    // var_dump($count_emp);
 	$actdir="/upload-image/";

	if (isset($_GET['deleteid'])) 
	{
		$ptf_id=$_GET['deleteid'];
		$result=$objdb->select("employee",array("files_id","address_id"),array("id",$ptf_id));
		foreach ($result[0] as $key => $value) 
		{
			if (is_string($key) and $key == "files_id")  
			{
				$files_id=$value;
			}
			if (is_string($key) and $key== "address_id") 
			{
				$address_id=$value;
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
	 	unlink(getcwd().$actdir.$file_name);
		$objdb->delete_team($_GET['deleteid']);
		// header("location:tabTeam.php");
		if ($objdb == true ) 
		{
			$message ="<script type='text/javascript'>alert('Deleted!');
							window.location.replace('tabTeam.php');
						</script>";	
			$objdb->delete("address",array("id",$address_id));
			$objdb->delete("files",array("id",$files_id));

		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Team - Dashboard</title>
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
	<?php include 'dash.php' ?>
	<section>
		<div class="show-table">
			<form id="formShowTeam" name="formShowTeam" action="" method="POST">
				<h3>Team</h3>
				<table class="show-item">
					<tbody>
						<tr>
							<th>Name</th>
							<th>Desigination</th>
							<th>Gender</th>
							<th>Facebook ID</th>
							<th>Twitter ID</th>
							<th>LinkedIn</th>
							<th>Google+</th>
							<th><img src="img/user.png" alt=""></th>
							<th>
								<a href="addTeam.php" class="page-button">+ Add</a>
							</th>
						</tr>
						<?php for ($j=0; $j<$count_emp ;$j++)

					{ $result=$objdb->select_row_emp($emp_id[$j][0]);?>
						<tr>
							<td><?php foreach ($result as $key => $value) {
								if (is_string($key) and $key=="name") {
									echo $value;
								}
							} ?></td>
							<td><?php foreach ($result as $key => $value) {
								if (is_string($key) and $key=="designation") {
									echo $value;
								}
							} ?></td>
							<td>Male</td>
							<td><?php foreach ($result as $key => $value) {
								if (is_string($key) and $key=="fb") {
									echo $value;
								}
							} ?></td>
							<td><?php foreach ($result as $key => $value) {
								if (is_string($key) and $key=="twiter") {
									echo $value;
								}
							} ?></td>
							<td><?php foreach ($result as $key => $value) {
								if (is_string($key) and $key=="linkedin") {
									echo $value;
								}
							} ?></td>
							<td><?php foreach ($result as $key => $value) {
								if (is_string($key) and $key=="google_plus") {
									echo $value;
								}
							} ?></td>
							<td><img src=<?php foreach ($result as $key => $value) {
								if (is_string($key) and $key=="file_name") {
									// var_dump($actdir.$value);
									echo "\"".$actdir.$value."\"";
								}
							}; ?> alt=""></td>
							<td><a href=<?php foreach ($result as $key => $value) {
								if (is_string($key) and $key== 'id') 
								{
									echo "\"editTeam.php?editid=".$value."\"";
								}
							} ?> class="edit"></a>
							 <a href=<?php foreach ($result as $key => $value) {
							if (is_string($key) and $key == 'id' )
							{

								echo "\"?deleteid=".$value."\" onclick=\"return DeleteCheck()\"";	
							}
							} ?> class="delete"></a></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</form>
		</div>
	</section>
	<?php echo $message; ?>
</body>
</html>

