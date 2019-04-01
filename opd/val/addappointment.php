<?php
session_start();
require_once "../../functions/queries.php";
require_once "../../functions/functions.php";

if (isset($_POST['addapp']))   {

    $uid = $_POST['puid'];
    $id = $_POST['pid'];

    if (addAppointment($id) == true) {
        redirect("../viewpatient.php?id={$uid}");
    } else {
        redirect("../viewpatient.php?id={$uid}");
    }

}
