<?php
session_start();
require_once "../functions/queries.php";
require_once "../functions/functions.php";

if (!isset($_SESSION['uid']))   {
        redirect("../index.php");
        exit();

}
?>

<?php include "includes/header.php"?>

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Users</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <!-- add new user -->

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add New User</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <?php
                            if(isset($_GET['error'])) {
                                    ?>
                                    <div class="alert alert-danger">
                                        <i class="fa fa-times-circle"></i> &nbsp;An error occurred. Please try again.
                                    </div>
                                    <?php
                            }
                            else if(isset($_GET['created'])) {
                                ?>
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <i class="fa fa-check-circle"></i> Account created successfully.
                                </div>
                                <?php
                            }
                            ?>


                            <form method="post" action="createaccount.php">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Full Name</label>
                                            <input id="name" class="form-control" name="fname" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input id="username" class="form-control" name="uname" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="password">Default Password (MA1234)</label>
                                            <input type="password" id="password" class="form-control" name="pwd" value="MA1234" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select id="status" name="status" class="form-control">
                                                <option value="opd">OPD</option>
                                                <option value="doctor">Doctor</option>
                                                <option value="lab">Lab</option>
                                                <option value="pharmacy">Pharmacy</option>
                                                <option value="admin">Administrator</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <button type="reset" class="btn btn-warning">Reset</button>
                                <button name="adduser" class="btn btn-success">
                                    <i class="fa fa-check"></i> Save
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

<?php include "includes/footer.php"?>