
<?php 
error_reporting(E_ALL);
include 'Database.php';
// $objdb=new Database('psybotechnologies.com','psyboysg_test','psybotest','psyboysg_psybo-db');
$objdb=new Database('localhost','root','asd','psybo-db');
$resultContact = $objdb->select('headings', [], ['name', 'contact']);
$message = "";
if (isset($_POST['buttonmail']) )
{
	if ( filter_var($_POST['msgEmail'] , FILTER_VALIDATE_EMAIL))
	{
		$to="psybotechnologies@gmail.com";
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
	<title>CONTACT US</title>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/theme.css">
	<link rel="stylesheet" href="css/responsive.css">
	<script>
			var marker = new google.maps.Marker ({
				position: center,
				map: map,
			});
	</script>
	<script type="text/javascript">
		function init_map(){
			var myOptions = {
				zoom:18,
				center:new google.maps.LatLng(11.120228, 76.120368),
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				scrollwheel: false,
				flat:true,
			};
			
			map = new google.maps.Map(document.getElementById("gmap-canvas"), myOptions);
			marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(11.120228, 76.120368),
			});
			marker.setIcon('./img/123.png');
		}
			google.maps.event.addDomListener(window, 'load', init_map);
	</script>
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
					<!-- <li><a href="portfolio.php">PORTFOLIO</a></li> -->
					<li><a href="service.php">SERVICE</a></li>
					<li><a href="team.php">TEAM</a></li>
					<li><a href="about.php">ABOUT</a></li>
					<li class="active"><a href="contact.php">CONTACT</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<section class="map">
		<!-- <img src="img/map.png" alt=""> -->
		<div id="gmap-canvas" class="map-canvas"></div>
	</section>
	<section class="contact">
		<div class="container">
			<div class="message">
				<div class="message-box">
					<h3>
						<?php foreach ($resultContact[0] as $key => $value) {
							if (is_string($key) and $key == 'title') {
								echo $value;
							}
						} ?>
					</h3>
					<p>
						<?php foreach ($resultContact[0] as $key => $value) {
							if (is_string($key) and $key == 'description') {
								echo $value;
							}
						} ?>
					</p>
					<form id="message-form" class="msg-form" method="POST" action="">
						<br>
						<input id="msgName" name="msgName" type="text" placeholder="Name" required>
						<br>
						<input id="msgEmail" name="msgEmail" type="email" placeholder="Email" required>
						<br>
						<textarea id="msgComments" name="comments" cols="30" rows="5" placeholder="Comments" required></textarea>
						<button id="buttonmail" name="buttonmail">SEND</button>
					</form>
				</div>
			</div>
		</div>
	</section>
	<?php  
		echo $message;
		include 'footer.php';
	?>
</body>
</html>
