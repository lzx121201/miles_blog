<?php
require_once ("Includes/database.php");
require_once ("Includes/validate.php");

$form_errors1 = array();
$required_fields = array('title', 'content', 'hashtags');
$form_errors1 = array_merge($form_errors1, check_empty_fields($required_fields));
$fields_to_check_length = array('content' => 20);
$form_errors1 = array_merge($form_errors1, check_min_length($fields_to_check_length));

$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["picName"]["name"]);
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
if (isset($_POST["addPost_button"])) {
    $check = getimagesize($_FILES["picName"]["tmp_name"]);
    if ($check == false) {
        $form_errors1[] = "File is not an image.";
    }
}

if (basename($_FILES["picName"]["name"]) == "") {
    $form_errors1[] = "No picture selected.";
}
if ($_FILES["picName"]["size"] > 30*MB) {
    $form_errors1[] = "Sorry, your file is too large.";
}
if (basename($_FILES["picName"]["name"]) != "" && $imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    $form_errors1[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}
if (file_exists($target_file)) {
    $form_errors1[]= "Sorry, file already exists.";
}


if (!empty($form_errors1)) {
    include 'addNewPost.php';
    exit();
} else {
    if (move_uploaded_file($_FILES["picName"]["tmp_name"], $target_file)) {
        //$price = $_POST['price'];
        $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
        $userID = filter_input(INPUT_POST, "UID", FILTER_SANITIZE_NUMBER_INT);
        $content = filter_input(INPUT_POST, "content", FILTER_SANITIZE_NUMBER_STRING);
        $hashtag = filter_input(INPUT_POST, "hashtags", FILTER_SANITIZE_NUMBER_STRING);

        $pic_name = basename($_FILES["picName"]["name"]);


        $query_addPost = "INSERT INTO post (UserID, title, content,picName,hashtag) VALUES (:userID,:title,:content,:picName,:hashtag)";
        $statement8 = $db->prepare($query_addPost);
        $statement8->bindValue(':UserID', $userID);
        $statement8->bindValue(':title', $title);
        $statement8->bindValue(':content', $content);
        $statement8->bindValue(':picName', $pic_name);
        $statement8->bindValue(':hashtage', $hashtag);
        $statement8->execute();
        $statement8->closeCursor();

        header('Location: .php');
    } else {
        $form_errors1[] = "Sorry, there was an error uploading your image.";
        include 'addNewPost.php';
        exit();
    }
}
