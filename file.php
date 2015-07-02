<?php 
	class File
	{
		public function list_files($directory)//its return the result an array.
		{
		
			$a=scandir($directory);
			unset($a[0],$a[1]);
			return $a;
		}

		public function count($d)
		{
			
			$count=count($d);
			echo $count;
		}

		public function read() //Read the contents of file 
		{	
			$directory="/var/www/html/mymoney/upload/Database.php";
			$file=fopen('sd$directory',"r") or die("unable to open file");
			while (!feof($file)) 
			{
				
				print(fgets($file));	
			}
			fclose($file);
		}

		public function upload($target_dir) //Upload a file 
		{	
			if (isset($_POST["submit"])) 
			{
			
				// $target_dir="/var/www/html/mymoney/upload/";
				$target_file=$target_dir."/".basename($_FILES["fileToUpload"]["name"]);
				
				$filetype=pathinfo("target_file",PATHINFO_EXTENSION);
				// echo $target_file;  
				if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file))
				{	
					chmod($_FILES["fileToUpload"],777);
					echo "file is valid and was successfully uploaded";
				}
				else
				{
					echo "upload failed";
				}
/*
				echo "</p>";
				echo '<pre>';
				echo 'Here is some more debugging info:';
				print_r($_FILES);//print the details of files
				print "</pre>";
*/
			}
		}
		public function download($file_path)//download a file argument:destination of file
		{

			if (file_exists($file_path)) 
			{
				header('content-type :application/octet-stream');//forces to browser to download file
				header('content-disposition: attachment; filename="'.basename($file_path).'"');//send the file name to  save it may be different from origin file
				header('content-length:'.filesize($file_path) );//send the file size header to browser
				readfile($file);
			}
			else
				return false;
		}

		public function view_image($actdir)
		{

			// $actdir="/upload-image/";

			$dir=getcwd().$actdir;
			
			$images=glob($dir."*.jpg");
			// var_dump($dir);
			$arr_image=array();
			foreach($images as $image) 
			{	
				$image=$actdir.(basename($image));
				array_push($arr_image,$image);
			}
				// var_dump($arr_image);
			return $arr_image;
		}
	}
	// $obj1=new file();
	// $directory="/var/www/psybo_site/Psybo-Site/photo_employee";
	// $result=$obj1->list_files($directory);
	// var_dump($result);
?>

