<?php
$aid = $row['aid'];
$stmt = "SELECT * FROM vitals JOIN user ON opd_id = user.userID WHERE appointment_id = '$aid'";
$run1 = connectDB()->query($stmt);
if ($run1->num_rows == 0) {
    ?>
    <!-- add patients vitals form -->
    <button style="margin: 10px 10px;" type="button" data-toggle="collapse"
            data-target="#formCollapse" aria-expanded="false"
            aria-controls="formCollapse" class=" btn btn-primary bg-blue-sky">
        <i class="fa fa-plus"></i> Add Patient Vitals
    </button>

    <div class="collapse" id="formCollapse">
        <div class="well">
            <form method="post" action="val/addvitals.php">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="temp">Body Temperature (°C)</label>
                            <input id="temp" class="form-control" name="temp" pattern="[0-9]{1,3}.[0-9]{1}" title=" Eg. 36.7"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="bp">Blood Pressure (mmHg)</label>
                            <input id="bp" class="form-control" name="bp" pattern="[0-9]{1,3}/[0-9]{1,3}" title=" Eg. 128/100"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="pulse">Pulse Rate (bps)</label>
                            <input id="pulse" class="form-control" name="pulse" pattern="[0-9]{1,3}" title="Eg. 109"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="respiration">Respiration Rate (cpm)</label>
                            <input id="respiration" class="form-control" name="rr" pattern="[0-9]{1,2}" title="Eg. 12"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="complaints">Complaints</label><br/>
                            <textarea id="complaints" name="complaints"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="means">Arrival Means</label><br/>
                            <select id="means" name="means" class="form-control">
                                <option value="Ambulance">Ambulance</option>
                                <option value="Taxi">Taxi</option>
                                <option value="Own Transport">Own Transport</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br/>
                <input type="hidden" name="puid" value="<?php echo $id; ?>"/>
                <input type="hidden" name="aid" value="<?php echo $aid ?>"/>
                <input type="hidden" name="opd" value="<?php echo $_SESSION['uid']; ?>"/>
                <div class="row">
                    <div class=" col col-md-offset-2 col-md-4">
                        <button type="reset" class="btn btn-warning btn-block bg-orange">
                            Reset
                        </button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-success btn-block bg-purple"
                                name="addvitals">Submit
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <?php
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