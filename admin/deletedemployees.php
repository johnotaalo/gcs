<?php
	include ("../include/config.php");

	$sql = "SELECT * FROM employee WHERE is_deleted = 1";

	$result = mysql_query($sql) or die(mysql_error());

	$num_rows = mysql_num_rows($result);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Deleted Employees</title>
		<style type="text/css">
		a
		{
			text-decoration: none;
			color: #0099FF;
		}
		a:hover
		{
			color: blue;
		}
		table
		{
			border-collapse: collapse;
			background-color: #e3e3e3;
			font-family: times, tahoma, verdana, times;
		}
		td, th
		{
			border: 1px solid #f3f3f3;
		}

		table tbody
		{
			cursor: pointer;
		}

		table tbody tr:hover
		{
			background-color: #fff;
		}
		</style>
	</head>
	<body>
	<a href = "employee.php">Go Back</a>
		<table>
			<thead>
				<tr>
					<th colspan="9">DELETED EMPLOYEES</th>
				</tr>
				<tr>
					<th>Employee No</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Other Names</th>
					<th>National ID No</th>
					<th>Phone Number</th>
					<th>Location</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if ($num_rows < 1) {
					echo "<tr>";
					echo "<td colspan = '9' style = 'text-align:center;'>No Records to Display</td>";
					echo "</tr>";
				}
				else{
					while ($row = mysql_fetch_array($result)) {
						echo "<tr>";
						echo "<td>{$row[0]}</td>";
						echo "<td>{$row[1]}</td>";
						echo "<td>{$row[2]}</td>";
						echo "<td>{$row[3]}</td>";
						echo "<td>{$row[4]}</td>";
						echo "<td>{$row[5]}</td>";
						echo "<td>{$row[6]}</td>";
						echo "<td><a href = 'managedeletedemployees.php?what=1&&empid={$row[0]}'>Permanently Delete</a> | <a href = 'managedeletedemployees.php?what=2&&empid={$row[0]}'>Restore</a></td>";
						echo "</tr>";
					}
				}
				?>
			</tbody>
			<tfoot></tfoot>
		</table>
	</body>
</html>