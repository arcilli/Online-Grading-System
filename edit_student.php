<?php


	require "conn.php";

	if(isset($_POST['btnAddStudent']))
	{
	 	$id = validate($_POST['id']);
		$username = validate($_POST['txtUsername']);
		$firstname = validate($_POST['txtFirstname']);
		$lastname = validate($_POST['txtLastname']);
		$middlename = validate($_POST['txtMiddlename']);
		$contact = validate($_POST['txtContact']);

		$crud->update("usertbl", array("id", "username", "fname", "mname", "lname", "contact"), array($id, $username, $firstname, $middlename, $lastname, $contact));
	
		echo "<script>alert('Saved.');</script>";
		echo "<script>(function(){ window.location.href='student.php'; })()</script>";

	
	}

?>