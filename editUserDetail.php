<?php
session_start();
require_once 'session_timeout.php';
require_once ("Includes/database.php");
require_once ("Includes/validate.php");
require_once ("constants.php");

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$form_errors = array();
$pass_change = FALSE;
//$required_fields = array('exampleInputUsername', 'password', 'confirm-password','about-you');
//$form_errors = array_merge($form_errors, check_empty_fields($required_fields));
$fields_to_check_length = array('exampleInputUsername' => 6);
if (isset($_POST['password']) && isset($_POST['confirm-password']) && $_POST['confirm-password']!=""&& $_POST['password'] !="") {
    $fields_to_check_length['password']=8;
    $fields_to_check_length['confirm-password']=8;
    $form_errors = array_merge($form_errors, valid_2_password($_POST));
    $pass_change = TRUE;
}
$form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));
$form_errors = array_merge($form_errors, valid_username($_POST));
if (strlen($_POST['description']) > MAX_DESCRIPTION_LEN) {
    $form_errors[] = "Description is too long.";
}

if (!empty($form_errors)) {
    $uname = $_POST['exampleInputUsername'];
    $pass = $_POST['password'];
    $pass1 = $_POST['confirm-password'];
    $desc = $_POST['about-you'];
    include 'editProfile.php';
    exit();
} else {
    $userID = filter_input(INPUT_POST, "UID", FILTER_SANITIZE_NUMBER_INT);
    $username = filter_input(INPUT_POST, "exampleInputUsername", FILTER_SANITIZE_STRING);
    $oPass = filter_input(INPUT_POST, "original-password");
    $password1 = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    $desciprion = filter_input(INPUT_POST, "about-you", FILTER_SANITIZE_STRING);
    $password = "";
    if ($pass_change ==FALSE)
    {
        $password = $oPass;
    } else {
        $password = password_hash($password1, PASSWORD_DEFAULT);
    }

    $query_addDesc = "UPDATE user SET name = :name,password = :pass,description = :desc WHERE UserID = :uid";
    $statement = $db->prepare($query_addDesc);
    $statement->bindValue(':name', $username);
    $statement->bindValue(':pass', $password);
    $statement->bindValue(':desc', $desciprion);
    $statement->bindValue(':uid', $userID);
    $statement->execute();
    $statement->closeCursor();
$_SESSION['username'] = $username;
    header('Location: profile.php');
}