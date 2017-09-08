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
												<th>#</th> 
												<th>First Name</th> 
												<th>Last Name</th> 
												<th>Middle Name</th>
												<th>Username</th> 
												<th>Contact</th> 
												<th></th>
											</tr> 
										</thead>
										<tbody> 
											<tr> 
												<th scope="row">1</th>
												<td>2016-2017</td> 
												<td></td> 
												<td></td> 
												<td></td> 
												<td></td>  
												<td><button style="margin:0px;padding:8px;" class="btn btn-success">Edit</button></td> 
											</tr> 
										</tbody> 
									</table>
								</div>
							</div>
						</div>

						<div class="col-sm-5">
							<div class="graph">
								<form class="form-horizontal">
									<div class="form-group">
										<label>Username</label>
										<input type="text" class="form-control" name="uname">
									</div>
									<div class="form-group">
										<label>First Name</label>
										<input type="text" class="form-control" name="fname">
									</div>
									<div class="form-group">
										<label>Last Name</label>
										<input type="text" class="form-control" name="lname">
									</div>
									<div class="form-group">
										<label>Middle Name</label>
										<input type="text" class="form-control" name="mname">
									</div>
									<div class="form-group">
										<label>Contact</label>
										<input type="text" class="form-control" name="contact">
									</div>
									<button type="submit" name="add_emp" class="btn btn-primary">Create</button>
									<button type="reset" id="clear" class="btn btn-info">Clear</button>
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
	</body>
	</html>