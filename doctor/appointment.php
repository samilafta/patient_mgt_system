<?php
session_start();
require_once "../functions/queries.php";
require_once "../functions/functions.php";

if (isset($_POST['addapp']))   {
        $temp = $_POST['temp'];
        $bp = $_POST['bp'];
        $pulse = $_POST['pulse'];
        $respiration = $_POST['respiration'];
        $complaints = $_POST['complaints'];
        $diagnosis = $_POST['diagnosis'];
        $lab = $_POST['lab'];
        $prescription = $_POST['prescription'];
        $did = $_POST['did'];
        $pid = $_POST['pid'];
        $puid = $_POST['puid'];

        if (addAppointment($pid, $did, $complaints, $temp, $bp, $pulse, $respiration, $diagnosis, $lab, $prescription))   {
            redirect("patient.php?id={$puid}");
        }   else    {
            redirect("index.php?error");
        }
}