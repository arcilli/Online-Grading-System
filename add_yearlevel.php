<?php

	require "conn.php";

	if(isset($_POST['btnAddYearLevel']))
	{
		$year_level = validate($_POST['yearlevel']);
		$year_level_desc = validate($_POST['yearleveldesc']);

		$crud->insert("tblyearlevel", array("yearlevel", "description"), array($year_level, $year_level_desc));


		echo "<script>alert('Year Level added.');</script>";
		echo "<script>(function(){ window.location.href='year_level.php'; })()</script>";

	}


?>