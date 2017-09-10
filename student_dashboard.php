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
						<li><h2 style="margin-top:0px;"><a>Dashboard - Student</a></h2></li>
					</ol>
				</div>
				<div class="graph-visual tables-main">
					<h3 class="inner-tittle two">My Grades </h3>
					<div class="graph">
						<?php 
						$query = "SELECT * FROM tblstudentgrade WHERE studentid = '$sessionid'";
						$result = mysqli_query($con, $query);
						if(mysqli_num_rows($result) > 0){
						?>
						<div class="tables">
							<button type="submit" name="add_schoolyear" class="btn btn-primary">Print Grades</button>
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
									<?php while($row = mysqli_fetch_array($result)){ ?>
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
									<?php } ?>
								</tbody> 
							</table>
						</div>
						<?php } else { ?>
						<div class="alert alert-success">No data found.</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php include "inc/stud_sidebar.php"; ?>
		</div>
		<?php include "inc/script.php"; ?>
	</body>
	</html>