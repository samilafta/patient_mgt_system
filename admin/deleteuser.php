<?php
session_start();

require_once "../functions/queries.php";
require_once  "../functions/functions.php";

if (isset($_POST['deleteuser']))   {
    $uid = $_POST['uid'];

    if (deleteuser($uid) == true)   {
        redirect("index.php?deleted");
    }   else    {
        redirect("index.php?error");
    }

}