<?php
	require('../include/config.php');
	$adminname = $_SESSION['employee_name'];
	$empid = 2;
	$what = 1;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Employees Section</title>
		<link rel="stylesheet" type="text/css" href="admin.css">
	</head>
	<body>
		<div id = "userstrip">
			<p>Welcome Admin: <span><?php echo $adminname; ?></span> | <a href = "" style = "color: blue;">Logout?</a></p>
		</div>
			<div id = "navigation">
				<nav>
					<ul>
					<li><a href="index.php">Home</a></li>
						<li><a href = "#">Customers</a></li>
						<li><a href = "#">Users</a></li>
						<li class = "active"><a href = "#">Employees</a></li>
						<li><a href = "#">Tasks</a></li>
						<li><a href = "#">Schedule</a></li>
					</ul>
				</nav>
			</div>
			<div id = "commandsstrip">
				<div>
					<h3>Other Options</h3>
				</div>
				<ul>
					<li><a href = "addemployee.php">Add Employee</a></li>
					<li><a href = "deletedemployees.php">View Deleted Employees</a></li>
					<li><a href = "index.php">Back to Home</a></li>
				</ul>
			</div>
			<div id = "displayeddata">
				<table>
					<thead><th colspan="10">Employee Details</th>
					<tr class = "titles">
						<th>Employee No</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Other Names</th>
						<th>National ID No</th>
						<th>Phone Number</th>
						<th>Location</th>
						<th>Role</th>
						<th>User ID</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
						$query = "SELECT e.employee_id, e.employee_fname, e.employee_lname, e.employee_onames, e.nationalidno, e.phonenumber, e.location, r.role_name, e.user_id FROM employee e, role r WHERE r.role_id = e.role_id AND e.is_deleted = 0 ORDER BY 	e.employee_id ASC";

						$result = mysql_query($query) or die(mysql_error());

						$rowcount = mysql_num_rows($result);

						if ($rowcount < 1) {
							echo "<tr>";
							echo "<td colspan = '10'>No Employee Records to Display</td>";
							echo "</tr>";
						}
						else
						{
							while ($row = mysql_fetch_array($result)) {
								echo "<tr>";
								echo "<td>{$row[0]}</td>";
								echo "<td>{$row[1]}</td>";
								echo "<td>{$row[2]}</td>";
								echo "<td>{$row[3]}</td>";
								echo "<td>{$row[4]}</td>";
								echo "<td>{$row[5]}</td>";
								echo "<td>{$row[6]}</td>";
								echo "<td>{$row[7]}</td>";
								echo "<td>{$row[8]}</td>";
								echo "<td><a href = 'editemployee.php?what=1&&empid={$row[0]}'>Update</a> | <a href = 'editemployee.php?what=2&&empid={$row[0]}'>Delete</a></td>";
								echo "</tr>";
							}
						}
					?>
					</tbody>
				</table>
			</div>
	</body>
</html>