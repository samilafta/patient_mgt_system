<?php
session_start();
require_once "../functions/queries.php";
require_once "../functions/functions.php";

if (!isset($_SESSION['uid']))   {
    redirect("../index.php");
    exit();
}


if (isset($_POST['generate'])) {

    $range = $_POST['range'];

    redirect("reports.php?day={$range}");

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
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Generate Report</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Date Range</label>
                                        <select id="status" name="range" class="form-control">
                                            <option value="1">Last One Week</option>
                                            <option value="2">Last Two Weeks</option>
                                            <option value="4">Last Month</option>
                                            <option value="8">Last 2 Months</option>
                                            <option value="26">Last 6 Months</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button name="generate" class="btn btn-success">
                                Generate
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<?php
if (isset($_GET['day'])) {
    $day = $_GET['day'];
    ?>
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Generated Report</h2>
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
                                    <th>Date registered</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $sql = "SELECT
                                          patient.date_registered,
                                          patient.surname,
                                          patient.firstname,
                                          patient.patientUniqueID
                                        FROM patient
                                          WHERE patient.date_registered BETWEEN DATE_SUB(CURDATE(), INTERVAL '$day' WEEK) AND CURDATE();";
                                $result = connectDB()->query($sql);
                                $i = 1;
                                while ($row = $result->fetch_array()) {

                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['patientUniqueID']; ?></td>
                                        <td><?php echo $row['surname']; ?></td>
                                        <td><?php echo $row['firstname']; ?></td>
                                        <td><?php echo $row['date_registered']; ?></td>
                                    </tr>
                                    <?php
                                    $i++;
                                }

                                connectDB()->close();
                                ?>
                                </tbody>
                            </table>
                            <?php
                            $sql1 = "SELECT
                                      COUNT(patient.patientID) AS count
                                    FROM patient
                                      WHERE patient.date_registered BETWEEN DATE_SUB(CURDATE(), INTERVAL '$day' WEEK) AND CURDATE();";
                            $result1 = connectDB()->query($sql1);
                            $row1 = $result1->fetch_array();
                            ?>
                            <br/> <br/>
                            <h4>Total Number of Patients As At This Date: <b><?php echo $row1['count']; ?></b></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
}
?>





<?php include "includes/footer.php"?>
