

<?php
$aid = $row['aid'];
$sql1 = "SELECT * FROM pharmarcy WHERE aid = '$aid'";
$result2 = connectDB()->query($sql1);
if ($result2->num_rows == 0) {
    ?>
    <form style="margin: 10px;" method="post" action="val/addprescription.php">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" name="puid" value="<?php echo $id; ?>"/>
                <input type="hidden" name="pid" value="<?php echo $pid; ?>"/>
                <input type="hidden" name="aid" value="<?php echo $aid; ?>"/>
                <input type="hidden" name="doc" value="<?php echo $_SESSION['fname']; ?>"/>
                <label for="diagnosis">Prescription: </label><br/>
                <textarea style="height: 200px; width: 600px;" name="presc"></textarea>
            </div>
        </div>
        <button style="margin: 10px;" name="addpresc" class="btn btn-primary bg-blue-sky">
            Give Prescription
        </button>
    </form>

    <?php
} else {
    $fetch3 = $result2->fetch_array();
    ?>
    <div class="panel-body">
        <h4>PRESCRIPTION</h4>
        <div class="row">
            <div class="col-md-6">
                <p><b>Prescription: </b> <?php echo $fetch3['prescription']; ?></p>
            </div>
            <div class="col-md-6">
                <p><b>Prescribed By:  </b> <?php echo $fetch3['doctor']; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p><b>Status:  </b> <?php
                    if ($fetch3['status'] === "not served yet") {
                        echo "<label class='label label-danger'>" . $fetch3['status'] . "</label>";
                    } else {
                        echo "<label class='label label-success'>" . $fetch3['status'] . "</label>";
                    }
                    ?>
                </p>
            </div>
            <div class="col-md-6">
                <p><b>Notes:  </b> <?php echo $fetch3['notes']; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p><b>Date Served:  </b> <?php echo $fetch3['date_served']; ?></p>
            </div>
            <div class="col-md-6">
                <p><b>Served By:  </b> <?php echo $fetch3['served_by']; ?></p>
            </div>
        </div>

    </div>
    <?php
}
?>