<?php

require_once ("Includes/database.php");
require_once ("Includes/validate.php");
require_once ("constants.php");

$form_errors1 = array();
$required_fields = array('title', 'content','comments');
$form_errors1 = array_merge($form_errors1, check_empty_fields($required_fields));
$fields_to_check_length = array('content' => 50);
$form_errors1 = array_merge($form_errors1, check_min_length($fields_to_check_length));
//echo isset($_POST['picName']);
//echo $_POST['picName'];
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["picName"]["name"]);
if (basename($_FILES["picName"]["name"]) == "") {
    $form_errors1[] = "No picture selected.";
} else {
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    if (isset($_POST["post_button"])) {
        $check = getimagesize($_FILES["picName"]["tmp_name"]);
        if ($check == false) {
            $form_errors1[] = "File is not an image.";
        }
    }
    if ($_FILES["picName"]["size"] > 30 * MB) {
        $form_errors1[] = "Sorry, your file is too large.";
    }
    if (basename($_FILES["picName"]["name"]) != "" && $imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $form_errors1[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }
//    if (file_exists($target_file)) {
//        $form_errors1[] = "Sorry, file already exists.";
//    }
}print_r($_FILES);
echo $_SERVER['DOCUMENT_ROOT'].$target_file;
if (!empty($form_errors1)) {
    include 'addNewPost.php';
    exit();
} else {
    if (move_uploaded_file($_FILES["picName"]["tmp_name"], $target_file)) {
        //$price = $_POST['price'];
        $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
        $userID = filter_input(INPUT_POST, "userID", FILTER_SANITIZE_NUMBER_INT);
        $content = filter_input(INPUT_POST, "content", FILTER_SANITIZE_STRING);
        $hashtag = filter_input(INPUT_POST, "hashtags", FILTER_SANITIZE_STRING);
        $allowComments = filter_input(INPUT_POST,"comments",FILTER_SANITIZE_NUMBER_INT);
        $pic_name = basename($_FILES["picName"]["name"]);

        echo $title, $userID, $content, $hashtag, $pic_name;
        $query_addPost = "INSERT INTO post (UserID, title, content,picName,hashtag,AllowComment) VALUES (:userID,:title,:content,:picName,:hashtag,:comment)";
        $statement8 = $db->prepare($query_addPost);
        $statement8->bindValue(':userID', $userID);
        $statement8->bindValue(':title', $title);
        $statement8->bindValue(':content', $content);
        $statement8->bindValue(':picName', $pic_name);
        $statement8->bindValue(':hashtag', $hashtag);
        $statement8->bindValue(':comment', $allowComments);
        $statement8->execute();
        $statement8->closeCursor();

        header('Location: home.php');
    } else {
        $form_errors1[] = "Sorry, there was an error uploading your image.";
        include 'addNewPost.php';
        exit();
    }
}
