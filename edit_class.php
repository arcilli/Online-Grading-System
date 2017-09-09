<?php



	require "conn.php";



	if(isset($_POST['btnAddClass']))
	{
		$classid = validate($_POST['classid']);
		$schoolyear = validate($_POST['cboSchoolYear']);
		$yearlevel = validate($_POST['cboYearLevel']);

		$className = validate($_POST['txtClassName']);



		$query = "SELECT id FROM tblschoolyear WHERE schoolyear = '" . $schoolyear . "'";
		$result = mysqli_query($con, $query);
		$schoolyearid = 0;
		while($row = mysqli_fetch_array($result))
		{
			$schoolyearid = $row['id'];
		}


		$query2 = "SELECT id FROM tblyearlevel WHERE yearlevel = '" . $yearlevel . "'";
		$result2 = mysqli_query($con, $query2);
		$yearlevelid = 0;
		while($row = mysqli_fetch_array($result2))
		{
			$yearlevelid = $row['id'];
		}


		echo "CLASS ID: " . $classid . " schoolyearid: " . $schoolyearid . " yearlevelid: " . $yearlevelid;

		$crud->update("tblclass", array("id", "classname", "schoolyearid", "yearlevelid"), array($classid, $className, $schoolyearid, $yearlevelid));


		echo "<script>alert('Saved.');</script>";
		echo "<script>(function(){ window.location.href='class.php'; })()</script>";

	}







?>