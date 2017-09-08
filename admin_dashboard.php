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
					<div class="graph">
						<button type="submit" class="btn btn-primary">Create</button>
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
										<th>User Type</th>
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
										<td>Administrator</td> 
									</tr> 
								</tbody> 
							</table>
						</div>
					</div>
				</div>
			</div>
			<footer>
				<p style="color:#fff;padding-right:200px;">&copy 2017 Online Grading System . All Rights Reserved</p>
			</footer>
			<?php include "inc/sidebar.php"; ?>
		</div>
		<?php include "inc/script.php"; ?>
	</body>
	</html>