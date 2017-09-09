<?php

	require "conn.php";

	if(isset($_POST['btnAddYearLevel']))
	{
		$id = validate($_POST['year_level_id']);
		$year_level = validate($_POST['yearlevel']);
		$yearlevel_desc = validate($_POST['yearleveldesc']);

		$crud->update("tblyearlevel", array("id", "yearlevel", "description"), array($id, $year_level, $yearlevel_desc));

		echo "<script>alert('Saved.');</script>";
		echo "<script>(function(){ window.location.href='year_level.php'; })()</script>";

	}



?>