<?php
session_start();
require_once "../functions/queries.php";
require_once "../functions/functions.php";

if (!isset($_SESSION['uid']))   {
redirect("../index.php");
exit();
}

?>

<?php include "includes/header.php"; ?>

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Laboratory</h3>
                </div>
            </div>

            <div class="clearfix"></div>


            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Requests for Laboratory Test</h2>
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
                                    <th>Patient Name</th>
                                    <th>Patient Number</th>
                                    <th>Lab Test Type</th>
                                    <th>Requested By</th>
                                    <th>Sample Collection Date</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                $sql = "SELECT * FROM lab JOIN patient ON lab.patient_uid = patient.patientID ORDER BY labID DESC";
                                $result = connectDB()->query($sql);
                                $i = 1;
                                while ($row = $result->fetch_array()) {

                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['firstname']. " ". $row['surname']; ?></td>
                                        <td><?php echo $row['patientUniqueID']; ?></td>
                                        <td><?php echo $row['lab_type']; ?></td>
                                        <td><?php echo $row['requested_by']; ?></td>
                                        <td><?php echo $row['collection_date']; ?></td>
                                        <td>
                                            <?php
                                            if ($row['status'] === "sent") {
                                                echo "<a class='btn btn-success' disabled> Sent</a>";
                                            } else {
                                                ?>
                                                <a href='' class='btn btn-success' data-toggle='modal' data-target='#sendModal<?php echo $row['labID']; ?>' title='Send Report'> Send Report</a>
                                                <?php
                                            } ?>
                                        </td>

                                        <!-- send report modal -->
                                        <div class="modal fade" id="sendModal<?php echo $row['labID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-primary" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-blue-sky">0
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                        <h4 class="modal-title">Patient Lab Test Report</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="sendreport.php">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <textarea style="height: 250px; width: 550px;" name="labreport"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="hidden" name="labid" value="<?php echo $row['labID'] ?>"/>
                                                                <input type="hidden" name="tech" value="<?php echo $_SESSION['fname']; ?>"/>
                                                                <button class="btn btn-primary" name="sendreport">Send Lab Report</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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




<?php include "includes/footer.php"; ?>