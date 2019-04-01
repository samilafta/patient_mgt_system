

<div class="modal fade" id="editModal<?php echo $fetch2['diagnosisID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header bg-blue-sky">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Update Patient Diagnoses</h4>
            </div>
            <div class="modal-body">

                <form method="post" action="val/editdiag.php">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <textarea style="height: 250px; width: 550px;" name="updatediag"><?php echo $fetch2['diagnosis']; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="puid" value="<?php echo $id ?>"/>
                        <input type="hidden" name="diagid" value="<?php echo $fetch2['diagnosisID']; ?>"/>
                        <button class="btn btn-primary" name="editdiag">Update Diagnoses</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
