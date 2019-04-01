<?php
session_start();
require_once "../functions/queries.php";
require_once "../functions/functions.php";

if (isset($_POST['sendreport'])) {
    $report = validate($_POST['labreport']);
    $rid = $_POST['labid'];
    $tech = $_POST['tech'];

    if (updateLab($rid, $report, $tech) == true) {
        redirect("index.php?successful");
    } else {
        redirect("index.php?error");
    }

}