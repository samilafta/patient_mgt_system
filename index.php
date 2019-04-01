<?php
session_start();
require_once "functions/queries.php";
require_once "functions/functions.php";



if (isset($_POST['login']))   {
    $uname = validate($_POST['uname']);
    $pwd = $_POST['pwd'];

    if ($admin = loginAdmin($uname, $pwd))   {
        session($admin);
        redirect("admin/index.php");
    }
    elseif($opd = loginOpd($uname, $pwd))    {
        session($opd);
        redirect("opd/index.php");
    }
    else if ($doc = loginDoctor($uname, $pwd))  {
        session($doc);
        redirect("doctor/index.php");
    }
    else if ($lab = loginLab($uname, $pwd))  {
        session($lab);
        redirect("lab/index.php");
    }
    else if ($phar = loginPharmarcy($uname, $pwd))  {
        session($phar);
        redirect("pharmacy/index.php");
    }

    else    {
        redirect("index.php?error");
    }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Effan-V Clinic</title>

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/animate-3.5.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>
<body>

    <div id="banner">
        <div class="bg-color">

            <div class="logo">
                <div class="container animated slideInRight">
                    <img src="assets/img/cliniclogo.png" alt="" />
                </div>
            </div>

            <div class="signin">

                <div class="container">
                    <div class="row">
                        <div class="col-sm-offset-3 col-sm-4">
                            <div class="form">

                                <?php
                                if(isset($_GET['error'])) {
                                    ?>
                                    <div class="alert alert-danger">
                                        <i class="fa fa-times-circle"></i> Wrong Credentials. Please try again.
                                    </div>
                                    <?php
                                }
                                ?>

                                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                    <h1>Login </h1>
                                    <div class="form-group">
                                        <label for="inputUsername">Username</label>
                                        <input class="form-control" id="inputUsername" placeholder="Username" name="uname" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword">Password</label>
                                        <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="pwd" required />
                                    </div>
                                    <button class="btn btn-success btn-block" name="login"><i class="fa fa-sign-in"></i> Login</button>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
                <footer>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-offset-3 col-sm-4">
                                <p class="text-center">All Rights Reserved. Medical Hospital 2018</p>
                            </div>
                        </div>

                    </div>
                </footer>

            </div>


        </div>
    </div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>