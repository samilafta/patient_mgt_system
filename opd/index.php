<?php
session_start();
require_once "../functions/functions.php";


if (!isset($_SESSION['uid']))   {
    redirect("../index.php");
    exit();
}

$hid = hospitalID();
?>

<?php include "includes/header.php"?>

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Patients</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <!-- add new user -->

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add New Patient</h2>
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
                                    <i class="fa fa-check-circle"></i> Patient Added successfully.
                                </div>
                                <?php
                            }
                            ?>


                            <form method="post" action="addpatient.php">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="surname">Sur Name</label>
                                            <input id="surname" class="form-control" name="sname" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="firstname">First Name</label>
                                            <input id="firstname" class="form-control" name="fname" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dob">Date of Birth</label>
                                            <input class="form-control" name="dob" data-inputmask="'mask': '99/99/9999'"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="age">Age</label>
                                            <input id="age" class="form-control" name="age" pattern="[0-9]{1,3}" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="sex">Sex</label>
                                            <select id="sex" name="sex" class="form-control">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tel">Mobile Number</label>
                                            <input class="form-control" name="tel" data-inputmask="'mask' : '999 999-9999'">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="haddress">Home Address</label>
                                            <input id="haddress" class="form-control" name="haddress" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="waddress">Occupation</label>
                                            <input id="waddress" class="form-control" name="waddress" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="marital">Marital Status</label>
                                            <select id="marital" class="form-control" name="marital">
                                                <option value="single">Single</option>
                                                <option value="married">Married</option>
                                                <option value="divorced">Divorced</option>
                                                <option value="widowed">Widowed</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurance">Insurance</label>
                                            <select id="insurance" class="form-control" name="insurance">
                                                <option value="no insurance">No Insurance</option>
                                                <option value="nhis">NHIS</option>
                                                <option value="company insurance">Company Insurance</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nhisnum">NHIS Number</label>
                                            <input id="nhisnum" class="form-control" name="nhisnum"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nextofkin">Next of Kin Contact Details</label>
                                            <input id="nextofkin" class="form-control" name="nextofkin"/>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="hid" value="<?php echo $hid; ?>" />

                                <button type="reset" class="btn btn-warning">Reset</button>
                                <button name="addpatient" class="btn btn-success">
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