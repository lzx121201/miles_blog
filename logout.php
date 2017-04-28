<?php
session_start();
session_unset();
session_destroy();
$_SESSION['loggedIn'] = FALSE;
    $_SESSION['username'] = "";
    $_SESSION['UserID'] = "";
    $_SESSION['timeout'] = "";
header('location: index.php');
