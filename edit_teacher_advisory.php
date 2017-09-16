<?php


	require "conn.php";

	$id = validate($_POST['id']);

	$query1 = "SELECT * FROM tblteacheradvisory WHERE id = $id";
	$result1 = mysqli_query($con, $query1);

	$teacherid = 0;
	$classid = 0;
	$subjectid = 0;

	while($row = mysqli_fetch_array($result1))
	{
		$teacherid = $row['teacherid'];
		$classid = $row['classid'];
		$subjectid = $row['subjectid'];
	}

	echo $teacherid . "," . $classid . "," . $subjectid;



?>