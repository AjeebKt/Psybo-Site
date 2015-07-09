<?php 
if (isset($_POST['buttonmail']) and isset($_POST['txtname']) and isset($_POST['txtemail']) and isset($_POST['txtcomments']))
{

	$to="pnoushid@gmail.com";
	$from = $_POST['txtemail'];
	$name = $_POST['txtname'];
	$subject="comments from ".$name;
	$message=$_POST['txtcomments'];
	$message=wordwrap($message,70,"<br>");
	$message=str_replace("\n.","\n..",$message);
	$headers='From:'.$from."\r\n";
	$mail=mail($to, $subject, $message,$headers);
	if ($mail==TRUE)
		echo"comment has been sent";
	else
		echo "commet not send at this time";
}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/css.css">
	<title>PSYBO Home</title>
</head>
<body>
	<header>
		<div class="container">
			<div class="logo">
				<a href="index.php"><img src="img/logo-go.png" alt="Psybo Logo"></a>
			</div>
			<nav>
				<ul class="navigation-links">
					<li><a class="active" href="index.php">HOME</a></li>
					<li><a href="portfolio.php">PORTFOLIO</a></li>
					<li><a href="team.php">TEAM</a></li>
				</ul>
			</nav>
		</div>			
	</header>
		<section class="indroduction">
			<div class="bg-img">
				<div class="container">
					<h1>
						<span>WE PSYBO</span><br>
						<span>THE FINAL SOFTWARE DESTINATION</span>
					</h1>
				</div>
			</div>
		</section>
		<section class="about">
			<div class="container">
				<div class="about-us">
					<h2>ABOUT US</h2>
					<div class="center">
						<h3>Welcome to PSYBO Technologies</h3>
						<p>PSYBO Technologies provides web solutions & services to help customer reach to a wider customer base. The web is a new and different medium for communication.Our mature software development processes, combined with excellent infrastructure have significantly increased the “on-time and on-budget” delivery of software.</p>
					</div><br>
					<h3 class="center">Featured Services</h3>
					<div class="about-div">
						<div class="about-content">
							<h3>Responsive Design</h3>
							<p>Responsive web design (RWD) is an approach to web design aimed at crafting sites to provide an optimal viewing and interaction experience—easy reading and navigation with a minimum of resizing, panning, and scrolling—across a wide range of devices.</p>
						</div>
						<div class="about-img">
							<img src="img/design.png" alt="">
						</div>
					</div>
					<div class="about-div">
						<div class="about-img">
							<img src="img/cms.png" alt="">
						</div>
						<div class="about-content">
							<h3>Content Management System</h3>
							<p>A content management system (CMS) is a system used to manage the content of a Web site. Typically, a CMS consists of two elements: the content management application (CMA) and the content delivery application (CDA).</p>
						</div>
					</div>
				</div>
				<div class="about-skill">
					<h2>Skills</h2>
					<div class="skill-meter">
						<div class="words">
							<p>PSYBO TECHNOLOGIES is a young enterprise powered by young engineers with a goal of adding values. It is a company providing consultancy services and development in various domains like Software development, Web design and Web hosting, etc. Software development mainly concentrated in ERP, CRM and MIS in .Net Framwork 4.0 and J2EE. PSYBO TECHNOLOGIES provides web solutions & services to help customer reach to a wider customer base. The web is a new and different medium for communication and requires a different viewpoint and skill set to use it in the most effective way. PSYBO TECHNOGIES also provide Internship and On Job Training (OJT) for fresher’s software engineers to improve their skill and knowledge and get a good opportunity in IT industry.</p>
						</div>
						<div class="meter">
							<div class="about-skill">
								<label for="">ASP.NET</label>
								<div class="progress">
									<span class="percent" style="width: 88%;"></span>
									<span class="span">88%</span>
								</div>
							</div>
							<div class="about-skill">
								<label for="">PHP</label>
								<div class="progress">
									<span class="percent" style="width: 87%;"></span>
									<span class="span">87%</span>
								</div>
							</div>
							<div class="about-skill">
								<label for="">HTML</label>
								<div class="progress">
									<span class="percent" style="width: 93%;"></span>
									<span class="span">93%</span>
								</div>
							</div>
							<div class="about-skill">
								<label for="">CSS3</label>
								<div class="progress">
									<span class="percent" style="width: 90%;"></span>
									<span class="span">90%</span>
								</div>
							</div>
							<div class="about-skill">
								<label for="">JavaScript</label>
								<div class="progress">
									<span class="percent" style="width: 80%;"></span>
									<span class="span">80%</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="we-do">
			<div class="container">
				<h2>WE DO</h2>
				<ul class="service">
					<li>
						<img src="img/plugin.png" alt="">
						<h4>SOFTWARE DEVELOPMENT</h4>
						<p>We combine a broad managerial expert with the large pool of extremely qualified software professionals to provide its superior and cost effective service.</p>
					</li>
					<li>
						<img src="img/web-dev.png" alt="">
						<h4>WEB PROGRAMMING</h4>
						<p>We develop elegant and affordable web solutions that enable small to large businesses to establish visibility online, increase sales, and improve productivity.</p>
					</li>
					<li>
						<img src="img/web4.png" alt="">
						<h4>ON JOB TRAINING</h4>
						<p>It’s a dream come true for any job seeker eager to acquire training from individuals possessing skills mandatory for the desired job.</p>
					</li>
					<li>
						<img src="img/pencil.png" alt="">
						<h4>SOFTWARE CONSULTANCY</h4>
						<p>Our expert software consultants offer advice at every stage of your project to create the ideal foundation for growth and diversification online.</p>
					</li>
					<li>
						<img src="img/inspiration.png" alt="">
						<h4>ONLINE BUSINESS PORMOTION</h4>
						<p>Our expert software consultants offer advice at every stage of your project to create the ideal foundation for growth and diversification online.</p>
					</li>
					<li>
						<img src="img/headphones.png" alt="">
						<h4>24/7 SUPPORT</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id accusantium quibusdam fuga dolorum provident dolor maiores, unde alias distinctio cum mollitia fugit nulla. Consequuntur recusandae minima exercitationem magni culpa, obcaecati.</p>
					</li>
				</ul>
			</div>
		</section>
		<!-- <section class="testimonial">
			<div class="container">
				<h2>TESTIMONIAL</h2>
				<div class="test-details">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ducimus voluptatibus repellendus neque distinctio animi consequatur, maiores fuga mollitia. Impedit quibusdam pariatur, reiciendis cum reprehenderit, porro esse optio id at.</p>
				</div>
			</div>
		</section> -->
		<section class="contact">
			<div class="map"></div>
			<div class="message">
				<div class="container">
					<h3>CONTACT</h3>
					<form id="message-form" class="msg-form" action="post">Name
						<input type="text" class="name" required= "required">Email
						<input type="email" class="mail" required= "required">Comments
						<textarea name="comments" id="comments" cols="30" rows="10" class="msg" required= "required"></textarea>
						<button class="button" id="buttonmail" name="buttonmail">SEND</button>
					</form>
				</div>
			</div>
		</section>
	<footer>
		<div class="container">
			<div class="footer-details">
				<ul class="social-links">
					<li>
						<a class="facebook" href="https://www.facebook.com/psybotechnologies"></a>
					</li>
					<li>
						<a class="twitter" href="https://twitter.com/psybotech"></a>
					</li>
					<li>
						<a class="linkedin" href="#"></a>
					</li>
					<li>
						<a class="gplus" href="https://plus.google.com/u/0/"></a>
					</li>
				</ul>	
				<div class="site-details">
					<p>All Right Recieved @ PSYBO Technologies PVT.LTD</p>
					<p>PSYBO Technologies 2015</p>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>
