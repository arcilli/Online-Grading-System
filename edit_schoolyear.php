<?php
	require "conn.php";

	if(isset($_POST['btnAddSchoolYear']))
	{

		$id = $_POST['school_year_id'];
		$school_year = validate($_POST['txtSchoolYear']);

		$crud->update("tblschoolyear", array("id", "schoolyear"), array($id, $school_year));
		
		echo "<script>alert('Saved.');</script>";
		echo "<script>(function(){ window.location.href='school_year.php'; })()</script>";

	}
?>