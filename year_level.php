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
						<li><h2 style="margin-top:0px;"><a>Manage Year Level</a></h2></li>
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
												<th>Year Level</th> 
												<th>Description</th> 
												<th></th>
											</tr> 
										</thead>
										<tbody> 

										<?php 
											$query = "SELECT * FROM tblyearlevel";
											$result = mysqli_query($con, $query);

											while($row = mysqli_fetch_array($result))
											{

										?>
											<tr> 
												<td><?php echo $row['yearlevel']; ?></td> 
												<td><?php echo $row['description']; ?></td> 
												<td><button style="margin:0px;padding:8px;" yearlevelid="<?php echo $row['id']; ?>" yearlevel="<?php echo $row['yearlevel']; ?>" description="<?php echo $row['description']; ?>" class="btn btn-success" onclick="edit(this)">Edit</button></td> 
											</tr> 

									  <?php } ?>


										</tbody> 
									</table>
								</div>
							</div>
						</div>

						<div class="col-sm-5">
							<div class="graph">
								<form class="form-horizontal" name="add_yearlevel_form" method="post">
									<div class="form-group">
										<label>Year Level</label>
										<input type="text" class="form-control" name="yearlevel" id="txtYearLevel" required>
									</div>
									<div class="form-group">
										<label>Description</label>
										<input type="text" class="form-control" name="yearleveldesc" id="yearleveldesc" required>
									</div>
									<input type="hidden" name="year_level_id" id="year_level_id">
									<button type="submit" name="btnAddYearLevel" id="btnAddYearLevel" onclick="send()" class="btn btn-primary">Add</button>
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
				var form = document.add_yearlevel_form;

				if($("#btnAddYearLevel").html() === "Add")
				{
					form.action = "add_yearlevel.php";
				}
				else
				{
					form.action = "edit_yearlevel.php";
				}
				form.submit();
			}

			function clean()
			{
				$("#txtYearLevel").val("");
				$("#yearleveldesc").val("");
				$("#btnAddYearLevel").html("Add");
				$("#clear").html("Clear");
			}

			function edit(obj)
			{
				$("#txtYearLevel").val($(obj).attr("yearlevel"));
				$("#yearleveldesc").val($(obj).attr("description"));
				$("#year_level_id").val($(obj).attr("yearlevelid"));
				$("#btnAddYearLevel").html("Save");
				$("#clear").html("Cancel");
			}

		</script>

	</body>
	</html>