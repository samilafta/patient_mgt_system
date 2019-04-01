<?php
session_start();
require_once "../../functions/queries.php";
require_once "../../functions/functions.php";

if (isset($_POST['diagnoses'])) {
    $diag = validate($_POST['diag']);
    $complaints = validate($_POST['complaints']);
    $aid = $_POST['aid'];
    $doc = $_POST['doc'];
    $puid = $_POST['puid'];

    if (addDiagnoses($aid, $doc, $complaints, $diag) == true) {
        redirect("../patient.php?id={$puid}");
    } else {
        redirect("../patient.php?id={$puid}");
    }

}