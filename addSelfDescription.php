<?php
require_once 'session_timeout.php';
require_once ("Includes/database.php");
require_once ("Includes/validate.php");
require_once ("constants.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$form_errors1 = array();
if(strlen($_POST['description'])> MAX_DESCRIPTION_LEN)
{
    $form_errors1[] = "Description is too long.";
}

if (!empty($form_errors1)) {
    include 'profile.php';
    exit();
} else {
            $userID = filter_input(INPUT_POST, "UID", FILTER_SANITIZE_NUMBER_INT);
            $desciprion = filter_input(INPUT_POST,"description", FILTER_SANITIZE_STRING);
    $query_addDesc = "UPDATE user SET description = :desc WHERE UserID = :uid";
        $statement = $db->prepare($query_addPost);
                $statement->bindValue(':desc', $desciprion);
        $statement->bindValue(':uid', $userID);
        $statement->execute();
        $statement->closeCursor();

        header('Location: profile.php');
    
}