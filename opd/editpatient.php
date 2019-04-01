<?php
session_start();

require_once "../functions/queries.php";
require_once "../functions/functions.php";


if (isset($_POST['editpatient']))   {

    $surname = validate($_POST['sname']);
    $firstname = validate($_POST['fname']);
    $dob = $_POST['dob'];
    $age = validate($_POST['age']);
    $sex = $_POST['sex'];
    $tel = validate($_POST['tel']);
    $haddress = validate($_POST['haddress']);
    $waddress = validate($_POST['waddress']);
    $marital = $_POST['marital'];
    $insurance = $_POST['insurance'];
    $nhis = validate($_POST['nhisnum']);
    $kin = validate($_POST['nextofkin']);
    $pid = $_POST['pid'];
    $puid = $_POST['puid'];


    if (updatePatient($surname, $firstname, $dob, $age, $sex, $tel, $haddress, $waddress, $marital, $insurance, $nhis, $kin, $pid) == true)   {
        redirect("viewpatient.php?id={$puid}");
    }   else    {
        redirect("patientlist.php?error");
    }

}