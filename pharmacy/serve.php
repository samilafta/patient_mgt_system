<?php
session_start();
require_once "../functions/queries.php";
require_once "../functions/functions.php";

if (isset($_POST['serve'])) {
    $note = validate($_POST['note']);
    $id = $_POST['pharid'];
    $phar = $_POST['phar'];

    if (updatePharmacy($id, $note, $phar) == true) {
        redirect("index.php?successful");
    } else {
        redirect("index.php?error");
    }

}