<?php 
	error_reporting(0);
	include_once 'Database.php';
	// $objdb = new Database('localhost', 'root', 'asd', 'psybo-db');
	$objdb = new Database('psybotechnologies.com','psyboysg_test','psybotest','psyboysg_psybo-db');
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
					<p>Address :<?php foreach ($resultCmpAdd[0] as $key => $value) 
							{
								 if ($key == 'address' and is_string($key)) 
								 {
									echo $value;
								 }
							} 
						?></p>
					<p><?php 
							foreach ($resultCmpAdd[0] as $key => $value) 
							{
								 if ($key == 'place' and is_string($key)) 
								 {
									echo $value;
								 }
							}
						 ?></p>
				</li>
				<li>
					<p>Mobile :<?php 
							foreach ($resultCmpAdd[0] as $key => $value) 
							{
								 if ($key == 'mobile' and is_string($key)) 
								 {
									echo $value;
								 }
							} 
						 ?></p>
					<p>Email:<?php 
							foreach ($resultCmpAdd[0] as $key => $value) 
							{
								 if ($key == 'email' and is_string($key)) 
								 {
									echo $value;
								 }
							}
						 ?></p>
				</li>
			</ul>
			<div class="social-box">
				<ul class="social-links">
					<li>
						<a class="facebook" href=<?php foreach ($resultCmpAdd[0] as $key => $value) 
								{
									 if ($key == 'fb' and is_string($key)) 
									 {
										echo "\"".$value."\"";
									 }
								} ?> target="_blank"></a>
					</li>
					<li>
						<a class="twitter" href=<?php foreach ($resultCmpAdd[0] as $key => $value) 
								{
									if ($key == 'twiter' and is_string($key)) 
									{
										echo "\"".$value."\"";
									}
								} 
									?> target="_blank"></a>
					</li>
					<li>
						<a class="linkedin" href= <?php foreach ($resultCmpAdd[0] as $key => $value) 
								{
									 if ($key == 'linkedin' and is_string($key)) 
									 {
										echo "\"".$value."\"";
									 }
								}?> target="_blank"></a>
					</li>
					<li>
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
