<?php
 require_once '/var/www/psybo_site/psybo/Psybo-Site/Database.php';
 require_once "/var/www/psybo_site/psybo/Psybo-Site/file.php";
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


$string = "a.<>=bc  123vj$%^&*--";
$regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$%^&]).*$/";
// if ( preg_match($regex, $string)) 
// {
// var_dump("succes");
// }
var_dump("befor strip :  ".$string);

// var_dump( preg_match($regex, $string));	
$string=strip_tags($string);
echo "after strip  ".$string."<br>";
$string = preg_replace('/[^A-Za-z0-9\s.]/','',$string); 
var_dump("after preg rplc  :  ".$string);
echo $string = str_replace( array( '-', '.' ), '', $string);


$pass="abc1";

$ucl = preg_match('/[A-Z]/', $pass); // Uppercase Letter
$lcl = preg_match('/[a-z]/', $pass); // Lowercase Letter
$dig = preg_match('/\d/', $pass); // Numeral
$nos = preg_match('/\W/', $pass); // Non-alpha/num characters (allows underscore)

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
if($lcl and $dig and !$nos){
    echo "<br>All Four Pass!!!";

} else {
    echo "<br>Failure...";
}


?>