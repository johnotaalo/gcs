<?php
    require('include/config.php');
    include('include/function.php');
    if(isset($_SESSION['username']))
    {
        $roleid = $_SESSION['role'];

        if(!$roleid)
        {
            header("location: public/mainpage.php");
        }
        else
        {
            header("location: admin");
        }
    }
        if(isset($_POST['submit']))
        {
            $username = $_POST['user_email'];
            $password = $_POST['user_password'];

            $result = get_from_tb('users', '*', "username = '$username', userpassword = '$password'");

            $rows = mysql_num_rows($result);

            if($rows == 1)
            {
                $results = mysql_fetch_array($result);

                $user_id = $results['user_id'];

                $result = get_from_tb('employee', '*', "user_id = '$user_id'");

                $result_count = mysql_num_rows($result);

                if($result_count == 0)
                {

                    $result = get_from_tb('customer', '*', "user_no = '$user_id'");

                    $results = mysql_fetch_array($result);

                    $c_fname = $results['customer_fname'];
                    $c_lname = $results['customer_lname'];

                    $customer_name = $c_fname . " " . $c_lname;

                    $_SESSION['username'] = $username;
                    $_SESSION['userno'] = $user_id;
                    $_SESSION['customer_name'] = $customer_name;

                    header('location: public/mainpage.php');

                }
                else
                {
                    $results = mysql_fetch_array($result);

                    $roleid = $results['role_id'];
                    $e_fname = $results['employee_fname'];
                    $e_lname = $results['employee_lname'];

                    $employee_name = $e_fname . " " .$e_lname;

                    $_SESSION['role'] = $roleid;
                    $_SESSION['username'] = $username;
                    $_SESSION['userno'] = $user_id;
                    $_SESSION['employee_name'] = $employee_name;

                    if($roleid == 1)
                    {
                        header("location: admin");
                    }
                    else if ($roleid == 2) {
                       header("location: employee");
                    }
                    else
                    {
                        echo "No Shit";
                    }
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
        <title>Imara Garbage Collcetion System</title>
        <link rel="stylesheet" type="text/css" href="stylesheets/main.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/welcomepage.css">
    </head>
    <body>
    <?php
        if (isset($msg)) {
            echo $msg;
        }
    ?>
        <div id = "head">
            <h1>IMARA GARBAGE COLLECTION SYSTEM</h1>
            <h2>Your Garbage Collection Partner</h2>
        </div>
        <div id = "container">
        <div id = "innercontainer">
            <div id = "form_holder">
            <h3>Have an Account? Login Here</h3>
            <fieldset>
                <form method="POST" action="">
                    <input type = "email" name = "user_email" placeholder = "Email" required>
                    <input type = "password" name = "user_password" required>
                    <input type = "submit" name = "submit" value = "Login">
                    <footer class="clearfix">
                        <p><span class="info">?</span><a href="#lostme">Forgot Password</a></p>
                    </footer>
                </form>
            </fieldset>
            </div>
            <div id = "or">
                <h2>OR</h2>
            </div>
            <div id = "rightoptions">
                <div>
                    <a href = "">Register Here</a>
                    <p>OR</p>
                    <a href="">Read More On Us</a>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>