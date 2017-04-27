<?php

$dsn = "mysql:host=localhost;dbname=miles";
$username = "root";
$password = "";

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    error_reporting(E_ALL);
    //echo "Connected";
} catch (Exception $ex) {
    $form_errors = array();
    $form_errors[] = $ex->getMessage();
    include("index.php");
    exit();
}