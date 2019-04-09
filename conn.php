<?php

	require "CRUD.php";
    //TODO: need to change this
	$crud = new CRUD("localhost", "root", "", "grading");
	$con = $crud->getConnection();

	function validate($data)
	{
		$data = addslashes($data);
		$data = trim($data);
		$data = htmlspecialchars($data);
		$data = stripslashes($data);
		return $data;
	}


?>