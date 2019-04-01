<?php
session_start();
require_once "../../functions/queries.php";
require_once "../../functions/functions.php";

if (isset($_POST['addvitals'])) {

    $bp = $_POST['bp'];
    $temp = $_POST['temp'];
    $pulse = $_POST['pulse'];
    $resp = $_POST['rr'];
    $means = $_POST['means'];
    $aid = $_POST['aid'];
    $opd = $_POST['opd'];

    $puid = $_POST['puid'];

    if (addVitals($aid, $opd, $means, $resp, $pulse, $bp, $temp) == true) {
        redirect("../viewpatient.php?id={$puid}");
    } else {
        redirect("../viewpatient.php?id={$puid}+error");
    }

}