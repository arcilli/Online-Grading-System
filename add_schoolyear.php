<?php

	require "conn.php";


	if(isset($_POST['btnAddSchoolYear']))
	{

		$school_year = validate($_POST['txtSchoolYear']);

		$crud->insert("tblschoolyear", array("schoolyear"), array($school_year));

		echo "<script>alert('School Year added.');</script>";
		echo "<script>(function(){ window.location.href='school_year.php'; })()</script>";


	}







?>