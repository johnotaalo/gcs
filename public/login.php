<?php
	require('../include/publicconfig.php');
	if(isset($_POST['submit']))
	{
		$username = $_POST['useremail'];
		$password = $_POST['userpassword'];

		$query = "SELECT * FROM users WHERE username = '$username' AND userpassword = '$password'";

		$result = mysql_query($query) or die(mysql_error());

		$rows = mysql_num_rows($result);

		if($rows == 1)
		{
			$results = mysql_fetch_array($result);

			$user_id = $results['user_id'];

			$query = "SELECT * FROM employee WHERE user_id = $user_id";

			$result = mysql_query($query) or die(mysql_error());

			$result_count = mysql_num_rows($result);

			if($result_count == 0)
			{
				$query = "SELECT * FROM customer WHERE user_no = $user_id";

				$result = mysql_query($query);

				$results = mysql_fetch_array($result);

				$c_fname = $results['customer_fname'];
				$c_lname = $results['customer_lname'];

				$customer_name = $c_fname . " " . $c_lname;

				$_SESSION['username'] = $username;
				$_SESSION['customer_name'] = $customer_name;

				header('location: ../index.php');

			}
			else
			{
				$results = mysql_fetch_array($result);

				$roleid = $results['role_id'];
				$e_fname = $results['employee_fname'];
				$e_lname = $results['employee_lname'];

				$employee_name = $e_fname . " " .$e_lname;

				$_SESSION['username'] = $username;
				$_SESSION['employee_name'] = $employee_name;
			}
		}

		else
		{
			$msg = "Invalid Login Information. Please Try Again";
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Garbage Collection System - Login</title>
    <link rel="stylesheet" href="login.css" media="screen" type="text/css" />
    <script type="text/javascript" src = "../scripts/jquery.js"></script>
</head>
<body>
  <html lang="en-US">
	<head>
	<meta charset="utf-8">
	<title>Social Navigation</title>
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
    <div id="login-form">
    	<?php if(isset($msg)){?>
    	<p class = "warning"><?php echo $msg;?></p>
    	<?php }?>
        <h3>Imara GCS Login</h3>
        <fieldset>
            <form method="POST" action = "">
                <input type="email" name = "useremail" required placeholder = "Email">
                <input type="password" name = "userpassword" required>
                <input type="submit" value="Login" id = "submit" name = "submit">
                <footer class="clearfix">
                    <p><span class="info">?</span><a href="#lostme">Forgot Password</a></p>
                </footer>
            </form>
        </fieldset>
    </div> <!-- end login-form -->
    <div id = "information"></div>
</body>
</html>
</body>

</html>