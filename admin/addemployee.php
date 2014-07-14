<?php
	require('../include/config.php');
	if(isset($_POST['submit']))
	{
		$FirstName = $_POST['FirstName'];
		$LastName = $_POST['LastName'];
		$OtherName = $_POST['OtherName'];
		$NationalID = $_POST['NationalIDNo'];
		$PhoneNumber = $_POST['PhoneNumber'];
		$Location = $_POST['Location'];
		$role = $_POST['Role_ID'];

		$query = "INSERT INTO employee (employee_fname, employee_lname, employee_onames, nationalidno, phonenumber, location, role_id) VALUES ('$FirstName', '$LastName', '$OtherName', '$NationalID', '$PhoneNumber', '$Location', $role)";

		$result = mysql_query($query) or die(mysql_error());

		header("location: employee.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<style type="text/css">
			input[type = "text"], select
			{
				width: 300px;
				padding:10px;
				font-size: 15px;
			}

			select
			{
				background-color: #D0D0D0 ;
			}
		</style>
	</head>
	<body>
		<fieldset>
			<form method = "POST" action = "" enctype='multipart/form-data' id = "employee_form">
				<table>
					<tr>
						<td>First Name</td>
						<td><input type = "text" name = "FirstName" required></td>
					</tr>
					<tr>
						<td>Last Name</td>
						<td><input type = "text" name = "LastName" required></td>
					</tr>
					<tr>
						<td>Other Name</td>
						<td><input type = "text" name = "OtherName" required></td>
					</tr>
					<tr>
						<td>National ID No</td>
						<td><input type = "text" name = "NationalIDNo" required></td>
					</tr>
					<tr>
						<td>Phone Number</td>
						<td><input type = "text" name = "PhoneNumber" required></td>
					</tr>
					<tr>
						<td>Location</td>
						<td><input type = "text" name = "Location" required></td>
					</tr>
					<tr>
						<td>Role</td>
						<td>
							<select name = "Role_ID">
								<option value = "0">Select a Role</option>
								<?php
									$query = "SELECT * FROM role";

									$result = mysql_query($query) or die(mysql_error());

									while ($values = mysql_fetch_array($result)) {
										echo "<option value = {$values['role_id']}";
										echo ">{$values['role_name']}</option>";
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td><input type = "submit" value="Save" name = "submit" id = "submitbutton"/></td>
					</tr>
				</table>
			</form>
			<span id = "result"></span>
		</fieldset>
	</body>
</html>