<?php 
	$to="pnoushid@gmail.com";
	$from = "ajeebkt@gmail.com";
	$name = "Ajeeb";
	$subject="comments from ".$name;
	$message="test mail";
	// $message=wordwrap($message,70,"<br>");
	// $message=str_replace("\n.","\n..",$message);
	$headers='From:'.$from."\r\n";
	mail($to, $subject, $message,$headers);
	// if ($mail==TRUE)
	// 	echo"comment has been sent";
	// else
	// 	echo "commet not send at this time";
 ?>