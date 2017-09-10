<!DOCTYPE HTML>
<html>
<head>
	<title>Online Grading System - Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php include "inc/navbar.php"; ?>
	<style type="text/css">
		h2#page-title{
			font-size: 2em;
			font-weight: 400;
			color: #fff;
			margin-top: -100px;
			margin-bottom:60px;
			text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.4);
		}
	</style>
</head> 
<?php 
include "conn.php";
session_start();
if(!empty($_SESSION['username']))
{
	if (isset($_SESSION['username'])) 
	{
		$username = $_SESSION['username'];
	} else {
		header("Location: index.php");
	}
	$query = "SELECT * FROM usertbl WHERE username = '$username'";
	$result = mysqli_query($con, $query)or die(mysqli_error($con));
	$row = mysqli_fetch_array($result);
	$userType = $row["usertype"];
	if($userType === "admin") {
		header("LOCATION: admin_dashboard.php");
	} else if($userType === "teacher") {
		header("LOCATION: teacher_dashboard.php");
	} else if($userType === "student") {
		header("LOCATION: student_dashboard.php");
	}
}
?>
<body>
	<div class="error_page">
		<div class="error-top">
			<h2 id="page-title">Online Grading System</h2>
			<div class="login">
				<h3 class="inner-tittle t-inner">Login Page</h3>
				<form action="validate.php" method="post">
					<input type="text" class="text" name="txtUsername" placeholder="Username" >
					<input type="password" name="txtPassword"  placeholder="Password">
					<div class="submit"><input type="submit" name="btnSubmit"  value="Login" ></div>
					<div class="clearfix"></div>
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