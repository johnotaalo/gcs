<?php
	//database connection constants
	define ("DB_SERVER","localhost");
	define ("DB_USER", "root");
	define ("DB_PASS", "");
	define ("DB_NAME", "gcs");

	$connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS) or die("Database connection error: " . mysql_error());

	//connecting to the database
	$db_select = mysql_select_db(DB_NAME, $connection) or die("Database connection error: " . mysql_error());

	//connection successful

?>