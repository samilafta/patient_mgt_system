<?php
session_start();
require_once "../functions/queries.php";
require_once "../functions/functions.php";

if (isset($_POST['adduser']))   {
    $fname = validate($_POST['fname']);
    $uname = validate($_POST['uname']);
    $pwd = $_POST['pwd'];
    $status = $_POST['status'];

    if (createAccount($fname, $uname, $pwd, $status) == true)   {
        redirect("users.php?created");
    }   else    {
        redirect("users.php?error");
    }
}

