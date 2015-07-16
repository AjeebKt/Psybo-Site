<?php 
	error_reporting(0);
	include 'Database.php';
	include 'file.php';
	$objdb=new Database("localhost","root","asd","psybo-db");
	$num_ptf=$objdb->num_row_ptf();
	$count_ptf=count($num_ptf);
	$actdir="/upload-image/";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tab-Portfolio</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/css.css">
	<link rel="stylesheet" href="css/style.css">
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
					<td>description</td>
					<td>link</td>
					<td>Image</td>
					<td>Edit</td>
					<td>Delete</td>
					</tr>
				<?php 
				// var_dump($num_ptf);
				for ($i=0; $i < $count_ptf; $i++) { 
				$result=$objdb->select_row_ptf($num_ptf[$i][0]);
				// var_dump($result); 
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

						echo "\"?delete_id=".$value."\"";	
					}
					} ?> class="delete"></a></td>
				</tr>
				<?php } ?>
			</table>
		</form>
	</div>
	</section>
</body>
</html>
<?php if (isset($_GET['delete_id'])) 
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
	header("location:tabPortfolio.php");
	
}
// 	echo "<script type='text/javascript'>
// 			var answer = confirm('Do you really need to delete ?');
// 			if (answer){
// 				window.location.replace('tabPortfolio.php');
// 			}
// 		</script>";
// // echo ("<script type='text/javascript'>

// //         if (confirm('Are you sure you want to delete this?')) {
// //             //Make ajax call
// //             $.ajax({
// //                 url: 'scriptDelete.php',
// //                 type: 'GET',
// //                 dataType: 'html', 
// //                 success: function() {
// //                     alert('It was succesfully deleted!');
// //                 }
// //             });
// //         }
// // </script>");
//                 // data: {id : 5},
//     // function confirmDelete() {
//     // }

	// $objdb->delete_portfolio($_GET['delete_id']);
	// if ($objdb== true) 
	// {
		// echo "<script type='text/javascript'>
		// 		var answer = confirm('Do you really need to delete ?');
		// 		if (answer){
		// 			window.location.replace('tabPortfolio.php');
		// 		}
		// 	</script>";
	// }

// if (isset($_GET['edit_id'])) 
// {
// 	$_SESSION['editid']=$_GET['edit_id'];
// 	header("location:editPortfolio.php");
// }
?>
