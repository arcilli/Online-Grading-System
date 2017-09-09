<?php

	require "conn.php";


	if(isset($_POST['btnAddClass']))
	{
		$class_name = validate($_POST['txtClassName']);
		$school_year = validate($_POST['cboSchoolYear']);
		$year_level = validate($_POST['cboYearLevel']);

		$query = "SELECT id FROM tblschoolyear WHERE schoolyear = '$school_year'";
		$result = mysqli_query($con, $query);

		$school_year_id = 0;
		$year_level_id = 0;

		while($row = mysqli_fetch_array($result))
		{
			$school_year_id = $row['id'];
		}


		$query2 = "SELECT id FROM tblyearlevel WHERE yearlevel = '$year_level'";
		$result2 = mysqli_query($con, $query2);

		while($row = mysqli_fetch_array($result2))
		{
			$year_level_id = $row['id'];
		}


		$crud->insert("tblclass", array("classname", "schoolyearid", "yearlevelid"), array($class_name, $school_year_id, $year_level_id));

		echo "<script>alert('Class added.');</script>";
		echo "<script>(function(){ window.location.href='class.php'; })()</script>";




	}










?>