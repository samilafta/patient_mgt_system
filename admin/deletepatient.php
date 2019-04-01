<?php
session_start();

require_once "../functions/queries.php";
require_once  "../functions/functions.php";

if (isset($_POST['deletepatient']))   {
    $pid = $_POST['pid'];

    if (deletePatient($pid) == true)   {
        redirect("patients.php?deleted");
    }   else    {
        redirect("patients.php?error");
    }

}