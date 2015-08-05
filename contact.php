
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
	<title>CONTACT US</title>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/theme.css">
	<script type="text/javascript">
		function init_map(){
			var myOptions = {
				zoom:18,
				center:new google.maps.LatLng(11.120228, 76.120368),
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			map = new google.maps.Map(document.getElementById("gmap-canvas"), myOptions);
			marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(11.120228, 76.120368)});
			// infowindow = new google.maps.InfoWindow({content:"<b>psybo technologies</b><br/>manjeri<br/> India" });
			google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});
			infowindow.open(map,marker);
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
		<div class="map-box">
		<div id="gmap-canvas" class="map-canvas"></div>
		</div>
	</section>
	<div class="container">
		<section class="contact">
			<div class="message">
				<h3>Get In Touch</h3>
				<form id="message-form" class="msg-form" method="POST" action="">
					<!-- <label for="msgName">Name</label> -->
					<br>
					<input id="msgName" name="msgName" type="text" placeholder="Name" required>
					<!-- <label for="msgEmail">Email</label> -->
					<br>
					<input id="msgEmail" name="msgEmail" type="email" placeholder="Email" required>
					<!-- <label for="msgComments">Comments</label> -->
					<br>
					<textarea id="msgComments" name="comments" cols="30" rows="5" placeholder="Comments" required></textarea>
					<button id="buttonmail" name="buttonmail">SEND</button>
				</form>
			</div>
		</section>
		<!-- <section>
			<div class="company-details">
				<div class="detail-box">
					<h3>Contact Info</h3>
					<div class="company-adress">
						<ul>
							<li>
								<p><b>Address :</b></p>
							</li>
							<li>
								<p>V2 Tower</p>
								<p>Opposit Old Bus Stand,</p>
								<p>Pandikkad Road</p>
								<p>Manjeri</p>
							</li>
						</ul>
						<ul>
							<li>
								<p><b>Phone :</b></p>
							</li>
							<li>
								<p>+04932-222222</p>
							</li>
						</ul>
						<ul>
							<li>
								<p><b>Email :</b></p>
							</li>
							<li>
								<p>info@psybotechnologies.com</p>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section> -->
	</div>
	<?php  
		echo $message;
		include 'footer.php';
	?>
</body>
</html>
