
<?php
$aid = $row['aid'];
$stm1 = "SELECT * FROM diagnosis JOIN user ON diagnosis.doc_id = user.userID WHERE aid = '$aid'";
$run3 = connectDB()->query($stm1);
if ($run3->num_rows == 0) {
    ?>
    <form style="margin: 10px;" method="post" action="val/adddiagnoses.php">
        <div class="row">
            <div class="col-md-12">
                <label for="complaints">Complaints: </label><br/>
                <textarea style="height: 200px; width: 600px;" name="complaints"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" name="puid" value="<?php echo $id; ?>"/>
                <input type="hidden" name="aid" value="<?php echo $aid; ?>"/>
                <input type="hidden" name="doc" value="<?php echo $_SESSION['uid']; ?>"/>
                <label for="diagnosis">Diagnosis: </label><br/>
                <textarea style="height: 200px; width: 600px;" name="diag"></textarea>
            </div>
        </div>

        <button style="margin: 10px;" name="diagnoses" class="btn btn-primary bg-blue-sky">
            Add Diagnoses
        </button>
    </form>

    <?php
} else {
    $fetch2 = $run3->fetch_array();
    ?>
    <div class="panel-body">
        <h4>DIAGNOSES</h4>
        <div class="row">
            <div class="col-md-10">
                <p><b>Complaints: </b> <?php echo $fetch2['complaints']; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <p><b>Diagnosis: </b> <?php echo $fetch2['diagnosis']; ?></p>
            </div>
            <button class="btn btn-primary" data-toggle="modal" data-target="#editModal<?php echo $fetch2['diagnosisID']; ?>">Update</button>
            <?php include "includes/editmodal.php"; ?>
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
