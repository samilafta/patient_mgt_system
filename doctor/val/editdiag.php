<?php
session_start();
require_once "../../functions/queries.php";
require_once "../../functions/functions.php";

if (isset($_POST['editdiag'])) {

    $diag = validate($_POST['updatediag']);
    $id = $_POST['diagid'];
    $puid = $_POST['puid'];


    if (updateDiagnoses($id, $diag) == true) {
        redirect("../patient.php?id={$puid}");
    } else {
        redirect("../patient.php?id={$puid}");
    }
}