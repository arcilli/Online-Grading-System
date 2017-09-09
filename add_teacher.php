<?php


	require "conn.php";



	if(isset($_POST['btnAddTeacher']))
	{
		$username = validate($_POST['txtUsername']);
		$firstname = validate($_POST['txtFirstname']);
		$lastname = validate($_POST['txtLastname']);
		$middlename = validate($_POST['txtMiddlename']);
		$contact = validate($_POST['txtContact']);

		$crud->insert("usertbl", array("username", "password" ,"fname", "mname", "lname", "contact", "usertype"), array($username, "teacher123", $firstname, $middlename, $lastname, $contact, "teacher"));		

		echo "<script>alert('Teacher added.');</script>";
		echo "<script>(function(){ window.location.href='teacher.php'; })()</script>";

	}






?>