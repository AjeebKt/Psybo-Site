
<?php 
error_reporting(0);

if (isset($_POST['buttonmail']) )
	// and isset($_POST['msgName']) and isset($_POST['msgEmail']) and isset($_POST['comments']))
{

	if ( filter_var($_POST['msgEmail'] , FILTER_VALIDATE_EMAIL))
	{
		$to="pnoushid@gmail.com";
		$from = $_POST['msgEmail'];
		$name = $_POST['msgName'];
		$subject="comments from : ".$name;
		$message = "Comment from  :  ".$from."\r\n";
		$message.=$_POST['comments'];
		$message=wordwrap($message,70,"<br>");
		$message=str_replace("\n.","\n..",$message);
		$headers='From: info@psybotechnologies.com';
		$mail=mail($to, $subject, $message , $headers);
		if ($mail==true)
		{
			$message="<script type='text/javascript'>	
						alert('comment has been sent');
						</script>";
		}

		else
		{
			$message= "<script type='text/javascript'>
					alert('Comments are not send at this time!.thanks');
				</script>";
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/theme.css">
	<title>CONTACT US</title>
</head>
<body>
<!-- Logo -->
	<header>
		<div class="container">
			<div class="logo">
				<a href="index.php"><img src="img/logo.png" alt="Psybo Logo"></a>
			</div>
			<nav class="nav-menu">
				<ul class="navigation-links">
					<li><a href="index.php">HOME</a></li>
					<li><a href="portfolio.php">PORTFOLIO</a></li>
					<li><a href="team.php">TEAM</a></li>
					<li><a href="service.php">SERVICE</a></li>
					<li><a href="about.php">ABOUT</a></li>
					<li class="active"><a href="contact.php">CONTACT</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<section class="map">
		<div>
			<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
			<div style="overflow:hidden;height:420px;width:1550px;">
				<div id="gmap_canvas" style="height:420px;width:1550px;"></div>
			<style>#gmap_canvas img{max-width:none!important;background:none!important;}</style><a class="google-map-code" href="http://wpzio.com" id="get-map-data">http://wpzio.com</a></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:17,center:new google.maps.LatLng(11.1202984,76.11996769999996),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(11.1202984, 76.11996769999996)});infowindow = new google.maps.InfoWindow({content:"<b>psybo technologies</b><br/>manjeri<br/> India" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
		</div>
	</section>
	<div class="container">
		<section class="contact">
			<div class="message">
				<h3>Message</h3>
				<form id="message-form" class="msg-form" method="POST" action="">
					<label for="msgName">Name</label>
					<br>
					<input id="msgName" name="msgName" type="text" class="name" required>
					<label for="msgEmail">Email</label>
					<br>
					<input id="msgEmail" name="msgEmail" type="email" class="mail" required>
					<label for="msgComments">Comments</label>
					<br>
					<textarea id="msgComments" name="comments" cols="30" rows="5" class="msg" required></textarea>
					<button id="buttonmail" name="buttonmail">SEND</button>
				</form>
			</div>
		</section>
	</div>
	<?php  
		echo $message;
		include 'footer.php';
	?>
</body>
</html>
