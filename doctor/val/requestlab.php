<?php
session_start();
require_once "../../functions/queries.php";
require_once "../../functions/functions.php";

if (isset($_POST['lab'])) {

    $type = validate($_POST['test']);
    $aid = $_POST['aid'];
    $date = $_POST['date'];
    $doc = $_POST['doc'];
    $pid = $_POST['pid'];

    $puid = $_POST['puid'];

    if (addLab($aid, $pid, $doc, $type, $date) == true) {
        redirect("../patient.php?id={$puid}");
    } else {
        redirect("../patient.php?id={$puid}");
    }
}