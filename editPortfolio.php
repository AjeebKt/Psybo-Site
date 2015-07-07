<?php 
	include 'dash.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>edit Portfolio</title>
</head>
<body>
	<section>
		<form id="formPortfolio" name="formPortfolio" method="POST" action="">
			<div id="tabPortfolio" class="tab-portfolio">
			<h3>EDIT PORTFLIO</h3>
				<div class="div-align">
					<label>Title</label><br>
					<input name="txtTitle" type="text">
				</div>
				<div class="div-align">
					<label>Link</label><br>
					<input name="txtLink" type="text">
				</div>
				<div class="div-align left">
					<label>Description</label><br>
					<textarea name="portfolioDescription" id="portfolioDescription" cols="40" rows="2"></textarea><br>
				</div>
				<div class="div-align">
					<label>Portfolio Image</label><br>
					<input name="uploadPortfolio" type="file" class="up"><br>
				</div>
				<button class="submit" name="btnPortfolioSubmit">Submit</button>
				<button name="btnReset" class="reset">Reset</button>
			</div>
		</form>
	</section>
</body>
</html>