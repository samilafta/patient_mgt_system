<?php

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    $data = connectDB()->real_escape_string($data);
    return $data;
}


function hospitalID()  {
    $length = 10000;
    $prefix = "EVC";
    $randomString = "";

    for ($i = 0; $i < $length; $i++)  {
        $numstring = sprintf("%05d", mt_rand(1, 99999));
        $randomString = $prefix.$numstring;
    }
    return $randomString;
}

function session($row)  {
    $_SESSION['uid'] = $row['userID'];
    $_SESSION['uname'] = $row['uname'];
    $_SESSION['fname'] = $row['fname'];
}


function redirect($url) {

    header("Location: $url");

}