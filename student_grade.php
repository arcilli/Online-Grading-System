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
						<li><h2 style="margin-top:0px;"><a>Student - Grades</a></h2></li>
					</ol>
				</div>
				<div class="graph-visual tables-main">
					<h3 class="inner-tittle two">My Grades </h3>
					<div class="graph">
						<div class="tables">
							<button type="submit" name="add_studgrade" class="btn btn-primary">Add Student Grades</button>
							<button type="submit" name="del_studgrade" class="btn btn-danger">Delete</button>
							<button type="submit" name="print" class="btn btn-info">Print Grades</button>
							<table class="table table-bordered"> 
								<thead> 
									<tr>
										<th>#</th> 
										<th>Subject</th> 
										<th>Prelim</th> 
										<th>Midterm</th> 
										<th>Pre Final</th>
										<th>Final</th>
										<th>Average</th>
										<th>Remarks</th>
										<th>Adviser</th>
									</tr> 
								</thead>
								<tbody> 
									<tr> 
										<th scope="row">1</th>
										<td>IT1 - Fundamentals of Computer</td> 
										<td>70</td> 
										<td>60</td> 
										<td>73</td> 
										<td>67</td> 
										<td>21</td> 
										<td>passed</td> 
										<td>Annie Lazaro</td> 
									</tr> 
								</tbody> 
							</table>
						</div>
					</div>
				</div>
			</div>
			<?php include "inc/emp_sidebar.php"; ?>
		</div>
		<?php include "inc/script.php"; ?>
	</body>
	</html>