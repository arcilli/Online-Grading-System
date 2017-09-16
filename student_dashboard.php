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
						<li><h2 style="margin-top:0px;"><a>Dashboard - Student</a></h2></li>
					</ol>
				</div>
				<div class="graph-visual tables-main">
					<h3 class="inner-tittle two">My Grades </h3>
					<div class="graph">
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
							where sg.studentid = '".$sessionid."'")or die(mysqli_error($con));
						if(mysqli_num_rows($result) > 0){
							?>
							<button type="button" name="print" class="btn btn-info">Print Grades</button>
							<table class="table table-bordered"> 
								<thead> 
									<tr>
										<th></th> 
										<th>Subject</th> 
										<th>Prelim</th> 
										<th>Midterm</th> 
										<th>Pre Final</th>
										<th>Final</th>
										<th>Average</th>
										<th>Remarks</th>
										<th>Adviser</th>
									</tr> 
								</thead>
								<tbody> 
									<?php
									while($row = mysqli_fetch_array($result)) {  
										?>
										<tr> 
											<th scope="row"><input type="checkbox" id="record" name="sgid[]" value="<?php echo $row['sgid']; ?>"></th>
											<td><?php echo $row['subjectname']." - ".$row['description']; ?></td> 
											<td><?php echo $row['prelim']; ?></td> 
											<td><?php echo $row['midterm']; ?></td> 
											<td><?php echo $row['prefi']; ?></td> 
											<td><?php echo $row['final']; ?></td> 
											<td><?php echo $row['gradeaverage']; ?></td> 
											<td><?php echo ($row['remarks'] == "Passed" ? "<label style='color:green'>".$row['remarks']."</label>" : (($row['remarks'] == "Failed") ? "<label style='color:red'>".$row['remarks']."</label>" : "<label style='color:black'>No Final Remarks</label>")); ?></td> 
											<td><?php echo $row['tname']; ?></td> 
										</tr> 
										<?php } ?>
									</tbody> 
								</table>
								<?php }else{ ?>
								<div class="alert alert-danger">No data found.</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php include "inc/stud_sidebar.php"; ?>
				</div>
				<?php include "inc/script.php"; ?>
			</body>
			</html>