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
						<div class="col-sm-8">
							<div class="graph">
								<div class="tables">
									<table class="table table-bordered"> 
										<thead> 
											<tr>
												<th>#</th> 
												<th>First Name</th> 
												<th>Last Name</th> 
												<th>Middle Name</th> 
												<th>Contact</th>
												<th>Username</th>
												<th></th>
											</tr> 
										</thead>
										<tbody> 
											<tr> 
												<th scope="row">1</th>
												<td>Karlo</td> 
												<td>Bonayon</td> 
												<td>Juanitas</td> 
												<td>777748798873</td> 
												<td>sample</td> 
												<td><button class="btn btn-success btn-sm">Edit</button></td>
											</tr> 
										</tbody> 
									</table>
								</div>
							</div>
						</div>

						<div class="col-sm-4">
							<div class="graph">
								<form class="form-horizontal" method="post" name="add_student_form">
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
									<button type="submit" name="btnAddStudent" id="btnAddAdmin" onclick="send()" class="btn btn-primary">Add</button>
									<button type="button" id="clear" class="btn btn-info" onclick="clean()">Clear</button>
									<button type="button" id="btn_back" style="display:none;" class="btn btn-default">Back</button>
									<button type="button" id="btn_edit" style="display:none;" name="edit_yearlevel" class="btn btn-success">Update</button>
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
<?php include "inc/script.php"; ?>
</body>
</html>