<?php
require_once "functions/functions.php";
session_start();

unset($_SESSION['uid']);
unset($_SESSION['uname']);
unset($_SESSION['uname']);
session_destroy();

redirect("index.php");
exit;