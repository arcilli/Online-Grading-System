<?php
require "conn.php";
session_start();

if(isset($_POST['txtUsername']) && isset($_POST['txtPassword']))
{
	$username = validate($_POST['txtUsername']);
	$password = validate($_POST['txtPassword']);

	echo $username, $password;
	$query = "SELECT * FROM usertbl WHERE username = '$username' AND password = '$password'";
	$result = mysqli_query($con, $query);
	$num_rows = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);

	if($num_rows > 0)
	{
		$userType = $row["usertype"];
		if($userType === "admin")
		{
			$_SESSION['username'] = $row['username'];
			header("LOCATION: admin_dashboard.php");
		}
		else if($userType === "teacher")
		{
			$_SESSION['username'] = $row['username'];
			header("LOCATION: teacher_dashboard.php");
		}
		else if($userType === "student")
		{
			$_SESSION['username'] = $row['username'];
			header("LOCATION: student_dashboard.php");
		}
	}else{
		?> <script> alert("Invalid password and username."); window.location = "index.php"; </script><?php
	}
}
?>