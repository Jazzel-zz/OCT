<?php
// get database connection
include_once 'config/database.php';

// instantiate user object
include_once 'objects/user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if (isset($_POST['submit'])) {

    // set user property values
    $user->username = $_POST['username'];
    $user->first_name = $_POST['first_name'];
    $user->last_name = $_POST['last_name'];
    $user->email = $_POST['email'];
    $user->address = $_POST['address'];
    $user->date_of_birth = $_POST['date_of_birth'];
    $user->cell_phone = $_POST['cell_phone'];
    $user->work_phone = $_POST['work_phone'];
    $user->password = md5($_POST['password']);

    // create the user
    if ($user->signup()) {
        $user_arr = array(
            "status" => true,
            "message" => "Successfully Signup!",
            "id" => $user->id,
            "username" => $user->username
        );
        echo ("<script>location.href = 'login.php';</script>");
    } else {
        $user_arr = array(
            "status" => false,
            "message" => "Username already exists!"
        );
    }
    print_r(json_encode($user_arr));
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vincent - Signup</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="./assets/css/black-dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Pacifico&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Acme';
        }

        .styled-font {
            font-family: 'Pacifico' !important;
        }

        .batman {
            width: 56%;
        }

        @media only screen and (max-width: 1024px) {
            .batman {
                width: 100%;
            }

            .bat_img {
                display: none;
            }
        }
    </style>

</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 " style="width:80%;">
                <div class="login100-pic js-tilt d-md-none d-lg-block" data-tilt>
                    <br>
                    <br>
                    <img class="bat_img ml-4" src="https://colorlib.com/etc/lf/Login_v1/images/img-01.png" alt="IMG">
                </div>

                <form class="login100-form validate-form batman" style="" action="" name="reg" method="POST">
                    <span class="h1 login100-form-title">
                        Member Signup
                    </span>

                    <div class="row">
                        <div class="col-6">

                            <div class="wrap-input100 validate-input " data-validate="First name is required">
                                <input class="input100" type="text" name="first_name" placeholder="First Name">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </span>
                            </div>

                            <div class="wrap-input100 validate-input" data-validate="Last name is required">
                                <input class="input100" type="text" name="last_name" placeholder="Last name">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                            </div>

                            <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                                <input class="input100" type="text" name="email" placeholder="Email">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                            </div>


                            <div class="wrap-input100 validate-input" data-validate="Username is required">
                                <input class="input100" type="text" name="username" placeholder="Username">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                            </div>

                            <div class="wrap-input100 validate-input" data-validate="Password is required">
                                <input class="input100" type="password" name="password" placeholder="Password">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                            </div>




                        </div>
                        <div class="col-6">


                            <div class="wrap-input100 validate-input" data-validate="Password is required">
                                <input class="input100" type="number" name="work_phone" placeholder="Work Phone">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                            </div>

                            <div class="wrap-input100 validate-input" data-validate="Password is required">
                                <input class="input100" type="number" name="cell_phone" placeholder="Cell Phone">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                            </div>

                            <div class="wrap-input100 validate-input" data-validate="Password is required">
                                <input class="input100" type="number" name="date_of_birth" placeholder="Date of Birth">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                            </div>

                            <div class="wrap-input100 validate-input" data-validate="Password is required">
                                <input class="input100" type="text" name="address" placeholder="Address">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                            </div>


                        </div>

                    </div>




                    <div class="container-login100-form-btn">

                        <input class="login100-form-btn" type="submit" name="submit" value="Register" onclick="return(submitreg());">

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