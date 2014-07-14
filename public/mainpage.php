<?php
	require('../include/config.php');
	$customername = $_SESSION['customer_name'];
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../stylesheets/main.css">
	</head>
	<body>
		<div id = "userstrip">
			<p>Welcome Back <span><?php echo $customername; ?></span> | <a href = "" style = "color: blue;">Logout?</a></p>
		</div>
	</body>
</html>