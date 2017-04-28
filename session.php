<?php
require_once 'constants.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == TRUE) {
    $U = $_SESSION['username'];
    $UID = $_SESSION['UserID'];
    $L = $_SESSION['loggedIn'];
} else {
    $L = FALSE;
}
