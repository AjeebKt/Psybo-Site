<?php 
	// error_reporting(1);
	include_once 'Database.php';
	$objdb = new Database('localhost', 'root', 'asd', 'psybo-db');
	$resultCmpDtls = $objdb->select('company_details', array(), array());;
	foreach ($resultCmpDtls[0] as $key => $value) 
	{
		if ($key == 'address_id' and is_string($key)) 
		{
			$address_id = $value;
		}
	}
$resultCmpAdd = $objdb->select('address', array(), array('id', $address_id));
// var_dump($resultCmpAdd);
?>
<footer>
	<div class="container overflow-hd">
		<div class="company-adress">
			<ul>
				<li>
					<p>Address : V2 Tower, Opposit Old Bus Stand, Pandikkad Road, Manjeri</p>
					<!-- <p>Address :
						<?php foreach ($resultCmpAdd[0] as $key => $value) 
							{
								 if ($key == 'address' and is_string($key)) 
								 {
									echo $value;
								 }
							} 
						?>
					</p> -->
					<p>Place : Manjeri</p>
				</li>
				<li>
					<p>Phone: +04932-222222</p>
					<!-- <p>Mobile :
						<?php 
							foreach ($resultCmpAdd[0] as $key => $value) 
							{
								 if ($key == 'mobile' and is_string($key)) 
								 {
									echo $value;
								 }
							} 
						 ?> 
					</p> -->
					<p>Email: info@psybotechnologies.com</p>
					<!-- <p>Email: 
						<?php 
							foreach ($resultCmpAdd[0] as $key => $value) 
							{
								 if ($key == 'email' and is_string($key)) 
								 {
									echo $value;
								 }
							}
						 ?>
					</p> -->
				</li>
			</ul>
			<div class="social-box">
				<ul class="social-links">
					<li>
						<!-- <a class="facebook" href="https://www.facebook.com/psybotechnologies" target="_blank"></a> -->
						<a class="facebook" href=<?php foreach ($resultCmpAdd[0] as $key => $value) 
								{
									 if ($key == 'fb' and is_string($key)) 
									 {
										echo "\"".$value."\"";
									 }
								} ?> target="_blank">
						</a>
					</li>
					<li>
						<!-- <a class="twitter" href="https://twitter.com/psybotech" target="_blank"></a> -->
						<a class="twitter" href=<?php foreach ($resultCmpAdd[0] as $key => $value) 
								{
									if ($key == 'twiter' and is_string($key)) 
									{
										echo "\"".$value."\"";
									}
								} 
									?> target="_blank">
						</a>
					</li>
					<li>
						<!-- <a class="linkedin" href="https://www.linkedin.com" target="_blank"></a> -->
						<a class="linkedin" href= <?php foreach ($resultCmpAdd[0] as $key => $value) 
								{
									 if ($key == 'linkedin' and is_string($key)) 
									 {
										echo "\"".$value."\"";
									 }
								}?>target="_blank"></a>
					</li>
					<li>
						<!-- <a class="gplus" href="https://plus.google.com/u/0/" target="_blank"></a> -->
						<a class="gplus" href=<?php foreach ($resultCmpAdd[0] as $key => $value) 
								{
									 if ($key == 'google_plus' and is_string($key)) 
									 {
										echo "\"".$value."\""; 
										}
									}?> target="_blank"></a>
					</li>
				</ul>
			</div>	
		</div>
		<div class="footer-details">
			<div class="site-details">
				<p>All Rights Recieved @ PSYBO Technologies PVT.LTD</p>
				<p>PSYBO Technologies <?php echo(date("Y")); ?></p>
			</div>
		</div>
	</div>
</footer>
