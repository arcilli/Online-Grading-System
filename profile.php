<!DOCTYPE html>
<html>
<head>
	<title>Profile - Online Grading System </title>
	<?php include "inc/navbar.php"; ?>
</head>
<body>
	<div class="page-container">
		<div class="left-content">
			<?php include "inc/header.php"; ?>
			<div class="outter-wp">
				<div class="sub-heard-part">
					<ol class="breadcrumb m-b-0">
						<li><h2 style="margin-top:0px;"><a>My Profile - <?php echo $name; ?></a></h2></li>
					</ol>
				</div>
				<div class="graph-visual tables-main">
					<div class="graph">
						<form class="form-horizontal" method="post" name="add_student_form">
							<div class="form-group">
								<label>First Name</label>
								<input type="text" class="form-control" name="txtFirstname" id="txtFirstname" value="<?php echo $fname; ?>" required>
							</div>
							<div class="form-group">
								<label>Last Name</label>
								<input type="text" class="form-control" name="txtLastname" id="txtLastname" value="<?php echo $lname; ?>" required>
							</div>
							<div class="form-group">
								<label>Middle Name</label>
								<input type="text" class="form-control" name="txtMiddlename" id="txtMiddlename" value="<?php echo $mname; ?>" required>
							</div>
							<div class="form-group">
								<label>Contact</label>
								<input type="text" class="form-control" name="txtContact" id="txtContact" value="<?php echo $contact; ?>" required>
							</div>
							<div class="form-group">
								<label>New Password</label>
								<input type="password" class="form-control" name="txtContact" id="txtContact" required>
							</div>
							<div class="form-group">
								<label>Confirm New Password</label>
								<input type="password" class="form-control" name="txtContact" id="txtContact" required>
							</div>
							<input type="hidden" id="id" name="id" value="">
							<button type="button" id="btn_edit" name="edit_yearlevel" class="btn btn-success">Update</button>
							<button type="button" id="clear" class="btn btn-info" onclick="clean()">Clear</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php
		if($userType === "admin") {
			include "inc/sidebar.php";
		} else if($userType === "teacher") {
			include "inc/emp_sidebar.php";
		} else if($userType === "student") {
			include "inc/stud_sidebar.php";
		}
		?>
	</div>
	<?php include "inc/script.php"; ?>

	<script>

		function clean()
		{
			$("#txtFirstname").val("");
			$("#txtMiddlename").val("");
			$("#txtLastname").val("");
			$("#txtUsername").val("");
			$("#txtContact").val("");

			$("#btnAddStudent").html("Add");
			$("#clear").html("Clear");

		}

		function edit(obj)
		{

			$("#txtFirstname").val($(obj).attr("firstname"));
			$("#txtMiddlename").val($(obj).attr("middlename"));
			$("#txtLastname").val($(obj).attr("lastname"));
			$("#txtUsername").val($(obj).attr("username"));
			$("#txtContact").val($(obj).attr("contact"));
			$("#id").val($(obj).attr("userid"));

			$("#btnAddStudent").html("Save");
			$("#clear").html("Cancel");

		}

		function send()
		{
			var form = document.add_student_form;

			if($("#btnAddStudent").html() === "Add")
			{
				form.action = "add_student.php";
			}
			else
			{
				form.action = "edit_student.php";
			}

			form.submit();
		}

	</script>

</body>
</html>