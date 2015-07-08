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
				<img src="img/logo-go.png" alt="Psybo Logo">
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
					<div class="about-content">
						<h3>Responsive Design</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos quas pariatur sit, consequuntur reiciendis necessitatibus. Quod et unde doloremque praesentium incidunt suscipit sunt totam earum officiis! Deserunt consequatur ipsam iure.</p>
					</div>
					<div class="about-img">
						<img src="img/design.png" alt="">
					</div>
					<div class="about-img">
						<img src="img/design.png" alt="">
					</div>
					<div class="about-content">
						<h3>Responsive Design</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos quas pariatur sit, consequuntur reiciendis necessitatibus. Quod et unde doloremque praesentium incidunt suscipit sunt totam earum officiis! Deserunt consequatur ipsam iure.</p>
					</div>
				</div>
				<div class="about-skill">
					<h2>Skills</h2>
					<div class="skill-meter">
						<div class="words">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum mollitia quod dolorem! Dolores recusandae nam cumque error, ipsa corrupti, cum et, reiciendis amet molestias sunt nobis eum laborum! Tempora, laborum?</p>
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
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt tempore earum odit enim pariatur consequuntur! Sunt eos deleniti facilis consectetur earum nostrum veniam blanditiis similique enim unde libero quos, sequi.</p>
					</li>
					<li>
						<img src="img/web-dev.png" alt="">
						<h4>WEB PROGRAMMING</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam laboriosam deserunt sed, voluptatum iusto dolorum alias officiis quo incidunt, neque a veritatis consectetur delectus culpa corrupti nihil voluptatibus iste, saepe.</p>
					</li>
					<li>
						<img src="img/web4.png" alt="">
						<h4>RESPONSIVE DISPLAY</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis dolore amet voluptatum enim perspiciatis quae quaerat voluptatem nostrum maiores, eligendi, deserunt dolorum doloribus quasi omnis quod ullam facilis, odio nihil.</p>
					</li>
					<li>
						<img src="img/pencil.png" alt="">
						<h4>PIXEL PERFECTION</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis beatae dignissimos perspiciatis, dolores, quidem, numquam voluptas omnis, ipsam aliquid facilis cupiditate esse expedita? Autem commodi soluta unde atque, quisquam at.</p>
					</li>
					<li>
						<img src="img/inspiration.png" alt="">
						<h4>CREATIVE DIRECTION</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam placeat, quos deserunt ipsa! Beatae mollitia hic, accusamus blanditiis cupiditate impedit optio aspernatur distinctio quae perspiciatis! Minus qui voluptates quam modi.</p>
					</li>
					<li>
						<img src="img/headphones.png" alt="">
						<h4>24/7 SUPPORT</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id accusantium quibusdam fuga dolorum provident dolor maiores, unde alias distinctio cum mollitia fugit nulla. Consequuntur recusandae minima exercitationem magni culpa, obcaecati.</p>
					</li>
				</ul>
			</div>
		</section>
		<section class="testimonial">
			<div class="container">
				<h2>TESTIMONIAL</h2>
				<div class="test-details">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ducimus voluptatibus repellendus neque distinctio animi consequatur, maiores fuga mollitia. Impedit quibusdam pariatur, reiciendis cum reprehenderit, porro esse optio id at.</p>
				</div>
			</div>
		</section>
		<section class="contact">
			<div class="map"></div>
			<div class="message">
				<div class="container">
					<h3>CONTACT</h3>
					<form id="message-form" class="msg-form" action="post">Name
						<input type="text" class="name">Email
						<input type="text" class="mail">Comments
						<textarea name="comments" id="comments" cols="30" rows="10" class="msg"></textarea>
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
						<a class="facebook" href="#"></a>
					</li>
					<li>
						<a class="twitter" href="#"></a>
					</li>
					<li>
						<a class="linkedin" href="#"></a>
					</li>
					<li>
						<a class="gplus" href="#"></a>
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
