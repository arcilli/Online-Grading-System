<footer>
	<p style="color:#fff;padding-right:200px;">&copy 2017 Online Grading System . All Rights Reserved</p>
</footer>
<!--/sidebar-menu-->
<div class="sidebar-menu">
	<header class="logo">
		<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="student_dashboard.php"> <img id="logo" src="" alt="Logo"/>
	</a> 
</header>
<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
<div class="down">	
	<a href="student_dashboard.php"><img style="width:70px;height:70px;" src="images/man-29.png"></a>
	<a href="student_dashboard.php"><span class=" name-caret"><?php echo $name; ?></span></a>
	<p>User Type: <?php echo $userType; ?></p>
	<ul>
		<li><a class="tooltips" href="profile.php"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
		<li><a class="tooltips" href="logout.php"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
	</ul>
</div>
<!--//down-->
<div class="menu">
	<ul id="menu" >
		<li><a href="student_dashboard.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
		<li><a href="profile.php"><i class="fa fa-user"></i> <span>Profile</span></a></li>
	</ul>
</div>
</div>
<div class="clearfix"></div>	