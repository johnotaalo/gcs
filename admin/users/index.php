<?php
	include ("../../include/config.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<style type="text/css">
			table
			{
				border-collapse: collapse;
			}
			table thead tr th, table tbody td
			{
				border: 1px solid #e5e5e5;
			}
		</style>
	</head>
	<body>
		<div>
			<ul>
				<li><a href = "">Add User</a></li>
				<li><a href = "">View Deleted Users</a></li>
				<li><a href = "../index.php">Go Back</a></li>
			</ul>
		</div>
		<div id = "userstable">
			<table>
				<thead>
					<tr>
						<th colspan = "6">System Users</th>
					</tr>
					<tr>
						<th>User ID</th>
						<th>User Name</th>
						<th>Last Login</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$sql = "SELECT DISTINCT u.user_id, u.username, us.date_time FROM users u, user_sessions us WHERE us.user_id = u.user_id AND u.is_active = 0 GROUP BY u.user_id";

					$result = mysql_query($sql) or die(mysql_error());

					$num_rows = mysql_num_rows($result);

					while ($row = mysql_fetch_array($result)) {
						echo "<tr>";
						echo "<td>{$row[0]}</td>";
						echo "<td>{$row[1]}</td>";
						echo "<td>{$row[2]}</td>";
						echo "<td><a href = 'deactivateaccount.php?user_id={$row[0]}'>Deactivate</a> | <a href = 'userhistory.php?user_id={$row[0]}'>View Histrory</a></td>";
						echo "</tr>";
					}
				?>
				</tbody>
			</table>
		</div>
	</body>
</html>