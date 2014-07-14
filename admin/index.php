<?php
	require('../include/config.php');
	$adminname = $_SESSION['employee_name'];
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="admin.css">
	</head>
	<body>
		<div id = "userstrip">
			<p>Welcome Admin: <span><?php echo $adminname; ?></span> | <a href = "" style = "color: blue;">Logout?</a></p>
		</div>
			<div id = "navigation">
				<nav>
					<ul>
					<li><a href="#">Home</a></li>
						<li><a href = "#">Customers</a></li>
						<li><a href = "#">Users</a></li>
						<li class = "active"><a href = "#">Employees</a></li>
						<li><a href = "#">Tasks</a></li>
						<li><a href = "#">Schedule</a></li>
					</ul>
				</nav>
			</div>
			<div id = "maincontent">
				<div id = "menuwrapper">
					<a href = "#"><div id = "topleftmenu"><p>User</p></div></a>
					<a href = "employee.php"><div id = "toprightmenu"><p>Employees</p></div></a>
					<a href="#"><div id = "bottomleftmenu"><p>Customers</p></div></a>
					<a href="#"><div id = "bottomrightmenu"><p>Schedule</p></div></a>
				</div>
			</div>
	</body>
</html>