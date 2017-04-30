<?php

require_once("Includes/database.php");
$UID = filter_input(INPUT_POST, "UID", FILTER_SANITIZE_NUMBER_INT);
$PID = filter_input(INPUT_POST, "PID", FILTER_SANITIZE_NUMBER_INT);
//$no_like = filter_input(INPUT_POST, "no_like", FILTER_SANITIZE_NUMBER_INT);
$query6 = "SELECT * FROM post WHERE PostID = :pid";
$stmt6 = $db->prepare($query6);
$stmt6->bindValue(':pid', $PID);
$stmt6->execute();
$result6 = $stmt6->fetch();
$stmt6->closeCursor();
//$UID=2;$PID=10;$no_like = 1;
$query1 = "SELECT * FROM rating WHERE PostID = :pid AND UserID = :uid";
$stmt1 = $db->prepare($query1);
$stmt1->bindValue(':pid', $PID);
$stmt1->bindValue(':uid', $UID);
$stmt1->execute();
$result1 = $stmt1->fetch();
$stmt1->closeCursor();
$c = $result6['No_like'];
$color = '';
//echo empty($result1);
if (!empty($result1)) {
    $query4 = "DELETE FROM rating WHERE PostID = :pid AND UserID = :uid";
    $stmt4 = $db->prepare($query4);
    $stmt4->bindValue(':pid', $PID);
    $stmt4->bindValue(':uid', $UID);
    $stmt4->execute();
    $stmt4->closeCursor();
    $c = $c - 1;
    $color = 'black';
} else {
    $query2 = "INSERT INTO rating (PostID,UserID) VALUES (:pid,:uid)";
    $stmt2 = $db->prepare($query2);
    $stmt2->bindValue(':pid', $PID);
    $stmt2->bindValue(':uid', $UID);
    $stmt2->execute();
    $stmt2->closeCursor();
    $c = $c + 1;
    $color = '#ffd11a';
}
$query3 = "UPDATE post SET No_like = :c WHERE PostID = :pid";
$stmt3 = $db->prepare($query3);
$stmt3->bindValue(':c', $c);
$stmt3->bindValue(':pid', $PID);
$stmt3->execute();
$stmt3->closeCursor();

$query5 = "SELECT * FROM post WHERE PostID = :pid";
$stmt5 = $db->prepare($query5);
$stmt5->bindValue(':pid', $PID);
$stmt5->execute();
$result5 = $stmt5->fetch();
$stmt5->closeCursor();
$s = '<i class="fa fa-thumbs-up" style="color:'.$color.';">&nbsp;&nbsp;' . $result5['No_like'] . '</i>';
echo $s;
