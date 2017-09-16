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
							<div class="graph" style="padding:10px;">
								<form id="submit_yearlevel" action="crud_function.php" method="post">
									<div class="tables">
										<button type="button" id="del_yearlevel" class="btn btn-danger">Delete</button>
										<input type="hidden" name="del_yearlevel" value="1">
										<table class="table table-bordered"> 
											<thead> 
												<tr>
													<th><input type="checkbox" id="checkall"></th>
													<th>Year Level</th> 
													<th>Description</th> 
													<th></th>
												</tr> 
											</thead>
											<tbody> 
												<?php 
												$query = "SELECT * FROM tblyearlevel";
												$result = mysqli_query($con, $query);

												while($row = mysqli_fetch_array($result)){
													?>
													<tr> 
														<td width="20"><input type="checkbox" id="record" name="yearlvlid[]" value="<?php echo $row['id']; ?>"></td>
														<td><?php echo $row['yearlevel']; ?></td> 
														<td><?php echo $row['description']; ?></td> 
														<td><center><button type="button" style="margin:0px;padding:8px;" yearlevelid="<?php echo $row['id']; ?>" yearlevel="<?php echo $row['yearlevel']; ?>" description="<?php echo $row['description']; ?>" class="btn-success" onclick="edit(this)">Edit</button></center></td> 
													</tr> 
													<?php } ?>
												</tbody> 
											</table>
										</div>
									</form>
								</div>
							</div>

							<div class="col-sm-5">
								<div class="graph">
									<form action="crud_function.php" method="post">
										<div class="form-group">
											<label>Year Level</label>
											<input type="text" class="form-control" name="yearlevel" id="txtYearLevel" required>
										</div>
										<div class="form-group">
											<label>Description</label>
											<input type="text" class="form-control" name="yearleveldesc" id="yearleveldesc" required>
										</div>
										<input type="hidden" name="year_level_id" id="year_level_id">
										<button type="submit" name="btnAddYearLevel" id="btnAddYearLevel" class="btn btn-primary">Add</button>
										<button type="button" id="btn_back" style="display:none;" class="btn btn-default">Back</button>
										<button type="submit" id="btn_edit" style="display:none;" name="edit_yearlevel" class="btn btn-success">Update</button>
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
				$("#del_yearlevel").click(function(){
					var conf = confirm("Are you sure you want to delete the selected year level?");
					if(conf == true){
						$("#submit_yearlevel").submit();
					}
				})
				$("#checkall").click(function()
				{
					if ($("#checkall").is(':checked')) {
						$("input#record").prop("checked", true);
					} else {
						$("input#record").prop("checked", false);
					}
				})
				function edit(obj)
				{
					$("#txtYearLevel").val($(obj).attr("yearlevel"));
					$("#yearleveldesc").val($(obj).attr("description"));
					$("#year_level_id").val($(obj).attr("yearlevelid"));
					$("#btnAddYearLevel").hide();
					$("#btn_back").show();
					$("#btn_edit").show();
				}
				$("#btn_back").click(function(){
					$("#btn_back").hide();
					$("#btn_edit").hide();
					$("#btnAddYearLevel").show();
				})
			</script>

		</body>
		</html>