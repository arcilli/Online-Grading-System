<!DOCTYPE HTML>
<html>
<head>
	<title>Online Grading System - Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php include "inc/navbar.php"; ?>
</head> 
<body>
	<div class="error_page">
		<div class="error-top">
			<h2 class="inner-tittle page">Online Grading System</h2>
			<div class="login">
				<h3 class="inner-tittle t-inner">Login</h3>
				<form action="validate.php" method="post">
					<input type="text" class="text" name="txtUsername" placeholder="Username" >
					<input type="password" name="txtPassword"  placeholder="Password">
					<div class="submit"><input type="submit" name="btnSubmit"  value="Login" ></div>
					<div class="clearfix"></div>

					<div class="new">
						<p><label class="checkbox11"><input type="checkbox" name="checkbox"><i> </i>Forgot Password ?</label></p>
						<div class="clearfix"></div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="footer">
		<footer>
		<p style="color:#fff;padding-right:200px;">&copy 2017 Online Grading System . All Rights Reserved</p>
		</footer>
	</div>

	<?php include "inc/script.php"; ?>
</body>
</html>