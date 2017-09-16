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
						<li><h2 style="margin-top:0px;"><a>Dashboard - Administrator</a></h2></li>
					</ol>
				</div>
				<div class="graph-visual tables-main">
					<div class="custom-widgets">
						<div class="row-one">
							<div class="col-md-3 widget">
								<div class="stats-left ">
									<h5>Total</h5>
									<h4> Student</h4>
								</div>
								<div class="stats-right">
									<?php 
									$query = mysqli_query($con,"SELECT * FROM tblyearlevel");
									?>
									<label>90</label>
								</div>
								<div class="clearfix"> </div>	
							</div>
							<div class="col-md-3 widget states-mdl">
								<div class="stats-left">
									<h5>Total</h5>
									<h4>Faculty</h4>
								</div>
								<div class="stats-right">
									<label> 85</label>
								</div>
								<div class="clearfix"> </div>	
							</div>
							<div class="col-md-3 widget states-thrd">
								<div class="stats-left">
									<h5>Total</h5>
									<h4>Subjects</h4>
								</div>
								<div class="stats-right">
									<label>51</label>
								</div>
								<div class="clearfix"> </div>	
							</div>
							<div class="col-md-3 widget states-last">
								<div class="stats-left">
									<h5>Total</h5>
									<h4>Class</h4>
								</div>
								<div class="stats-right">
									<label>30</label>
								</div>
								<div class="clearfix"> </div>	
							</div>
							<div class="clearfix"> </div>	
						</div>
					</div>

					<h3 class="inner-tittle two">List of administrator </h3>
					<div class="row">
					<form action="crud_function.php" method="post" name="frmActiveAdmin">
						<div class="col-sm-8">
							<div class="graph">
								<div class="tables">
									<table class="table table-bordered"> 
										<thead> 
											<tr> 
												<th>First Name</th> 
												<th>Last Name</th> 
												<th>Middle Name</th> 
												<th>Contact</th>
												<th>Username</th>
												<th colspan="2"><center>Action</center></th>
											</tr> 
										</thead>
										<tbody> 

										<?php 

											$query = "SELECT * FROM usertbl WHERE usertype = 'admin'";
											$result = mysqli_query($con, $query);

											while($row = mysqli_fetch_array($result))
											{

										?>


											<tr> 
												<td><?php echo $row['fname']; ?></td> 
												<td><?php echo $row['lname']; ?></td> 
												<td><?php echo $row['mname']; ?></td> 
												<td><?php echo $row['contact']; ?></td> 
												<td><?php echo $row['username']; ?></td> 


												<?php

													if($row['status'] == 0)
													{
														echo "<td><button name='btnActiveAdmin' onclick='activeInactiveAdmin(" .  $row['id']  . ")' class='btn-success'>Active</button></td>";
													}
													else
													{
														echo "<td><button name='btnActiveAdmin' onclick='activeInactiveAdmin(" .  $row['id']  . ")' class='btn-danger'>Inactive</button></td>";
													}
												 ?>





												<td><button class="btn-success" onclick="editAdmin(<?php echo "'" . $row['id'] . "','" . $row['fname'] . "','" . $row['mname'] . "','" . $row['lname'] . "','" . $row['contact'] . "','" . $row['username'] . "'"; ?>)">Edit</button></td>
											</tr> 

											<?php
											}

											?>

										</tbody> 
									</table>
								</div>
								<input type="hidden" name="admin_id" id="admin_id">
							</div>

						</div>
						</form>

						<div class="col-sm-4">
							<div class="graph">
								<form class="form-horizontal" method="post" name="frmAddAdmin" action="crud_function.php">
									<div class="form-group">
										<label>Username</label>
										<input type="text" class="form-control" name="txtUsername" id="txtUsername" required>
									</div>
									<div class="form-group">
										<label>First Name</label>
										<input type="text" class="form-control" name="txtFirstname" id="txtFirstname" required>
									</div>
									<div class="form-group">
										<label>Last Name</label>
										<input type="text" class="form-control" name="txtLastname" id="txtLastname" required>
									</div>
									<div class="form-group">
										<label>Middle Name</label>
										<input type="text" class="form-control" name="txtMiddlename" id="txtMiddlename" required>
									</div>
									<div class="form-group">
										<label>Contact</label>
										<input type="text" class="form-control" name="txtContact" id="txtContact" required>
									</div>
									<input type="hidden" id="adminid" name="adminid" value="">
									<button type="submit" name="btnAddAdmin" id="btnAddAdmin" class="btn btn-primary">Add</button>
									<button type="reset" id="clear" class="btn btn-info" onclick="clean()">Clear</button>
									<button type="button" id="btn_back" style="display:none;" class="btn btn-default">Back</button>
									<button type="submit" style="display:none;" name="updateAdmin" id="updateAdmin" class="btn btn-success">Update</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include "inc/sidebar.php"; ?>
</div>

<script type="text/javascript">
	
	function editAdmin(id, fname, mname, lname, contact, username)
	{
		$("#txtUsername").val(username);
		$("#txtFirstname").val(fname);
		$("#txtMiddlename").val(mname);
		$("#txtLastname").val(lname);
		$("#txtContact").val(contact);
		$("#adminid").val(id);
		$("#btnAddAdmin").hide();
		$("#updateAdmin").show();
	}

	function activeInactiveAdmin(id)
	{
		$("#admin_id").val(id);
		document.frmActiveAdmin.submit();
	}

</script>

<?php include "inc/script.php"; ?>
</body>
</html>