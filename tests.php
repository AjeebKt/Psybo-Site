<?php
 require_once '/var/www/psybo_site/Psybo-Site/Database.php';
 require_once "/var/www/psybo_site/Psybo-Site/file.php";
 $objdb=new Database('localhost','root','asd','psybo-db');
 $objfile=new File();

/*$id=1;
$result=$objdb->select_row_emp($id);
echo "result";
var_dump($result);
$tst=$objdb->num_row();
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
$text = str_replace("\n.", "\n..", $str);
// echo $text;
$from=" pnoushid@gmail.com";
$headers='From:'.$from."\r\n";
var_dump($headers);

?>