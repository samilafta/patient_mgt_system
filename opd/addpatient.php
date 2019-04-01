<?php
session_start();

require_once "../functions/queries.php";
require_once "../functions/functions.php";

if (isset($_POST['addpatient']))   {

    $hid = $_POST['hid'];
    $surname = validate($_POST['sname']);
    $firstname = validate($_POST['fname']);
    $dob = $_POST['dob'];
    $age = validate($_POST['age']);
    $sex = $_POST['sex'];
    $tel = $_POST['tel'];
    $haddress = validate($_POST['haddress']);
    $occupation = validate($_POST['waddress']);
    $marital = validate($_POST['marital']);
    $insurance = $_POST['insurance'];
    $nhis = validate($_POST['nhisnum']);
    $kin = validate($_POST['nextofkin']);


    if (addNewPatient($hid, $surname, $firstname, $dob, $age, $sex, $tel, $haddress, $occupation, $marital, $insurance, $nhis, $kin) == true)   {
        redirect("index.php?created");
    }   else    {
        redirect("index.php?error");
    }

}