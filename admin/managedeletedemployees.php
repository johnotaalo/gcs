<?php
	include ("../include/config.php");

	if(isset($_GET['what'])&& isset($_GET['empid']))
	{
		$whattodo = $_GET['what'];
		$empid = $_GET['empid'];

		if ($whattodo == 1) {
			$sql = "DELETE FROM employee WHERE employee_id = $empid";

			$result = mysql_query($sql);

			if($result)
			{
				header("location: deletedemployees.php");
			}
			else
			{
				echo "Could not delete the employee. Review this Error: " . mysql_error();
			}
		}
		else if ($whattodo == 2) {
			$sql = "UPDATE employee SET is_deleted = 0 WHERE employee_id = $empid";

			$result = mysql_query($sql);

			if($result)
			{
				header("location: deletedemployees.php");
			}
			else
			{
				echo "Could not delete the employee. Review this Error: " . mysql_error();
			}
		}
	}
	else
	{
		
	}
?>