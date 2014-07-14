<?php
	//get posted in the form
	require('../include/config.php');
	include('../include/function.php');
	$FirstName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];
	$OtherName = $_POST['OtherName'];
	$NationalID = $_POST['NationalIDNo'];
	$PhoneNumber = $_POST['PhoneNumber'];
	$Location = $_POST['Location'];
	$role = $_POST['Role_ID'];
	$empid = $_GET['empid'];
	
	$query = "UPDATE employee SET employee_fname = '$FirstName', employee_lname = '$LastName', employee_onames = '$OtherName', nationalidno = '$NationalID' WHERE employee_id = $empid";

	$result = mysql_query($query) or die(mysql_error());

	if (!$result) {
		echo "Error in Updating Record";
	}
	else
	{
		echo "Success";
	}
?>