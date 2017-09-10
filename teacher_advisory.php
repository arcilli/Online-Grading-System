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
						<li><h2 style="margin-top:0px;"><a>Manage Teacher Advisory</a></h2></li>
					</ol>
				</div>
				<div class="graph-visual tables-main">
					<div class="row">
						<div class="col-sm-7">
							<div class="graph">
								<?php 
								$query = "SELECT * FROM tblteacheradvisory 
								left join usertbl on usertbl.id = tblteacheradvisory.teacherid
								left join tblsubjects on tblsubjects.id = tblteacheradvisory.subjectid
								left join tblclass on tblclass.id = tblteacheradvisory.classid";
								$result = mysqli_query($con, $query)or die(mysqli_error($con));
								if(mysqli_num_rows($result) > 0){
									?>
									<button type="button" id="del_emp_class" class="btn btn-danger">Delete</button>
									<button type="submit" name="del_empclass" id="submit_studclass" style="display:none;">delete</button>
									<div class="tables">
										<table class="table table-bordered"> 
											<thead> 
												<tr>
													<th><input type="checkbox" id="checkall"></th> 
													<th>Teacher Name</th> 
													<th>Class</th> 
													<th>Subject</th>
													<th></th>
												</tr> 
											</thead>
											<tbody> 
												<?php while($row = mysqli_fetch_array($result)) {  ?>
												<tr> 
													<th scope="row"><input type="checkbox" id="record" name="subid[]" value="<?php echo $row['id']; ?>"></th>
													<td><?php echo $row['fname']." ".$row['mname']." ".$row['lname']; ?></td>
													<td><?php echo $row['classname']; ?></td> 
													<td><?php echo $row['subjectname']." - ".$row['description']; ?></td>  
													<td><button type="button" style="margin:0px;padding:8px;" id="edit_studclass" class="btn btn-success">Edit</button></td> 
												</tr> 
												<?php } ?>
											</tbody> 
										</table>
									</div>
									<?php }else{ ?>
									<div class="alert alert-danger">No data found.</div>
									<?php } ?>
								</div>
							</div>

							<div class="col-sm-5">
								<div class="graph">
									<form class="form-horizontal" action="crud_function.php" method="post">
										<input type="hidden" id="studclass_id" name="studclass_id">
											<div class="form-group">
												<label>Teacher:</label>
												<select class="form-control" style="padding:8px;" name="cboStudent"  id="cboempid" required>
													<option></option>
													<?php 
													$query = "SELECT * FROM usertbl where usertype='teacher'";
													$result = mysqli_query($con, $query);
													while($row = mysqli_fetch_array($result)){
														?>
														<option value="<?php echo $row['id']; ?>"><?php echo $row['fname']." ".$row['lname']; ?></option>
														<?php } ?>
													</select>
												</div>
												<div class="form-group">
												<label>Class:</label>
												<select class="form-control" style="padding:8px;" name="cboclass"  id="cboclass" required>
													<option></option>
													<?php 
													$query = "SELECT * FROM tblclass";
													$result = mysqli_query($con, $query);
													while($row = mysqli_fetch_array($result)){
														?>
														<option value="<?php echo $row['id']; ?>"><?php echo $row['classname']; ?></option>
														<?php } ?>
													</select>
												</div>
												<div class="form-group">
													<label>Subject:</label>
													<select class="form-control" style="padding:8px;" name="cbosubjectid"  id="cbosubjectid" required>
														<option></option>
														<?php 
														$query = "SELECT * FROM tblsubjects";
														$result = mysqli_query($con, $query);
														while($row = mysqli_fetch_array($result)){
															?>
															<option value="<?php echo $row['id']; ?>"><?php echo $row['subjectname']." - ".$row['description']; ?></option>
															<?php } ?>
														</select>
													</div>
													<button type="submit" id="add_empclass" name="add_empclass" class="btn btn-primary">Create</button>
													<button type="reset" id="clear" class="btn btn-info">Clear</button>
													<button type="button" id="btn_back" style="display:none;" class="btn btn-default">Back</button>
													<button type="submit" id="btn_edit" style="display:none;" name="edit_empclass" class="btn btn-success">Update</button>
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
							$("#del_emp_class").click(function(){
								var conf = confirm("Are you sure you want to delete the selected student class?");
								if(conf == true){
									$("#submit_empclass").click();
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

							$('table #edit_studclass').click(function() {
								var tr = $(this).closest('tr');
								var id = tr.find('input:checkbox').val();
								var subname = tr.children('td input[type="hidden"]:eq(0)').text();
								var desc = tr.children('td input[type="hidden"]:eq(1)').text();
								var ylevel = $(this).data("id");
								$("#studclass_id").val(id);
								$("#cboclass").val(desc);
								$("#cboStudent").val(subname);
								$("#cbosubjectid").val(ylevel);
								$("#btn_back").show();
								$("#btn_edit").show();
								$("#add_empclass").hide();
							});

							$("#btn_back").click(function(){
								$("#clear").click();
								$("#btn_back").hide();
								$("#btn_edit").hide();
								$("#add_empclass").show();
							})
						</script>
					</body>
					</html>