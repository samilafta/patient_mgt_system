<?php
$aid = $row['aid'];
$stm = "SELECT * FROM lab WHERE lab.aid = '$aid'";
$run2 = connectDB()->query($stm);
if ($run2->num_rows == 0) {
    // nothing here
} else {
    $fetch1 = $run2->fetch_array();
    ?>
    <div class="panel-body">
        <h4>LAB RESULTS</h4>
        <div class="row">
            <div class="col-md-6">
                <p><b>Requested By:  </b> <?php echo $fetch1['requested_by']; ?></p>
            </div>
            <div class="col-md-6">
                <p><b>Sample Collection Date: </b> <?php echo $fetch1['collection_date']; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p><b>Lab Type: </b> <?php echo $fetch1['lab_type']; ?></p>
            </div>
            <div class="col-md-6">
                <p><b>Report Date: </b> <?php echo $fetch1['report_date']; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p><b>Report: </b> <?php echo $fetch1['lab_report']; ?></p>
            </div>
            <div class="col-md-6">
                <p><b>Signed by: </b> <?php echo $fetch1['signed_by']; ?></p>
            </div>
        </div>
    </div>
    <?php
}
?>