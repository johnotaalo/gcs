<?php
	error_reporting(1);
	require('../include/config.php');
	include('../include/function.php');
	function page_redirect($location)
 	{
   		echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$location.'">';
   		exit;
 	}
	$adminname = $_SESSION['employee_name'];
	$whattodo = $_GET['what'];
	$empid = $_GET['empid'];
		#checks whether the data that came in is meant to be deleted or updated
		if ($whattodo == 1) {
			#if data is meant to be updated,
			$query = "SELECT * FROM employee e, role r WHERE e.employee_id = $empid LIMIT 1";

			$result = mysql_query($query) or die(mysql_error());

			$results = mysql_fetch_array($result);

			$firstname = $results[1];
			$lastname = $results[2];
			$othername = $results[3];
			$nationalidno = $results[4];
			$phonenumber = $results[5];
			$location = $results[6];
			
			$role_id = $results['role_id'];

		}
		else if($whattodo == 2)
		{
			$query = "UPDATE employee SET is_deleted = 1 WHERE employee_id = $empid";

			$result = mysql_query($query) or die(mysql_error());

			header("location:employee.php");
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
			<form method = "POST" action = "addemployeeinfo.php?empid=<?php echo $empid;?>" enctype='multipart/form-data' id = "employee_form">
				<table>
					<tr>
						<td>First Name</td>
						<td><input type = "text" name = "FirstName" required value = "<?php echo $firstname; ?>"></td>
					</tr>
					<tr>
						<td>Last Name</td>
						<td><input type = "text" name = "LastName" required value = "<?php echo $lastname; ?>"></td>
					</tr>
					<tr>
						<td>Other Name</td>
						<td><input type = "text" name = "OtherName" required value = "<?php echo $othername; ?>"></td>
					</tr>
					<tr>
						<td>National ID No</td>
						<td><input type = "text" name = "NationalIDNo" required value = "<?php echo $nationalidno; ?>"></td>
					</tr>
					<tr>
						<td>Phone Number</td>
						<td><input type = "text" name = "PhoneNumber" required value = "<?php echo $phonenumber; ?>"></td>
					</tr>
					<tr>
						<td>Location</td>
						<td><input type = "text" name = "Location" required value = "<?php echo $location; ?>"></td>
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
											if ($values['role_id'] == $role_id) {
												echo " selected";
											}
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
			<span id = "result">Awaiting Save Command</span> | <a href = "employee.php">Go Back</a>
		</fieldset>
		<script type="text/javascript" src = "../scripts/jquery.js"></script>
		<script type="text/javascript" src = "../scripts/main_script.js"></script>
	</body>
</html>