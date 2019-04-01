
<?php
$aid = $row['aid'];
$stm1 = "SELECT * FROM diagnosis JOIN user ON diagnosis.doc_id = user.userID WHERE aid = '$aid'";
$run3 = connectDB()->query($stm1);
if ($run3->num_rows == 0) {
    echo "<h4 style='margin: 10px;'>About to see Doctor</h4>";
} else {
    $fetch2 = $run3->fetch_array();
    ?>
    <div class="panel-body">
        <h4>DIAGNOSES</h4>
        <div class="row">
            <div class="col-md-12">
                <p><b>Complaints: </b> <?php echo $fetch2['complaints']; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p><b>Diagnosis: </b> <?php echo $fetch2['diagnosis']; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p><b>Date Taken: </b> <?php echo $fetch2['date_taken']; ?></p>
            </div>
            <div class="col-md-6">
                <p><b>By: </b> <?php echo $fetch2['fname']; ?></p>
            </div>
        </div>
    </div>
    <?php
}
?>
