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
						<li><h2 style="margin-top:0px;"><a>Manage Subjects</a></h2></li>
					</ol>
				</div>
				<div class="graph-visual tables-main">
					<div class="row">
						<div class="col-sm-7">
							<div class="graph">
								<form action="crud_function.php" method="post">
									<?php 
									$query = "SELECT * FROM tblsubjects";
									$result = mysqli_query($con, $query)or die(mysqli_error($con));
									if(mysqli_num_rows($result) > 0){
										?>
										<button type="button" id="del_subject" class="btn btn-danger">Delete</button>
										<button type="submit" name="del_subject" id="submit_subject" class="btn btn-danger" style="display:none;">delete</button>
										<div class="tables">
											<table class="table table-bordered"> 
												<thead> 
													<tr>
														<th><input type="checkbox" id="checkall"></th> 
														<th>Subject Name</th> 
														<th>Description</th> 
														<th>Year Level</th>
														<th></th>
													</tr> 
												</thead>
												<tbody> 
													<?php while($row = mysqli_fetch_array($result)) { 
														$yearlevel = mysqli_query($con,"SELECT * FROM tblyearlevel where id='".$row['yearlevelid']."'");
														$row_ylevel = mysqli_fetch_array($yearlevel);
														?>
														<tr> 
															<th scope="row"><input type="checkbox" id="record" name="subid[]" value="<?php echo $row['id']; ?>"></th>
															<td><?php echo $row['subjectname']; ?></td> 
															<td><?php echo $row['description']; ?></td> 
															<td><?php echo $row_ylevel['yearlevel']; ?></td> 
															<td width="50"><button type="button" style="margin:0px;padding:8px;" id="editsub" data-id="<?php echo $row_ylevel['id']; ?>" class="btn btn-success">Edit</button></td> 
														</tr> 
														<?php } ?>
													</tbody> 
												</table>
											</div>
											<?php }else{ ?>
											<div class="alert alert-danger">No data found.</div>
											<?php } ?>
										</form>
									</div>
								</div>

								<div class="col-sm-5">
									<div class="graph">
										<form class="form-horizontal" action="crud_function.php" method="post">
											<input type="hidden" id="subid" name="subid">
											<div class="form-group">
												<label>Subject Name:</label>
												<input type="text" class="form-control" id="subjectname" name="subjectname" required>
											</div>
											<div class="form-group">
												<label>Description:</label>
												<input type="text" class="form-control" id="desc" name="desc" required>
											</div>
											<div class="form-group">
												<label>Year Level</label>
												<select class="form-control" id="cboYearLevel" style="height:44px;" name="cboYearLevel" required>
													<option></option>
													<?php 
													$query = "SELECT * FROM tblyearlevel";
													$result = mysqli_query($con, $query);

													while($row = mysqli_fetch_array($result)) {
														?>
														<option value="<?php echo $row['id']; ?>"><?php echo $row['yearlevel']; ?></option>
														<?php } ?>
													</select>
												</div>
												<button type="submit" name="btnAddSubjects" id="btnAddSubjects" class="btn btn-primary">Create</button>
												<button type="reset" id="clear" class="btn btn-info">Clear</button>
												<button type="button" id="btn_back" style="display:none;" class="btn btn-default">Cancel</button>
												<button type="submit" id="btn_edit" style="display:none;" name="edit_subject" class="btn btn-success">Update</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php include "inc/sidebar.php"; ?>
					</div>
					<?php include "inc/script.php"; ?>
					<script type="text/javascript">
						$("#del_subject").click(function(){
							var conf = confirm("Are you sure you want to delete the selected Subjects?");
							if(conf == true){
								$("#submit_subject").click();
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

						$('table #editsub').click(function() {
							var tr = $(this).closest('tr');
							var subid = tr.find('input:checkbox').val();
							var subname = tr.children('td:eq(0)').text();
							var desc = tr.children('td:eq(1)').text();
							var ylevel = $(this).data("id");
							$("#subid").val(subid);
							$("#desc").val(desc);
							$("#subjectname").val(subname);
							$("#cboYearLevel").val(ylevel);
							$("#btn_back").show();
							$("#btn_edit").show();
							$("#btnAddSubjects").hide();
						});

						$("#btn_back").click(function(){
							$("#clear").click();
							$("#btn_back").hide();
							$("#btn_edit").hide();
							$("#btnAddSubjects").show();
						})
					</script>
				</body>
				</html>