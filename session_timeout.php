<?php
require_once './constants.php';
session_start();
if (isset($_SESSION['timeout']) && $_SESSION['timeout'] + TIMEOUT_DURATION <= time()) {
    //echo $_SESSION['timeout'];
    header("location: logout.php");
}
