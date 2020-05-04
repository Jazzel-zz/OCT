<?php 
include_once 'include/class.user.php';
$user = new User();
// Checking for user logged in or not
    /*if (!$user->get_session())
    {
       header("location:index.php");
    }*/
if (isset($_POST['submit'])){
        extract($_POST);
        $register = $user->reg_user($ufirst_name,$ulast_name, $uname, $upass, $uemail);
        if ($register) {
            // Registration Success
            echo "<div style='text-align:center'>Registration successful <a href='login.php'>Click here</a> to login</div>";
        } else {
            // Registration Failed
            echo "<div style='text-align:center'>Registration failed. Email or Username already exits please try again.</div>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OCT - Signup</title>
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

                <form class="login100-form validate-form " action="" name="reg" style="width: 350px" method="POST">
                    <span class="login100-form-title">
                        Member Signup
                    </span>

                    <div class="form-inline">

                        <div class="wrap-input100 validate-input w-50 pr-1" data-validate="First name is required">
                            <input class="input100" type="text" name="ufirst_name" placeholder="First Name">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input pl-1 w-50" data-validate="Last name is required">
                            <input class="input100" type="text" name="ulast_name" placeholder="Last name">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="uemail" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="form-inline">

                        <div class="wrap-input100 validate-input w-50 pr-1" data-validate="Username is required">
                            <input class="input100" type="text" name="uname" placeholder="Username">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input w-50 pl-1" data-validate="Password is required">
                            <input class="input100" type="password" name="upass" placeholder="Password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>

                    </div>


                    <div class="container-login100-form-btn">

                        <input class="login100-form-btn" type="submit" name="submit" value="Register"
                            onclick="return(submitreg());">

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
                        <a class="txt2" href="./login.php">
                            Already have an account ? Click here
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include_once('./components/registration/scripts.php') ?>

    <script>
        function submitreg() {
            var form = document.reg;
            if (form.name.value == "") {
                alert("Enter name.");
                return false;
            } else if (form.uname.value == "") {
                alert("Enter username.");
                return false;
            } else if (form.upass.value == "") {
                alert("Enter password.");
                return false;
            } else if (form.uemail.value == "") {
                alert("Enter email.");
                return false;
            }
        }
    </script>
</body>

</html>