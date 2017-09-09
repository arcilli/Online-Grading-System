<!DOCTYPE html>
<html>
<head>
	<title>Online Grading System </title>
	<?php include "inc/navbar.php"; ?>
</head>
<body>
	<div class="page-container">
		<div class="left-content">
			<?php include "inc/header.php"; ?>
			<div class="outter-wp">
				<div class="sub-heard-part">
					<ol class="breadcrumb m-b-0">
						<li><h2 style="margin-top:0px;"><a>Manage Class</a></h2></li>
					</ol>
				</div>
				<div class="graph-visual tables-main">
					<div class="row">
						<div class="col-sm-7">
							<div class="graph">
								<div class="tables">
									<table class="table table-bordered"> 
										<thead> 
											<tr>
												<th>Class Name</th> 
												<th>School Year</th> 
												<th>Year Level</th>
												<th></th>
											</tr> 
										</thead>
										<tbody> 

											<?php
												require "conn.php";
												$query = "SELECT * FROM tblclass";
												$result = mysqli_query($con, $query);

												while($row = mysqli_fetch_array($result))
												{

											 ?>

												<tr> 
													<td><?php echo $row['classname']; ?></td> 


													<!-- load school year based on school year id -->
													<?php 

														$query2 = "SELECT schoolyear FROM tblschoolyear WHERE id = '" . $row['schoolyearid'] . "'";
														$result2 = mysqli_query($con, $query2);
														$schoolyear = "";

														while($rows = mysqli_fetch_array($result2))
														{
															$schoolyear = $rows['schoolyear'];
														}

													?>

													<td><?php echo $schoolyear; ?></td>


													<!-- load yearlevel based on year level id -->

													<?php 
														$query3 = "SELECT yearlevel FROM tblyearlevel WHERE id = '" . $row['yearlevelid'] . "'";
														$result3 = mysqli_query($con, $query3);
														$yearlevel = "";

														while($rows = mysqli_fetch_array($result3))
														{
															$yearlevel = $rows['yearlevel'];
														}

													?>
													<td><?php echo $yearlevel; ?></td> 

													<td><button style="margin:0px;padding:8px;" classid="<?php echo $row['id']; ?>" schoolyearid="<?php echo $row['schoolyearid']; ?>" yearlevelid="<?php echo $row['yearlevelid']; ?>" classname="<?php echo $row['classname']; ?>" schoolyear="<?php echo $schoolyear; ?>" yearlevel="<?php echo $yearlevel; ?>" onclick="edit(this)" class="btn btn-success">Edit</button></td> 
													
												</tr> 

										  <?php } ?>
										</tbody> 
									</table>
								</div>
							</div>
						</div>

						<div class="col-sm-5">
							<div class="graph">
								<form class="form-horizontal" name="add_class_form" method="post">
									<div class="form-group">
										<label>Class Name</label>
										<input type="text" class="form-control" name="txtClassName" id="txtClassName">
									</div>
									<div class="form-group">
										<label>School Year</label>
										<select class="form-control" name="cboSchoolYear" id="cboSchoolYear">
											<option></option>
											<?php 

												
												$query = "SELECT * FROM tblschoolyear";
												$result = mysqli_query($con, $query);

												while($row = mysqli_fetch_array($result))
												{
											 ?>
											 		<option><?php echo $row['schoolyear']; ?></option>
										  <?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Year Level</label>
										<select class="form-control" name="cboYearLevel"  id="cboYearLevel">
											<option></option>
											<?php 
												$query = "SELECT * FROM tblyearlevel";
												$result = mysqli_query($con, $query);

												while($row = mysqli_fetch_array($result))
												{
											 ?>
											 		<option><?php echo $row['yearlevel']; ?></option>
										  <?php } ?>
										</select>
									</div>

									<input type="hidden" name="schoolyearid" id="schoolyearid">
									<input type="hidden" name="yearlevelid" id="yearlevelid">
									<input type="hidden" name="classid" id="classid">

									<button type="submit" name="btnAddClass" id="btnAddClass" onclick="send()" class="btn btn-primary">Add</button>
									<button type="button" id="clear" onclick="clean()" class="btn btn-info">Clear</button>
									<button type="button" id="btn_back" style="display:none;" class="btn btn-default">Back</button>
									<button type="button" id="btn_edit" style="display:none;" name="edit_yearlevel" class="btn btn-success">Update</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include "inc/sidebar.php"; ?>
		</div>
		<?php include "inc/script.php"; ?>
		<script>
			function send()
			{
				var form = document.add_class_form;

				if($("#btnAddClass").html() === "Add")
				{
					form.action = "add_class.php";
				}
				else
				{
					form.action = "edit_class.php";
				}

				form.submit();

			}

			function edit(obj)
			{
				$("#txtClassName").val($(obj).attr("classname"));
				$("#cboSchoolYear").val($(obj).attr("schoolyear"));
				$("#cboYearLevel").val($(obj).attr("yearlevel"));

				$("#classid").val($(obj).attr("classid"));
				$("#schoolyearid").val($(obj).attr("schoolyearid"));
				$("#yearlevelid").val($(obj).attr("yearlevelid"));

				$("#btnAddClass").html("Save");
				$("#clear").html("Cancel");
			}

			function clean()
			{
				$("#txtClassName").val("");
				$("#cboSchoolYear").val("");
				$("#cboYearLevel").val("");
				$("#btnAddClass").html("Add");
				$("#clear").html("Clear");
			}
		</script>
	</body>
	</html>