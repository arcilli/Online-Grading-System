<?php

	require "conn.php";


	if(isset($_POST['btnAddStudent']))
	{
		$username = validate($_POST['txtUsername']);
		$firstname = validate($_POST['txtFirstname']);
		$lastname = validate($_POST['txtLastname']);
		$middlename = validate($_POST['txtMiddlename']);
		$contact = validate($_POST['txtContact']);

		$crud->insert("usertbl", array("username", "password" ,"fname", "mname", "lname", "contact", "usertype"), array($username, "student123", $firstname, $middlename, $lastname, $contact, "student"));		

		echo "<script>alert('Student added.');</script>";
		echo "<script>(function(){ window.location.href='student.php'; })()</script>";

	}


?>