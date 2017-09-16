<?php
require "conn.php";
include "session.php";

if(isset($_POST['btnAddSchoolYear']))
{
	$school_year = validate($_POST['txtSchoolYear']);

	$crud->insert("tblschoolyear", array("schoolyear", "status"), array($school_year, 0));

	echo "<script>alert('School Year added.');</script>";
	echo "<script>(function(){ window.location.href='school_year.php'; })()</script>";
}

if(isset($_POST['btneditSchoolYear']))
{

	$id = $_POST['school_year_id'];
	$school_year = validate($_POST['txtSchoolYear']);

	$crud->update("tblschoolyear", array("id", "schoolyear"), array($id, $school_year));

	echo "<script>alert('Successfully updated.');</script>";
	echo "<script>(function(){ window.location.href='school_year.php'; })()</script>";
}

if(isset($_POST['btnAddSubjects']))
{
	$subjectname = validate($_POST['subjectname']);
	$desc = validate($_POST['desc']);
	$yearlevelid = validate($_POST['cboYearLevel']);

	$crud->insert("tblsubjects", array("subjectname", "description", "yearlevelid"), array($subjectname,$desc,$yearlevelid));

	echo "<script>alert('Subject added.');</script>";
	echo "<script>(function(){ window.location.href='subject.php'; })()</script>";
}

if(isset($_POST['edit_subject']))
{
	$subid = $_POST['subid'];
	$subjectname = validate($_POST['subjectname']);
	$desc = validate($_POST['desc']);
	$yearlevelid = validate($_POST['cboYearLevel']);

	$crud->update("tblsubjects", array("id", "subjectname", "description", "yearlevelid"), array($subid,$subjectname,$desc,$yearlevelid));

	echo "<script>alert('Subject updated.');</script>";
	echo "<script>(function(){ window.location.href='subject.php'; })()</script>";
}

if(isset($_POST['del_subject']))
{
	if (!empty($_POST['subid'])) 
	{
		$subid = $_POST['subid'];
		$N = count($subid);
		for($i=0; $i < $N; $i++)
		{
			mysqli_query($con, "DELETE from tblsubjects where id = '$subid[$i]'")or die(mysqli_error($con));
		}
		echo "<script>alert('Student Class deleted.');</script>";
		echo "<script>(function(){ window.location.href='subject.php'; })()</script>";
	}
	else
	{
		echo "<script>alert('Please select subject you want to delete, Thank you!');</script>";
		echo "<script>(function(){ window.location.href='subject.php'; })()</script>";
	}
}

if(isset($_POST['add_studclass']))
{
	$classid = validate($_POST['cboclass']);
	$studentid = validate($_POST['cboStudent']);
	$subjectid = validate($_POST['cbosubjectid']);

	$crud->insert("tblstudentclass", array("classid", "studentid", "subjectid"), array($classid,$studentid,$subjectid));

	echo "<script>alert('Student successfully enrolled.');</script>";
	echo "<script>(function(){ window.location.href='student_class.php'; })()</script>";
}

if(isset($_POST['edit_studclass']))
{
	$studclass_id = $_POST['studclass_id'];
	$classid = validate($_POST['cboclass']);
	$studentid = validate($_POST['cboStudent']);
	$subjectid = validate($_POST['cbosubjectid']);

	$crud->update("tblstudentclass", array("id", "classid", "studentid", "subjectid"), array($studclass_id,$subjectname,$desc,$yearlevelid));

	echo "<script>alert('Student Class updated.');</script>";
	echo "<script>(function(){ window.location.href='student_class.php'; })()</script>";
}

if(isset($_POST['btnAddStudent']))
{
	$username = validate($_POST['txtUsername']);
	$firstname = validate($_POST['txtFirstname']);
	$lastname = validate($_POST['txtLastname']);
	$middlename = validate($_POST['txtMiddlename']);
	$contact = validate($_POST['txtContact']);

	$crud->insert("usertbl", array("username", "password" ,"fname", "mname", "lname", "contact", "usertype", "status"), array($username, "student123", $firstname, $middlename, $lastname, $contact, "student", 0));		

	echo "<script>alert('Student added.');</script>";
	echo "<script>(function(){ window.location.href='student.php'; })()</script>";
}

if(isset($_POST['edit_student']))
{
	$id = validate($_POST['id']);
	$username = validate($_POST['txtUsername']);
	$firstname = validate($_POST['txtFirstname']);
	$lastname = validate($_POST['txtLastname']);
	$middlename = validate($_POST['txtMiddlename']);
	$contact = validate($_POST['txtContact']);

	$crud->update("usertbl", array("id", "username", "fname", "mname", "lname", "contact"), array($id, $username, $firstname, $middlename, $lastname, $contact));
	echo "<script>alert('Successfully updated.');</script>";
	echo "<script>(function(){ window.location.href='student.php'; })()</script>";	
}

if(isset($_POST['edit_userInfo']))
{
	$firstname = validate($_POST['txtFirstname']);
	$lastname = validate($_POST['txtLastname']);
	$middlename = validate($_POST['txtMiddlename']);
	$contact = validate($_POST['txtContact']);

	$crud->update("usertbl", array("id", "fname", "mname", "lname", "contact"), array($sessionid, $firstname, $middlename, $lastname, $contact));		

	echo "<script>alert('User Info updated.');</script>";
	echo "<script>(function(){ window.location.href='profile.php'; })()</script>";
}

if(isset($_POST['del_studgrade']))
{
	if (!empty($_POST['sgid'])) 
	{
		$sgid = $_POST['sgid'];
		$N = count($sgid);
		for($i=0; $i < $N; $i++)
		{
			mysqli_query($con, "DELETE from tblstudentgrade where id = '$sgid[$i]'")or die(mysqli_error($con));
		}
		echo "<script>alert('Student Grade deleted.');</script>";
		echo "<script>(function(){ window.location.href='student_grade.php'; })()</script>";
	}
	else
	{
		echo "<script>alert('Please select student grade you want to delete, Thank you!');</script>";
		echo "<script>(function(){ window.location.href='student_grade.php'; })()</script>";
	}
}

if(isset($_POST['edit_password']))
{
	$newpass = validate($_POST['txtnewpass']);
	$password = validate($_POST['txtconpass']);

	if($newpass == $password){
		$crud->update("usertbl", array("id", "password"), array($sessionid, $password));	
		echo "<script> alert('User password updated.'); (function(){ window.location.href='profile.php'; })()</script>";	
	}else{
		?> <script> alert("Password doesn't match."); (function(){ window.location.href='profile.php'; })();</script> <?php
	}
}

if(isset($_POST['add_empclass']))
{
	$classid = validate($_POST['cboclass']);
	$empid = validate($_POST['cboempid']);
	$subjectid = validate($_POST['cbosubjectid']);

	$crud->insert("tblteacheradvisory", array("classid", "teacherid", "subjectid"), array($classid,$empid,$subjectid));

	echo "<script>alert('Successfully added.');</script>";
	echo "<script>(function(){ window.location.href='teacher_advisory.php'; })()</script>";
}

if(isset($_POST['add_studentgrade']))
{
	$syid = validate($_POST['cboSchoolYear']);
	$adviserid = $sessionid;
	$classid = $_POST['cboclass'];
	$studid = $_POST['cbostudent']; 
	$subjectid = validate($_POST['cbosubjectid']);
	$prelim = $_POST['prelim'];

	$crud->insert("tblstudentgrade", array("schoolyearid", "studentid", "subjectid", "classid", "adviserid", "prelim"), array($syid,$studid,$subjectid,$classid,$adviserid,$prelim));

	echo "<script>alert('Successfully added.');</script>";
	echo "<script>(function(){ window.location.href='student_grade.php'; })()</script>";
}

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

if(isset($_POST['btnAddYearLevel']))
{
	$year_level = validate($_POST['yearlevel']);
	$year_level_desc = validate($_POST['yearleveldesc']);

	$crud->insert("tblyearlevel", array("yearlevel", "description"), array($year_level, $year_level_desc));

	echo "<script>alert('Year Level added.');</script>";
	echo "<script>(function(){ window.location.href='year_level.php'; })()</script>";
}

if(isset($_POST['del_yearlevel']))
{
	if (!empty($_POST['yearlvlid'])) 
	{
		$yearlvlid = $_POST['yearlvlid'];
		$N = count($yearlvlid);
		for($i=0; $i < $N; $i++)
		{
			mysqli_query($con, "DELETE from tblyearlevel where id = '$yearlvlid[$i]'")or die(mysqli_error($con));
		}
		echo "<script>alert('Year Level deleted.');</script>";
		echo "<script>(function(){ window.location.href='year_level.php'; })()</script>";
	}
	else
	{
		echo "<script>alert('Please select year level you want to delete, Thank you!');</script>";
		echo "<script>(function(){ window.location.href='year_level.php'; })()</script>";
	}
}

if(isset($_POST['edit_yearlevel']))
{
	$id = validate($_POST['year_level_id']);
	$year_level = validate($_POST['yearlevel']);
	$yearlevel_desc = validate($_POST['yearleveldesc']);

	$crud->update("tblyearlevel", array("id", "yearlevel", "description"), array($id, $year_level, $yearlevel_desc));

	echo "<script>alert('Successfully updated.');</script>";
	echo "<script>(function(){ window.location.href='year_level.php'; })()</script>";
}

if(isset($_POST['btnAddClass']))
{
	$class_name = validate($_POST['txtClassName']);
	$school_year = validate($_POST['cboSchoolYear']);
	$year_level = validate($_POST['cboYearLevel']);

	$query = "SELECT id FROM tblschoolyear WHERE schoolyear = '$school_year'";
	$result = mysqli_query($con, $query);

	$school_year_id = 0;
	$year_level_id = 0;

	while($row = mysqli_fetch_array($result))
	{
		$school_year_id = $row['id'];
	}
	
	$query2 = "SELECT id FROM tblyearlevel WHERE yearlevel = '$year_level'";
	$result2 = mysqli_query($con, $query2);

	while($row = mysqli_fetch_array($result2))
	{
		$year_level_id = $row['id'];
	}
	$crud->insert("tblclass", array("classname", "schoolyearid", "yearlevelid"), array($class_name, $school_year_id, $year_level_id));
	echo "<script>alert('Class added.');</script>";
	echo "<script>(function(){ window.location.href='class.php'; })()</script>";
}

if(isset($_POST['edit_class']))
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

if(isset($_POST['del_class']))
{
	if (!empty($_POST['classid'])) 
	{
		$classid = $_POST['classid'];
		$N = count($classid);
		for($i=0; $i < $N; $i++)
		{
			mysqli_query($con, "DELETE from tblclass where id = '$classid[$i]'")or die(mysqli_error($con));
		}
		echo "<script>alert('Class deleted.');</script>";
		echo "<script>(function(){ window.location.href='class.php'; })()</script>";
	}
	else
	{
		echo "<script>alert('Please select class you want to delete, Thank you!');</script>";
		echo "<script>(function(){ window.location.href='class.php'; })()</script>";
	}
}

//all about add student grade
if(isset($_POST['sy_id'])){

	$sy_id = $_POST['sy_id'];
	$query = mysqli_query($con,"select * from tblclass where schoolyearid = '$sy_id' ") or die('Error: ' . mysqli_error($con));
	$rowCount = mysqli_num_rows($query);

	if($rowCount > 0){
		echo '<option value="" disabled selected>-- Select Class -- </option>';
		while($row = mysqli_fetch_array($query))
		{
			echo '<option value="'.$row['id'].'">'.$row['classname'].'</option>';
		}
	}
	else {
		echo '<option value="" disabled selected>-- No Class yet for this school year --</option>';
	}
}

if(isset($_POST['class_id'])){

	$class_id = $_POST['class_id'];
	$query = mysqli_query($con,"select *,s.id as studID
		from tblstudentclass sc
		left join usertbl s on sc.studentid = s.id
		where sc.classid = '$class_id' ");
	$rowCount = mysqli_num_rows($query);

	if($rowCount > 0){
		echo '<option value="" disabled selected>-- Select Student -- </option>';
		while($row = mysqli_fetch_array($query))
		{
			echo '<option value="'.$row['studID'].'">'.$row['lname'].', '.$row['fname'].' '.$row['mname'].'</option>';
		}
	}
	else {
		echo '<option value="" disabled selected>-- No student for this class --</option>';
	}
}

if(isset($_POST['stud_id'])){

	$stud_id = $_POST['stud_id'];
	$query = mysqli_query($con,"select *,s.id as subjID
		from tblstudentclass sc
		left join tblsubjects s on sc.subjectid = s.id
		where sc.studentid = '$stud_id' ");
	$rowCount = mysqli_num_rows($query);

	if($rowCount > 0){
		echo '<option value="" disabled selected>-- Select Subject -- </option>';
		while($row = mysqli_fetch_array($query))
		{
			echo '<option value="'.$row['subjID'].'">'.$row['subjectname'].' - '.$row['description'].'</option>';
		}
	}
	else {
		echo '<option value="" disabled selected>-- No subject for this student --</option>';
	}
}

if(isset($_POST['subj_id'])){

	$sy_id = $_POST['sy_id1'];
	$class_id = $_POST['class_id1'];
	$stud_id = $_POST['stud_id1'];
	$subj_id = $_POST['subj_id1'];

	$query = mysqli_query($con,"select *,sg.id as subjID
		from tblstudentgrade sg
		where sg.schoolyearid = '$sy_id'
		and sg.classid = '$class_id'
		and sg.studentid = '$stud_id'
		and sg.subjectid = '$subj_id' ");
	$rowCount = mysqli_num_rows($query);

	if($rowCount > 0){
		echo '<script>document.getElementById("grading1st").style.display = "block";</script>';
	}
}

if(isset($_POST['btn_update_studgrade']))
{
	$txt_id = $_POST['hidden_id'];
	$txt_edit_sy = $_POST['txt_edit_sy'];
	$txt_edit_class = $_POST['txt_edit_class'];
	$txt_edit_subj = $_POST['txt_edit_subj'];
	$txt_edit_stud = $_POST['txt_edit_stud'];
	$txtprelim = $_POST['txtprelim'];
	$txtmidterm = $_POST['txtmidterm'];
	$txtprefi = $_POST['txtprefi'];
	$txtfinal = $_POST['txtfinal'];

	$query = mysqli_query($con,"UPDATE tblstudentgrade SET prelim = '".$txtprelim."',midterm = '".$txtmidterm."',prefi = '".$txtprefi."',final = '".$txtfinal."' where id = '".$txt_id."' ");
	$q = mysqli_query($con,"SELECT * from tblstudentgrade where id = '".$txt_id."' ");
	while($row=mysqli_fetch_array($q)){
		if($row['midterm'] != 0 && $row['prefi'] != 0 && $row['final'] != 0){
			$result = (( $row['prelim'] + $row['midterm'] + $row['prefi'] + $row['final'] ) / 4) ;
			$average = round($result);
			if($average >= 75){
				$query = mysqli_query($con,"UPDATE tblstudentgrade SET gradeaverage = '".$average."', remarks = 'Passed'  where id = '".$txt_id."' ");
			}
			else{
				$query = mysqli_query($con,"UPDATE tblstudentgrade SET gradeaverage = '".$average."', remarks = 'Failed'  where id = '".$txt_id."' "); 
			}
		}
		else{
			$result = (( $row['prelim'] + $row['midterm'] + $row['prefi'] + $row['final'] ) / 4) ;
			$average = round($result);
			$query = mysqli_query($con,"UPDATE tblstudentgrade SET gradeaverage = '".$average."', remarks = 'No Final Remarks'  where id = '".$txt_id."' ");    	
		}
	}
	echo "<script>alert('Successfully updated.');</script>";
	echo "<script>(function(){ window.location.href='student_grade.php'; })()</script>";
}



if(isset($_POST['active_schoolyear_btn']))
{
	$id =  $_POST['schoolyear_id'];

	$query = "SELECT status FROM tblschoolyear WHERE id = $id";
	$result = mysqli_query($con, $query);

	$status = 0;
	while($row = mysqli_fetch_array($result))
	{
		$status = $row['status'];
	}

	if($status == 0)
	{
		$status = 1;
	}
	else
	{
		$status = 0;
	}
	

	$query2 = "UPDATE tblschoolyear SET status = 1";
	mysqli_query($con, $query2);

	$crud->update("tblschoolyear", array("id", "status"), array($id, $status));
	echo "<script>alert('Status changed.');</script>";
	echo "<script>(function(){ window.location.href='school_year.php'; })()</script>";
}



if(isset($_POST['activeStudentBtn']))
{
	$id = $_POST['studid'];

	$query = "SELECT status FROM usertbl WHERE id = $id";
	$result = mysqli_query($con, $query);

	$status = 0;
	while($row = mysqli_fetch_array($result))
	{
		$status = $row['status'];
	}


	if($status == 0)
	{
		$status = 1;
	}
	else
	{
		$status = 0;
	}


	$crud->update("usertbl", array("id", "status"), array($id, $status));
	echo "<script>alert('Status changed.');</script>";
	echo "<script>(function(){ window.location.href='student.php'; })()</script>";

}



if(isset($_POST['activeTeacherBtn']))
{
	$id = $_POST['teacherid'];

	$query = "SELECT status FROM usertbl WHERE id = $id";
	$result = mysqli_query($con, $query);

	$status = 0;
	while($row = mysqli_fetch_array($result))
	{
		$status = $row['status'];
	}

	if($status == 0)
	{
		$status = 1;
	}
	else
	{
		$status = 0;
	}

	$crud->update("usertbl", array("id", "status"), array($id, $status));
	echo "<script>alert('Status changed.');</script>";
	echo "<script>(function(){ window.location.href='teacher.php'; })()</script>";	
}

if(isset($_POST['btnAddAdmin']))
{
	$username = validate($_POST['txtUsername']);
	$firstname = validate($_POST['txtFirstname']);
	$lastname = validate($_POST['txtLastname']);
	$middlename = validate($_POST['txtMiddlename']);
	$contact = validate($_POST['txtContact']);

	$crud->insert("usertbl", array("username", "password", "fname", "mname", "lname", "contact", "usertype", "status"), array($username, "admin123", $firstname, $middlename, $lastname, $contact, "admin", 0));

	echo "<script>alert('Admin added.');</script>";
	echo "<script>(function(){ window.location.href='admin_dashboard.php'; })()</script>";	

}

if(isset($_POST['updateAdmin']))
{
	$adminid = validate($_POST['adminid']);
	$username = validate($_POST['txtUsername']);
	$firstname = validate($_POST['txtFirstname']);
	$lastname = validate($_POST['txtLastname']);
	$middlename = validate($_POST['txtMiddlename']);
	$contact = validate($_POST['txtContact']);


	$crud->update("usertbl", array("id", "username", "fname", "mname", "lname", "contact"), array($adminid, $username, $firstname, $middlename, $lastname, $contact));

	echo "<script>alert('Saved.');</script>";
	echo "<script>(function(){ window.location.href='admin_dashboard.php'; })()</script>";

}

if(isset($_POST['btnActiveAdmin']))
{
	$id = validate($_POST['admin_id']);


	$query = "SELECT status FROM usertbl WHERE id = $id";
	$result = mysqli_query($con, $query);

	$status = 0;
	while($row = mysqli_fetch_array($result))
	{
		$status = $row['status'];
	}

	if($status == 0)
	{
		$status = 1;
	}
	else
	{
		$status = 0;
	}

	$crud->update("usertbl", array("id", "status"), array($id, $status));
	echo "<script>alert('Status changed.');</script>";
	echo "<script>(function(){ window.location.href='admin_dashboard.php'; })()</script>";

}


if(isset($_POST['update_teacher_advisory']))
{
	$teacher_advisory_id = validate($_POST['teacher_advisory_id']);

	$teacherid = validate($_POST['cboempid']);
	$classid = validate($_POST['cboclass']);
	$subjectid = validate($_POST['cbosubjectid']);


	$crud->update("tblteacheradvisory", array("id", "teacherid", "classid", "subjectid"), array($teacher_advisory_id, $teacherid, $classid, $subjectid));

	echo "<script>alert('Saved.');</script>";
	echo "<script>(function(){ window.location.href='teacher_advisory.php'; })()</script>";

}	

if(isset($_POST['del_teacher_ad']))
{
	if(!empty($_POST['subid']))
	{
		$ids = $_POST['subid'];
		for($i = 0; $i < count($ids); $i++)
		{
			$crud->delete("tblteacheradvisory", "id", $ids[$i]);
		}


		echo "<script>alert('Deleted.');</script>";
		echo "<script>(function(){ window.location.href='teacher_advisory.php'; })()</script>";

	}
}




?>