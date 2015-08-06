<html>
<body>
<?php
 require_once '/var/www/psybo_site/psybo/Psybo-Site/Database.php';
 require_once "/var/www/psybo_site/psybo/Psybo-Site/file.php";
 $objdb=new Database('localhost','root','asd','psybo-db');
 $objfile=new File();
 // $result=$objdb->select("admin",array(),array("id",1));
 // var_dump($result);
 // foreach ($result as $key => $value) {
 // 	foreach ($value as $key => $value) {
 // 		if (is_string($key) and $key=="username") {
 // 		echo $value."<br>";
 // 			# code...
 // 		}
 // 	}
 // }

// $id=1;
// $result=$objdb->select_row_emp($id);
// echo "result";
// var_dump($result);
/*$tst=$objdb->num_row();
echo "tst";
var_dump($tst);	
var_dump($tst[0]);
echo $tst[0][0];
echo $tst[1][0];	*/
// $actdir="/upload-image/";
// $test=$objfile->view_image($actdir);
// $tes=$objdb->num_row_ptf(1);
// // var_dump($tes);	
// // echo(count($tes));
// echo $tes[0][0];
// $result=$objdb->select_row_ptf($tes[0][0]);
// var_dump($result);
// foreach ($result as $key => $value) {
// 	echo $key;
// 	if (is_string($key) and $key=='name') {
// 		var_dump($value);
// 	}
	
// }
// echo (count($tst));
// $result=$objdb->select_row();
// var_dump($result); 
// foreach ($result as $key => $value) {
// 	if (is_string($key) and $key=='name') {
		
// 		echo $value;
// 	}
// }
// $actdir="/upload-image/";
// $image=$objfile->view_image($actdir);
// var_dump($image);
// echo '<img src="'.$image.'" /><br />';	

// echo "pleas \"hvg\"ghff";

// $number=array(1,2,3);
// $letters=array("a","b","c");

// foreach ($number as $num) {
// 	foreach ($letters as $char) {
// 		if($char=="b")
// 			break;
// 		echo $char;
// 	}
// 	echo $num;
// }
// var_dump($letters);
// foreach ($letters as $value) 
// {
// 	$letters[$key]="s";
// }
// var_dump($letters);

// for ($i=0; $i < 3; $i++) { 
	
// 	if (i!=2) {
// 	}
// }
$str=".lorumips omis .dummi.text.it mostu sage for webdevelpors ";
// $str=wordwrap($str,5,"<br>");
// echo (wordwrap($str,15,"<br>"));
// $text = str_replace("\n.", "\n..", $str);
// // echo $text;
// $from=" pnoushid@gmail.com";
// $headers='From:'.$from."\r\n";
// $objdb->test();
// $objdb->num_row_ptf();
// $test="jbkj";
// $objdb->test();
// $arr1=array(1,2,3);
// var_dump($arr1);
// $arr1=array_splice($arr1, 0	,1,2);
// var_dump($arr1);
// $str=array(1,'key1' => 2);
// $key='aa';
// $str.=$str[$key]["gooo"];
// var_dump($str);	

	// $url = "http://www.w3schools.com";

	// if (filter_var($url, FILTER_VALIDATE_URL)) {
	//     echo("$url is a valid URL");
	// } else {
	//     echo("$url is not a valid URL");
	// }
	// filter_var($url, FILTER_SANITIZE_URL);
	// var_dump($url);
	// var_dump(rand());
	// $str="is dummy.tst";
	// $str=filter_var($str,FILTER_SANITIZE_ENCODED);
	// // echo $str; 
	// $str=str_replace("%20", " 	", $str);
	// echo $str;
	


// $string = '`~!@#$%^&^&*()_+{}[]|\/;:"< >,.?-<h1>You .</h1><p> text</p>'."'";
// $string="hjbkjh";
// // var_dump($string);
// $string=strip_tags($string,"");
// $string = 'foo';


// $string = "a.<>=bc  123vj$%^&*--";
// $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$%^&]).*$/";
// // if ( preg_match($regex, $string)) 
// // {
// // var_dump("succes");
// // }
// var_dump("befor strip :  ".$string);

// // var_dump( preg_match($regex, $string));	
// $string=strip_tags($string);
// echo "after strip  ".$string."<br>";
// $string = preg_replace('/[^A-Za-z0-9\s.]/','',$string); 
// var_dump("after preg rplc  :  ".$string);
// echo $string = str_replace( array( '-', '.' ), '', $string);

///////////////////////PASSWORD//////////////////////////
					// $pass="abc1";

					// $ucl = preg_match('/[A-Z]/', $pass); // Uppercase Letter
					// $lcl = preg_match('/[a-z]/', $pass); // Lowercase Letter
					// $dig = preg_match('/\d/', $pass); // Numeral
					// $nos = preg_match('/\W/', $pass); // Non-alpha/num characters (allows underscore)

					// if($ucl) {
					//     echo "Contains upper case!<br>";
					// }

					// if($lcl) {
					//     echo "Contains lower case!<br>";
					// }

					// if($dig) {
					//     echo "Contains a numeral!<br>";
					// }

					// // I negated this if you want to dis-allow non-alphas/num:
					// if(!$nos) {
					//     echo "Contains no Symbols!<br>"; 
					// }

					// if ($ucl && $lcl && $dig && !$nos) { // Negated on $nos here as well
					// if($lcl and $dig and !$nos){
					//     echo "<br>All Four Pass!!!";

					// } else {
					//     echo "<br>Failure...";
					// }
///////////////////////////////////////////////////////////////////////////////
// $str1="dfghjkl!@#$%^&*34567890;";
// // $str1=strip_tags($str1);
// // 	preg_replace('/[^A-Za-z0-9\s.]/', '', $str1);
// if(preg_match('/[^A-Za-z0-9\s.]/', '', $str1))
// 	echo "string";


// echo strrchr("Hello world!",101);
// $url="://www.google.net";
// if ( filter_var($url,FILTER_VALIDATE_URL) )
// {
// 	echo "is url";
// }
// else
// 	echo "is not url";

// $url1 = preg_replace(
//   '#((https?|ftp)://(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)#i',
//   "'<a href=\"$1\" target=\"_blank\">$3</a>$4'",
//   $url
// );
// echo $url;

///////////////////////////URL STRONG VALIDATION///////////////////// 
			// $preg = "/^(http(s?):\/\/)?(www\.)+[a-zA-Z0-9\.\-\_]+(\.[a-zA-Z]{2,3})+(\/[a-zA-Z0-9\_\-\s\.\/\?\%\#\&\=]*)?$/";
			//             if(preg_match($preg, 'http://www.google.net') == False)
			//             {
			//              var_dump('URL is not valid.');
			//             }
			//             else
			//             	echo "url is valid";
// ///////////////////////////////////
// // $str="dummy text dummy text .&^<>dummy text dummy text dummy text dummy text ";
// // if(preg_match(  '/[^A-Za-z0-9\d\.\ ]/',$str))
// // 	echo "is correct";
// // else
// 	echo "not string";

			/////////////////////STRING VALIDATION/////////
			// $yourString = "blahbhhl kjjkha.,h";
			// if (preg_match('/^[A-Za-z0-9., _-]*$/', $yourString)) {
			//     echo "your string is good";
			// }
			// else
			// 	echo "string is not good";

/////////////////////////////////////////////////

// $dir=getcwd()."/upload-image/";
// unlink($dir."aaaaa.jpg");
// $pass=crypt("admin");
// var_dump($pass);

//$pass1=md5("admin");

// var_dump($pass1);


// echo "sha-256      :     ".hash('sha256','admin')."<br>";
// echo "sha-512      :     ".hash('sha512','admin');

// $a=hash('sha256', 'aa');
// var_dump($a);
// $hash = password_hash("admin",PASSWORD_DEFUALT,['cost' =>12]);


/////////////////////////////  fghjklfghjk/////////////////////
// $dir    = '/home/noushi/Desktop/Untitled Folder 2';
// var_dump($dir);
// // var_dump($_POST['filenames'] );
// // if( $_SERVER['REQUEST_METHOD']  == 'POST' ) {
// //         if( isset( $_POST['filenames'] ) ) {
// //                 foreach( $_POST['filenames'] as $key => $file ) {
// //                         unlink( $dir . '\\' . $file );
// //                 }
// //                 echo 'Files deleted';
// //         }
// //         else {
// //                 echo 'No files selected';
// //         }
// // }
// unlink("/home/noushi/Desktop/Untitled Folder 2/road-sign-361513_640.jpg");
// $files1 = scandir($dir);
// var_dump($files1);
// // $cnt = count($files1);
// //var_dump($cnt);
// echo "<h1><u> delete files from directory </u></h1>";
// echo "<div class='container'>";
// echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
// // for($n=0; $n< $cnt; $n++)
// // var_dump($files1[3]);
// foreach ($files1 as $key => $value) 
// {
// 	if ( $value!= '.'  && $value != '..')
//     {

//     	print_r("<input name='filenames[]' value='".($value)."' type='checkbox' />".($value)."<br/> ");       
//     }
// }
// if( $_SERVER['REQUEST_METHOD']  == 'POST' ) 
// {
//     if( isset( $_POST['filenames'] ) ) 
//     {
//         foreach( $_POST['filenames'] as $key => $file )
//         {
//             $delet=unset($dir.$file );
//             if ($delet == true) 
//             {
//             	  echo 'Files deleted';
//             }
//             else
//             	echo "error";
//         }
          
//     }
//     else {
//             echo 'No files selected';
//         }
// }
// echo "</br>";
// echo "<input type='submit' value='Delete'>";
// echo "</form>";

// echo "</div>";

/////////////////////////////////////////////////////////////////
// https://plus.google.com/+AjeebKTajb/about
// $preg2 = "/^(http(s?):\/\/)?(www\.)+[a-zA-Z0-9\.\-\_]+(\.[a-zA-Z]{2,3})+(\/\+[a-zA-Z0-9\_\-\s\.\/\?\%\#\&\=]*)?$/";
// $preg1 = "/^(http(s?):\/\/(www.?))+[a-zA-Z0-9\.\-\_]+[a-zA-Z0-9\.\-\_]+(\.[a-zA-Z]{2,3})+(\+\/[a-zA-Z0-9\_\-\s\.\/\?\%\#\&\=])+(\/[a-zA-Z0-9\_\-\s\.\/\?\%\#\&\=]*)?$/";
// $preg = "/^((http(s?):\/\/)|www\.\.?)+[a-zA-Z0-9\.\-\_]+(\.[a-zA-Z]{2,3})+(\/\+[a-zA-Z0-9\_\-\s\.\/\?\%\#\&\=\+]*)?$/";
// "         (((https?)\:\/\/?)|www\.)"
 // $preg = "/^(http(s?):\/\/)?(www\.)+([a-zA-Z0-9\.\-\_]*)?$/";
// if(preg_match($preg, 'https://google.com/+AjeebKTajb/about') !=False )
// if(preg_match($preg, 'www.ihbjhn.linkedin.com/in/noushid') !=False )
// {
// 	echo "match";
// }
// else
// 	echo "canot match";
	// print_r($matches);

// var_dump(phpinfo());
//////////////////////////////////////////////////////////////////////////////
// echo 'hollow world<br>';

// echo 'test';
/////////////////////////////compress image///////////////////////////
// $name = ''; $type = ''; $size = ''; $error = ''; 
// function compress_image($source_url, $destination_url, $quality) 
// { 
// 	$info = getimagesize($source_url);

// 	if ($info['mime'] == 'image/jpeg') 
// 		$image = imagecreatefromjpeg($source_url);
// 	elseif ($info['mime'] == 'image/gif')
// 		$image = imagecreatefromgif($source_url);
// 	elseif ($info['mime'] == 'image/png')
// 		$image = imagecreatefrompng($source_url);

// 	// imagejpeg($image, $destination_url, $quality);
// 	return $destination_url;

// } 
// 	if ($_POST) 
// 	{ 
// 		if ($_FILES["file"]["error"] > 0) 
// 		{
// 			 $error = $_FILES["file"]["error"];
// 		} 
// 	else if (($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/pjpeg")) 
// 	{ 
// 		$url = 'destination .jpg';
// 		$filename = compress_image($_FILES["file"]["tmp_name"], $url, 80);
// 		$buffer = file_get_contents($url);
// 		echo $buffer;
// 		echo $filename;
// 		if(!move_uploaded_file($filename, getcwd().'/upload-image'))
// 		{
// 			echo "error";
// 			print_r($_FILES);
// 		}

// 		/* Force download dialog... */ 
// 		// header("Content-Type: application/force-download");
// 		// header("Content-Type: application/octet-stream");
// 		// header("Content-Type: application/download");

// 		/* Don't allow caching... */ 
// 		// header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

// 		/* Set data type, size and filename */ 
// 		// header("Content-Type: application/octet-stream");
// 		// header("Content-Transfer-Encoding: binary");
// 		// header("Content-Length: " . strlen($buffer));
// 		// header("Content-Disposition: attachment;
// 		// filename=$url");

// 		/* Send our file... */ 
// 		echo $buffer;
// 	}
// 	else 
// 	{
// 		$error = "Uploaded image should be jpg or gif or png";
// 	} 
// } 

//////////////////////////////////

// $info = array('coffee',  'caffeine');

// // Listing all the variables
// list($drink, $color, $power) = $info;
// echo "$drink is $color and $power makes it special.\n";
// var_dump($info);
// var_dump($power);
// Listing some of them
// list($drink, , $power) = $info;
// echo "$drink has $power.\n";

// // Or let's skip to only the third one
// list( , , $power) = $info;
// echo "I need $power!\n";

// // list() doesn't work with strings
// list($bar) = "abcde";
// var_dump($bar); // is_null(var)

$check=getimagesize(getcwd().'/test/watermark_Your_Natural_Beauty_wallpaper.jpg');
var_dump($check);
list($aaa) = $check;
var_dump($aaa);

?> 
	<html> 
	<head> 
		<title>Php code compress the image</title>
	</head> 
	<body> 
	<div class="message">
	<?php if($_POST['submit'])
	{ 
	 	if ($error) 
	 	{ 
	?> 
	<label class="error">
		<?php echo $error;
		?>
	</label> 
	<?php } } ?> 
	</div> 
	<fieldset class="well"> 
		<legend>Upload Image:</legend> 
		<form action="" name="myform" id="myform" method="post" enctype="multipart/form-data"> 
		<ul> 
			<li> 
				<label>Upload:</label> 
				<input type="file" name="file" id="file"/> 
			</li> 
			<li> 
				<input type="submit" name="submit" id="submit" value="upload" /> 
			</li> 
		</ul> 
		</form> 
	</fieldset> 
	</body> 
	</html>

