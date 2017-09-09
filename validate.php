<?php

	require "conn.php";

	if(isset($_POST['btnSubmit']))
	{
		$username = validate($_POST['txtUsername']);
		$password = validate($_POST['txtPassword']);

		$query = "SELECT * FROM usertbl WHERE username = '$username' AND password = '$password'";
		$result = mysqli_query($con, $query);
		$num_rows = mysqli_num_rows($result);
	

		if($num_rows > 0)
		{
				
			$userType = "";	
			while($row = mysqli_fetch_array($result))
			{
				$userType = $row["usertype"];
			}

			if($userType === "admin")
			{
				header("LOCATION: admin_dashboard.php");
			}
			else if($userType === "teacher")
			{
				header("LOCATION: teacher_dashboard.php");
			}
			else
			{
				header("LOCATION: student_dashboard.php");
			}
		}
	}


?>