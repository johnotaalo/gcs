<?php

	function get_from_tb($tablename, $columns, $whereclause)
	{
		$where = implode(' AND ', explode(',', $whereclause));

		$query = "SELECT $columns FROM $tablename WHERE $where";

		$result = mysql_query($query) or die(mysql_error());

		return $result;
	}
	function getrole($userid = NULL)
	{
		$query = "SELECT * FROM employee WHERE user_id = $userid";

		$result = mysql_query($query) or die(mysql_error());

		$values = mysql_fetch_array($result);

		$role = $values['role_id'];

		return $role;
	}

	function count_num_rows($result = NULL)
	{
		$no_of_rows = msql_num_rows($result);

		return $no_of_rows;
	}

?>