<?php
$aid = $row['aid'];
$stmt = "SELECT * FROM vitals JOIN user ON opd_id = user.userID WHERE appointment_id = '$aid'";
$run1 = connectDB()->query($stmt);
if ($run1->num_rows == 0) {
    echo "<h4 style='margin: 10px;'>No vitals taken yet.</h4>";
} else {
    $fetch = $run1->fetch_array();
    // display vitals
    ?>
    <!-- vitals form end -->
    <div class="panel-body">
        <h4>VITALS</h4>
        <div class="row">
            <div class="col-md-6">
                <p><b>Arrival Means: </b> <?php echo $fetch['arrival_means']; ?></p>
            </div>
            <div class="col-md-6">
                <p><b>Body Temperature: </b> <?php echo $fetch['temperature']; ?> °C</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <p><b>Blood Pressure: </b> <?php echo $fetch['blood_pressure']; ?> mmHg</p>
            </div>
            <div class="col-md-6">
                <p><b>Pulse Rate: </b> <?php echo $fetch['pulse_rate']; ?> bps</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p><b>Respiration Rate: </b> <?php echo $fetch['respiratory_rate']; ?> bps
                </p>
            </div>
            <div class="col-md-6">
                <p><b>Date: </b> <?php echo $fetch['vitals_date']; ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <p><b>Vitals taken by: </b> <?php echo $fetch['fname']; ?></p>
            </div>
        </div>
    </div>
    <?php
}
?>