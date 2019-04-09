<!DOCTYPE HTML>
<html>
<head>
    <title>Online Grading System - Login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <?php include "inc/navbar.php"; ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

</head>
<?php
include "conn.php";
session_start();
if (!empty($_SESSION['username'])) {
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        header("Location: index.php");
    }
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $row = mysqli_fetch_array($result);
    $userType = $row["usertype"];
    if ($userType === "admin") {
        header("LOCATION: admin_dashboard.php");
    } else if ($userType === "teacher") {
        header("LOCATION: teacher_dashboard.php");
    } else if ($userType === "student") {
        header("LOCATION: student_dashboard.php");
    }
}
//?>
<!--<body>-->
<!--<main>-->
<!--<div class="error_page">-->
<!--    <div class="error-top">-->
<!--        <h2 id="page-title">Online Grading System</h2>-->
<!--        <div class="login">-->
<!--            <h3 class="inner-tittle t-inner">Login Page</h3>-->
<!--            <form action="validate.php" method="post">-->
<!--                <input type="text" class="text" name="txtUsername" placeholder="Username">-->
<!--                <input type="password" name="txtPassword" placeholder="Password">-->
<!--                <div class="submit"><input type="submit" name="btnSubmit" value="Login"></div>-->
<!--                <div class="clearfix"></div>-->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--</main>-->
<!---->
<!--<footer>-->
<!--    <div id="footer">-->
<!--    <p>&copy 2019 Online Grading System . All Rights Reserved</p>-->
<!--    </div>-->
<!--</footer>-->

<!--</body>-->

<body>
<main>

    <div id="login-form">
        <form action="validate.php" method="post">
            <h2 class="text-center">Log in</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="txtUsername" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="txtPassword"placeholder="Password" required="required">
            </div>
            <div class="form-group" id="login-button">
                <button type="submit" class="btn btn-primary btn-block">Log in</button>
            </div>
            <div class="clearfix">
                <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
                <a href="#" class="pull-right">Forgot Password?</a>
            </div>
        </form>
    </div>
</main>
<footer>
    <div>&copy 2019 Online Grading System</div>
</footer>
<?php include "inc/script.php"; ?>
</body>
</html>