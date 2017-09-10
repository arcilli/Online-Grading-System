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
						<li><h2 style="margin-top:0px;"><a>Manage Teachers</a></h2></li>
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
												<th>First Name</th> 
												<th>Last Name</th> 
												<th>Middle Name</th>
												<th>Username</th> 
												<th>Contact</th> 
												<th></th>
											</tr> 
										</thead>
										<tbody> 
											<?php 

											$query = "SELECT * FROM usertbl WHERE usertype = 'teacher'";
											$result = mysqli_query($con, $query);

											while($row = mysqli_fetch_array($result))
											{

										?>
											<tr> 
												<!-- <th scope="row">1</th> -->
												<td><?php echo $row['fname']; ?></td> 
												<td><?php echo $row['mname']; ?></td> 
												<td><?php echo $row['lname']; ?></td> 
												<td><?php echo $row['username']; ?></td> 
												<td><?php echo $row['contact']; ?></td>  
												<td><button style="margin:0px;padding:8px;" userid="<?php echo $row['id']; ?>" firstname="<?php echo $row['fname']; ?>" middlename="<?php echo $row['mname']; ?>" lastname="<?php echo $row['lname']; ?>" username="<?php echo $row['username']; ?>" contact="<?php echo $row['contact']; ?>" class="btn btn-success" onclick="edit(this)"> Edit</button></td> 
											</tr> 

										<?php } ?>
										</tbody> 
									</table>
								</div>
							</div>
						</div>

						<div class="col-sm-5">
							<div class="graph">
								<form class="form-horizontal" name="add_teacher_form" method="post">
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
									<input type="hidden" id="id" name="id" value="">
									<button type="submit" name="btnAddTeacher" id="btnAddTeacher" onclick="send()" class="btn btn-primary">Add</button>
									<button type="button" onclick="clean()" id="clear" class="btn btn-info">Clear</button>
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
			
			function clean()
			{
				$("#txtFirstname").val("");
				$("#txtMiddlename").val("");
				$("#txtLastname").val("");
				$("#txtUsername").val("");
				$("#txtContact").val("");

				$("#btnAddTeacher").html("Add");
				$("#clear").html("Clear");
			}

			function edit(obj)
			{

				$("#txtFirstname").val($(obj).attr("firstname"));
				$("#txtMiddlename").val($(obj).attr("middlename"));
				$("#txtLastname").val($(obj).attr("lastname"));
				$("#txtUsername").val($(obj).attr("username"));
				$("#txtContact").val($(obj).attr("contact"));
				$("#id").val($(obj).attr("userid"));

				$("#btnAddTeacher").html("Save");
				
				$("#clear").html("Cancel");

			}

			function send()
			{
				var form = document.add_teacher_form;

				if($("#btnAddTeacher").html() === "Add")
				{
					form.action = "add_teacher.php";
				}
				else
				{
					form.action = "edit_teacher.php";
				}

				form.submit();
			}


		</script>

	</body>
	</html>