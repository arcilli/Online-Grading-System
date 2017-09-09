<?php

	require "CRUD.php";

	$crud = new CRUD("localhost", "root", "", "grading");
	$con = $crud->getConnection();

	function validate($data)
	{
		$data = trim($data);
		$data = htmlspecialchars($data);
		$data = stripslashes($data);
		return $data;
	}


?>