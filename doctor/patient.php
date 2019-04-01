<?php
session_start();
require_once "../functions/queries.php";
require_once "../functions/functions.php";

if (!isset($_SESSION['uid']))   {
    redirect("../index.php");
    exit();
}

if (!isset($_GET['id']))   {
    redirect("index.php");
}


$id = $_GET['id'];
$row = viewPatient($id);


?>


<?php include "includes/header.php"?>

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Patient Details</h3>
                </div>
            </div>

            <div class="clearfix"></div>


            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Medical Information About Patient</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <div class="row">

                                <!-- patient details -->
                                <div class="col-md-4 profile_left">
                                    <div class="profile_img">
                                        <div id="crop-avatar">
                                            <!-- Current avatar -->
                                            <img class="img-responsive avatar-view" src="../assets/img/user.png" alt="Avatar" title="Change the avatar">
                                        </div>
                                    </div>
                                    <h3><?php echo $row['surname']. " ". $row['firstname']; ?></h3>

                                    <ul class="list-unstyled user_data">
                                        <li><i class="fa fa-info-circle"></i> <b>Patient ID: </b> <?php echo $row['patientUniqueID']; ?></li>
                                        <li><i class="fa fa-calendar"></i> <b>DOB:</b> <?php echo $row['dob']; ?> </li>
                                        <li><i class="fa fa-calendar"></i> <b>Age:</b> <?php echo $row['age']; ?> Years</li>
                                        <li><i class="fa fa-user"></i> <b>Sex: </b> <?php echo $row['sex']; ?> </li>
                                        <li><i class="fa fa-phone"></i> <b>Mobile#: </b> <?php echo $row['tel_num']; ?></li>
                                        <li><i class="fa fa-map-marker"></i> <b>Home: </b> <?php echo $row['home_address']; ?></li>
                                        <li><i class="fa fa-briefcase"></i> <b>Occupation: </b> <?php echo $row['occupation']; ?></li>
                                        <li><i class="fa fa-users"></i> <b>Marital Status: </b> <?php echo $row['marital_status']; ?></li>
                                        <li><i class="fa fa-book"></i> <b>Insurance: </b> <?php echo $row['insurance']; ?> </li>
                                        <li><i class="fa fa-book"></i> <b>NHIS #: </b> <?php echo $row['nhis_number']; ?> </li>
                                        <li><i class="fa fa-user"></i> <b>Next of Kin: </b> <?php echo $row['next_of_kin']; ?> </li>
                                        <li><b>Date Registered: </b> <?php echo $row['date_registered']; ?> </li>
                                    </ul>

                                </div> <!-- /col-md-4 -->


                                <!-- patient medical records -->
                                <div class="col-md-8">

                                    <h3>Medical Records</h3>

                                    <?php
                                    $pid = $row['patientID'];
                                    $sql = "SELECT * FROM appointments WHERE  patient_id = '$pid'";
                                    $run = connectDB()->query($sql);

                                    if ($run->num_rows == 0)   {
                                        ?>
                                        <p>No medical records.</p>

                                        <?php
                                    }   else    {

                                        while($row = $run->fetch_array()) {

                                    ?>

                                    <!-- medical  records of patient -->
                                    <div class="panel-group">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse"
                                                       href="#collapse<?php echo $row['aid']; ?>"
                                                       aria-expanded="false"
                                                       aria-controls="collapse<?php echo $row['aid']; ?>">
                                                        <?php echo $row['appointmentDate']; ?>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse<?php echo $row['aid']; ?>"
                                                 class="panel-collapse collapse">
                                                <!-- vitals part -->
                                                <?php include "includes/vitals.php" ?>
                                                <!-- lab part -->
                                                <?php include "includes/lab.php" ?>
                                                <!-- diagnosis -->
                                                <?php include "includes/diagnoses.php"; ?>
                                                <!-- prescription part -->
                                                <?php include "includes/prescription.php"; ?>

                                                <?php
                                                }
                                    }
                                    connectDB()->close();
                                    ?>
                                    <!-- / patient medical records end -->

                                </div> <!-- /col-md-8 -->

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

<?php include "includes/footer.php"?>