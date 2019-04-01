<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header bg-blue-sky">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Edit Patient Details</h4>
            </div>
            <div class="modal-body">

                <form method="post" action="patientedit.php">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="surname">Sur Name</label>
                                <input id="surname" class="form-control" name="sname" value="<?php echo $row['surname']; ?>" required/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input id="firstname" class="form-control" name="fname" value="<?php echo $row['firstname']; ?>" required/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <input class="form-control" name="dob" value="<?php echo $row['dob']; ?>" data-inputmask="'mask': '99/99/9999'"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input id="age" class="form-control" name="age" value="<?php echo $row['age']; ?>" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sex">Sex</label>
                                <select id="sex" name="sex" class="form-control">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tel">Mobile Number</label>
                                <input class="form-control" name="tel" value="<?php echo $row['tel_num']; ?>" data-inputmask="'mask' : '999 999-9999'">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="haddress">Home Address</label>
                                <input id="haddress" class="form-control" name="haddress" value="<?php echo $row['home_address']; ?>" required/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="waddress">Work Address</label>
                                <input id="waddress" class="form-control" name="waddress" value="<?php echo $row['occupation']; ?>" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="marital">Marital Status</label>
                                <select id="marital" class="form-control" name="marital">
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="widowed">Widowed</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="insurance">Insurance</label>
                                <select id="insurance" class="form-control" name="insurance">
                                    <option value="no insurance">No Insurance</option>
                                    <option value="nhis">NHIS</option>
                                    <option value="company insurance">Company Insurance</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nhisnum">NHIS Number</label>
                                <input id="nhisnum" class="form-control" name="nhisnum" value="<?php echo $row['nhis_number']; ?>"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nextofkin">Next of Kin</label>
                                <input id="nextofkin" class="form-control" name="nextofkin" value="<?php echo $row['next_of_kin']; ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="puid" value="<?php echo $row['patientUniqueID']; ?>"/>
                        <input type="hidden" name="pid" value="<?php echo $row['patientID']; ?>"/>
                        <button class="btn btn-primary" name="editpatient">Make Changes</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
