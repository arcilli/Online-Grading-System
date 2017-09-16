<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - Online Grading System </title>
	<?php include "inc/navbar.php"; ?>
</head>
<body>
	<div class="page-container">
		<div class="left-content">
			<?php include "inc/header.php"; ?>
			<div class="outter-wp">
				<div class="sub-heard-part">
					<ol class="breadcrumb m-b-0">
						<li><h2 style="margin-top:0px;"><a>Student - Grades</a></h2></li>
					</ol>
				</div>
				<div class="graph-visual tables-main">
					<h3 class="inner-tittle two">My Grades </h3>
					<div class="graph" style="padding:0px;">
						<form id="del_studgrade" action="crud_function.php" method="post">
							<button type="button" name="add_studgrade" data-toggle="modal" data-target="#studentgrade" class="btn btn-primary">Add Student Grades</button>
							<?php
							$result = mysqli_query($con, "SELECT *,sg.id as sgid, CONCAT(t.lname, ', ', t.fname, ' ', t.mname)  as tname, CONCAT(s.lname, ', ', s.fname, ' ', s.mname)  as sname
								FROM tblstudentgrade sg
								LEFT JOIN tblstudentclass sc ON sg.classid = sc.classid
								AND sg.studentid = sc.studentid
								AND sg.subjectid = sc.subjectid
								LEFT JOIN usertbl s ON sg.studentid = s.id
								LEFT JOIN tblteacheradvisory ta ON sg.classid = ta.classid
								LEFT JOIN usertbl t ON sg.adviserid = t.id
								LEFT JOIN tblclass c ON sg.classid = c.id
								LEFT JOIN tblschoolyear sy ON sg.schoolyearid = sy.id
								LEFT JOIN tblsubjects sb on sg.subjectid = sb.id
								where sg.adviserid = '".$sessionid."'")or die(mysqli_error($con));
							if(mysqli_num_rows($result) > 0){
								?>
								<button type="button" id="delete_studgrade" class="btn btn-danger">Delete</button>
                <input type="hidden" name="del_studgrade" value="1">
                <button type="button" name="print" class="btn btn-info">Print Grades</button>
                <table class="table table-bordered"> 
                 <thead> 
                  <tr>
                   <th><input type="checkbox" name="id" id="checkall" value=""></th> 
                   <th>School Year</th>
                   <th>Subject</th> 
                   <th>Class</th>
                   <th>Student</th>
                   <th>Prelim</th> 
                   <th>Midterm</th> 
                   <th>Pre Final</th>
                   <th>Final</th>
                   <th>Average</th>
                   <th>Remarks</th>
                   <th>Adviser</th>
                   <th></th>
                 </tr> 
               </thead>
               <tbody> 
                <?php
                while($row = mysqli_fetch_array($result)) {  
                 ?>
                 <tr> 
                  <th scope="row"><input type="checkbox" id="record" name="sgid[]" value="<?php echo $row['sgid']; ?>"></th>
                  <td><?php echo $row['schoolyear']; ?></td> 
                  <td><?php echo $row['subjectname']." - ".$row['description']; ?></td> 
                  <td><?php echo $row['classname']; ?></td> 
                  <td><?php echo $row['sname']; ?></td> 
                  <td><?php echo $row['prelim']; ?></td> 
                  <td><?php echo $row['midterm']; ?></td> 
                  <td><?php echo $row['prefi']; ?></td> 
                  <td><?php echo $row['final']; ?></td> 
                  <td><?php echo $row['gradeaverage']; ?></td> 
                  <td><?php echo ($row['remarks'] == "Passed" ? "<label style='color:green'>".$row['remarks']."</label>" : (($row['remarks'] == "Failed") ? "<label style='color:red'>".$row['remarks']."</label>" : "<label style='color:black'>No Final Remarks</label>")); ?></td> 
                  <td><?php echo $row['tname']; ?></td> 
                  <td><button class="btn2 btn-success btn-sm" data-target="#editModal<?php echo $row['sgid'] ?>" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                </tr> 
                <?php include "editModal.php";  } ?>
              </tbody> 
            </table>
            <?php }else{ ?>
            <div class="alert alert-danger">No data found.</div>
            <?php } ?>
          </form>
        </div>
      </div>
    </div>
    <?php include "inc/emp_sidebar.php"; ?>
  </div>
  <?php include "inc/script.php"; ?>
  <!-- Modal -->
  <div class="modal fade" id="studentgrade" role="dialog">
   <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add Student Grade</h4>
    </div>
    <form action="crud_function.php" method="post">
      <div class="modal-body">
       <div class="form-group">
        <label>School Year:</label>
        <select class="form-control" style="height:44px;" name="cboSchoolYear" id="cboSchoolYear" onchange="show_class()" required>
         <option></option>
         <?php 
         $query = "SELECT * FROM tblschoolyear";
         $result = mysqli_query($con, $query);
         while($row = mysqli_fetch_array($result)){
          ?>
          <option value="<?php echo $row['id']; ?>"><?php echo $row['schoolyear']; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
       <label>Class:</label>
       <select class="form-control" style="padding:8px;" name="cboclass"  id="cboclass" onchange="show_student()" required>
        <option></option>
      </select>
    </div>
    <div class="form-group">
     <label>Student:</label>
     <select class="form-control" style="padding:8px;" name="cbostudent"  id="cbostudent" onchange="show_subj()" required>
      <option></option>
    </select>
  </div>
  <div class="form-group">
   <label>Subject:</label>
   <select class="form-control" style="padding:8px;" name="cbosubjectid"  id="cbosubjectid" onchange="show_grade()" required>
    <option></option>
  </select>
</div>
<div class="form-group">
 <label>Prelim</label>
 <input type="text" class="form-control" pattern="" title="Accept Numbers only." name="prelim" id="prelim" maxlength="3" required>
</div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
  <button type="submit" name="add_studentgrade" class="btn btn-primary pull-right">Add Student Grade</button>
</div>
</form>
</div>
</div>
</div>

<script>
  $("#delete_studgrade").click(function(){
   var conf = confirm("Are you sure you want to delete the selected student grades?");
   if(conf == true){
    $("#del_studgrade").submit();
  }
})

  function show_class(){
   var syID = $('#cboSchoolYear').val();
   if(syID){
    $.ajax({
     type:'POST',
     url:'crud_function.php',
     data: 'sy_id='+syID,
     success:function(html){
      $('#cboclass').html(html);
    }
  }); 
  }
}

function show_student(){
 var classID = $('#cboclass').val();
 console.log(classID);
 if(classID){
  $.ajax({
   type:'POST',
   url:'crud_function.php',
   data: 'class_id='+classID,
   success:function(html){
    $('#cbostudent').html(html);
  }
}); 
}
}

function show_subj(){
 var studID = $('#cbostudent').val();
 console.log(studID);
 if(studID){
  $.ajax({
   type:'POST',
   url:'crud_function.php',
   data: 'stud_id='+studID,
   success:function(html){
    $('#ddl_subj').html(html);
    console.log($('#cbosubjectid').html(html));
  }
}); 
}
}

function show_grade(){
 var syID = $('#cboSchoolYear').val();
 var classID = $('#cboclass').val();
 var studID = $('#cbostudent').val();
 var subjID = $('#cbosubjectid').val();
 console.log(subjID);
 if(subjID){
  $.ajax({
   type:'POST',
   url:'crud_function.php',
   data: 'sy1_id='+syID+'&subj1_id='+subjID+'&class1_id='+classID+'&stud1_id='+studID,
   success:function(html){ }
 }); 
}
}

$("#checkall").click(function()
{
 if ($("#checkall").is(':checked')) {
  $("input#record").prop("checked", true);
} else {
  $("input#record").prop("checked", false);
}
})
</script>
</body>
</html>