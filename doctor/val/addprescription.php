<?php
session_start();
require_once "../../functions/queries.php";
require_once "../../functions/functions.php";

if (isset($_POST['addpresc'])) {
    $presc = validate($_POST['presc']);
    $aid = $_POST['aid'];
    $doc = $_POST['doc'];
    $pid = $_POST['pid'];
    $puid = $_POST['puid'];

    if (addPrescription($aid, $pid, $doc, $presc) == true) {
        redirect("../patient.php?id={$puid}");
    } else {
        redirect("../patient.php?id={$puid}");
    }

}