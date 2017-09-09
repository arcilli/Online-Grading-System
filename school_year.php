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
						<li><h2 style="margin-top:0px;"><a>Manage School Year</a></h2></li>
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
												<th>School Year</th> 
												<th>Status</th> 
												<th></th>
											</tr> 
										</thead>
										<tbody> 

										<?php 

											require "conn.php";

											$query = "SELECT * FROM tblschoolyear";
											$result = mysqli_query($con, $query);

											while($row = mysqli_fetch_array($result))
											{

										?>

											<tr> 
												<td><?php echo $row['schoolyear']; ?></td> 
												<td><button style="margin:0px;padding:8px;" class="btn btn-success">Active</button></td> 
												<td><button style="margin:0px;padding:8px;" schoolyearid="<?php echo $row['id']; ?>" schoolyear="<?php echo $row['schoolyear']; ?>" class="btn btn-success" onclick="edit(this)">Edit</button></td> 
											</tr> 


									  <?php } ?>

										</tbody> 
									</table>
								</div>
							</div>
						</div>

						<div class="col-sm-5">
							<div class="graph">
								<form class="form-horizontal" method="post" name="add_schoolyear_form" >
									<div class="form-group">
										<label>School Year</label>
										<input type="text" class="form-control" name="txtSchoolYear"  id="txtSchoolYear" placeholder="0000-0000">
									</div>
									<input type="hidden" name="school_year_id" id="school_year_id">
									<button type="submit" name="btnAddSchoolYear" id="btnAddSchoolYear" onclick="send()" class="btn btn-primary">Add</button>
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
			
			function send()
			{
				var form = document.add_schoolyear_form;

				if($("#btnAddSchoolYear").html() === "Add")
				{
					form.action = "add_schoolyear.php";
				}
				else
				{
					form.action = "edit_schoolyear.php";
				}

				form.submit();

			}

			function edit(obj)
			{
				$("#school_year_id").val($(obj).attr("schoolyearid"));
				$("#txtSchoolYear").val($(obj).attr("schoolyear"));
				$("#btnAddSchoolYear").html("Save");
				$("#clear").html("Cancel");
			}

			function clean()
			{
				$("#txtSchoolYear").val("");
				$("#btnAddSchoolYear").html("Add");
				$("#clear").html("Clear");
			}

		</script>

	</body>
	</html>