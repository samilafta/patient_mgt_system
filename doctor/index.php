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
                    <h3>Patients List</h3>
                </div>
            </div>

            <div class="clearfix"></div>


            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>List of Patients</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <table id="datatable-buttons" class="table table-striped table-bordered">

                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Patient ID #</th>
                                    <th>Surname</th>
                                    <th>Firstname</th>
                                    <th>Sex</th>
                                    <th>Mobile #</th>
                                    <th>Home Address</th>
                                    <th>Insurance</th>
                                    <th>Date registered</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                $result = viewPatients();
                                $i = 1;
                                while ($row = $result->fetch_array()) {

                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['patientUniqueID']; ?></td>
                                        <td><?php echo $row['surname']; ?></td>
                                        <td><?php echo $row['firstname']; ?></td>
                                        <td><?php echo $row['sex']; ?></td>
                                        <td><?php echo $row['tel_num']; ?></td>
                                        <td><?php echo $row['home_address']; ?></td>
                                        <td><?php echo $row['insurance']; ?></td>
                                        <td><?php echo $row['date_registered']; ?></td>
                                        <td>
                                            <a href="patient.php?id=<?php echo $row['patientUniqueID']; ?>" class="btn btn-success btn-sm" title="view"><i class="fa fa-plus-circle"></i> View</a>
                                        </td>

                                    </tr>
                                    <?php
                                    $i++;
                                }

                                connectDB()->close();
                                ?>
                                </tbody>
                            </table>

                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

<?php include "includes/footer.php"?>