<?php 
session_start();
include_once 'include/class.user.php';
$user = new User();

if (isset($_POST['submit'])) { 
		extract($_POST);   
	    $login = $user->check_login($emailusername, $password);
	    if ($login) {
	        // Registration Success
	       header("location:index.php");
	    } else {
	        // Registration Failed
	        echo 'Wrong username or password';
	    }
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OCT - Login</title>
<link rel="stylesheet" href="assets/css/login.css">

    <?php include_once('./components/registration/stylesheets.php') ?>
   
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="https://colorlib.com/etc/lf/Login_v1/images/img-01.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="" method="POST" name="login">
                    <span class="login100-form-title">
                        Member Login
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Username is required">
                        <input class="input100" type="text" name="emailusername" placeholder="Username or Email" required>
                        <span class=" focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password"  required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        
              <input  class="login100-form-btn" type="submit" name="submit" value="Login" onclick="return(submitlogin());">

                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="#">
                            Username / Password?
                        </a>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="./signup.php">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include_once('./components/registration/scripts.php') ?>

</body>

</html>