<?php
require_once 'session_timeout.php';
require_once ("Includes/database.php");
require_once ("Includes/validate.php");
require_once ("constants.php");

//$form_errors1 = array();
//$required_fields = array('title', 'content','comments');
//$form_errors1 = array_merge($form_errors1, check_empty_fields($required_fields));
//$fields_to_check_length = array('content' => 50);
//$form_errors1 = array_merge($form_errors1, check_min_length($fields_to_check_length));
////echo isset($_POST['picName']);
////echo $_POST['picName'];
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["picName"]["name"]);
if (basename($_FILES["picName"]["name"]) == "") {
    $form_errors1[] = "No picture selected.";
} else {
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    if (isset($_POST["profile_button"])) {
        $check = getimagesize($_FILES["picName"]["tmp_name"]);
        if ($check == false) {
            $form_errors1[] = "File is not an image.";
        }
    }
    if ($_FILES["picName"]["size"] > 2 * MB) {
        $form_errors1[] = "Sorry, your file is too large.";
    }
    if (basename($_FILES["picName"]["name"]) != "" &&  $imageFileType != "png" ) {
        $form_errors1[] = "Sorry, only PNG files are allowed.";
    }
//    if (file_exists($target_file)) {
//        $form_errors1[] = "Sorry, file already exists.";
//    }
}
if (!empty($form_errors1)) {
    include 'profile.php';
    exit();
} else {
    if (move_uploaded_file($_FILES["picName"]["tmp_name"], $target_file)) {
        //$price = $_POST['price'];
        $userID = filter_input(INPUT_POST, "UID", FILTER_SANITIZE_NUMBER_INT);
        $pic_name = basename($_FILES["picName"]["name"]);
        $query_addPost = "UPDATE user SET profilePic = :picName WHERE UserID = :uid";
        $statement8 = $db->prepare($query_addPost);
        $statement8->bindValue(':uid', $userID);
        $statement8->bindValue(':picName', $pic_name);
        $statement8->execute();
        $statement8->closeCursor();

        header('Location: profile.php');
    } else {
        $form_errors1[] = "Sorry, there was an error uploading your image.";
        include 'profile.php';
        exit();
    }
}
