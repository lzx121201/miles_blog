<?php
require_once("Includes/database.php");
$UID = filter_input(INPUT_POST, "UID", FILTER_SANITIZE_NUMBER_INT);
$PID = filter_input(INPUT_POST, "PID", FILTER_SANITIZE_NUMBER_INT);
$comment = filter_input(INPUT_POST, "comment", FILTER_SANITIZE_STRING);

$query = "INSERT INTO comment (PostID,UserID,comment) VALUES (:pid,:uid,:c)";
$stmt = $db->prepare($query);
$stmt->bindValue(':pid',$PID);
$stmt->bindValue(':uid',$UID);
$stmt->bindValue(':c',$comment);
$stmt->execute();
$stmt->closeCursor();

require_once 'classes/Post.php';
require_once ("constants.php");
$query1 = "SELECT * FROM post WHERE PostID = :pid";
$statement = $db->prepare($query1);
$statement->bindValue(':pid', $PID);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Post');
$result = $statement->fetch();
$statement->closeCursor();

$result->displayPostComments();
