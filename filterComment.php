<?php

require_once 'constants.php';
require_once ("Includes/database.php");
require_once 'classes/Comment.php';
require_once 'classes/Utility.php';

$keyword = filter_input(INPUT_POST, "keyword", FILTER_SANITIZE_STRING);
$PID = filter_input(INPUT_POST, "PID", FILTER_SANITIZE_NUMBER_INT);
//$keyword='e';
//$PID=10;
//echo $keyword;
$query = "UPDATE post SET filter_keyword = :kw WHERE PostID = :pid";
$stmt = $db->prepare($query);
$stmt->bindValue(':kw', $keyword);
$stmt->bindValue(':pid', $PID);
$stmt->execute();
$stmt->closeCursor();

$query4 = "UPDATE comment SET isFiltered = 0 WHERE PostID = :pid";
$stmt4 = $db->prepare($query4);
$stmt4->bindValue(':pid', $PID);
$stmt4->execute();
$stmt4->closeCursor();

$query1 = "SELECT * FROM comment WHERE PostID = :pid";
$stmt1 = $db->prepare($query1);
$stmt1->bindValue(':pid', $PID);
$stmt1->execute();
$posts = $stmt1->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Comment');
$stmt1->closeCursor();
    $str = '';

//print_r($posts);
if ($keyword != "") {
    $filtered_post = Utility::filterCommentByKeyword($posts, $keyword);

    $filtered = Utility::getFilteredComment($posts, $keyword);
    foreach ($filtered as $fp) {
        $query3 = "UPDATE comment SET isFiltered = :if WHERE CommentID = :cid";
        $stmt3 = $db->prepare($query3);
        $stmt3->bindValue(':if', 1);
        $stmt3->bindValue(':cid', $fp->getCommentID());
        $stmt3->execute();
        $stmt3->closeCursor();
    }
        foreach ($filtered_post as $p) {
            $str .= $p->diplayComment();
        }
    
} else {
   
        foreach ($posts as $p) {
            $str .= $p->diplayComment();
        }
    
}    
echo $str;
