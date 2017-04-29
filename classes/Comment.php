<?php
require_once 'Utility.php';
require_once './constants.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comment
 *
 * @author lizhengxing
 */
class Comment {
    private $CommentID;
    private $PostID;
    private $UserID;
    private $comment;
    private $time;
    
    function __construct($CommentID=0,$PostID=0, $UserID=0, $comment="", $time="") {
        $this->CommentID=$CommentID;
        $this->PostID = $PostID;
        $this->UserID = $UserID;
        $this->comment = $comment;
        $this->time = $time;
    }
    function getCommentID() {
        return $this->CommentID;
    }

    function setCommentID($CommentID) {
        $this->CommentID = $CommentID;
    }

        function getPostID() {
        return $this->PostID;
    }

    function getUserID() {
        return $this->UserID;
    }

    function getComment() {
        return $this->comment;
    }

    function getTime() {
        return $this->time;
    }

    function setPostID($PostID) {
        $this->PostID = $PostID;
    }

    function setUserID($UserID) {
        $this->UserID = $UserID;
    }

    function setComment($comment) {
        $this->comment = $comment;
    }

    function setTime($time) {
        $this->time = $time;
    }

    function diplayComment()
    {
         $dsn = "mysql:host=localhost;dbname=miles";
        $username = "root";
        $password = "";

        try {
            $db = new PDO($dsn, $username, $password);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            error_reporting(E_ALL);
        } catch (Exception $ex) {
            $form_errors = array();
            $form_errors[] = $ex->getMessage();
            include("index.php");
            exit();
        }
        $query = "SELECT * FROM user WHERE UserID = :UID";
        $statement = $db->prepare($query);
        $statement->bindValue(':UID', $this->UserID);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        $pic = $result['profilePic'];
        if( $pic== "")
        {
            $pic=DEFAULT_PROFILE_PIC;
        }
        $c = '<div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="img/'.$pic.'" alt=""style="height: 64px; width: 64px;">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Start Bootstrap
                    <small>' . Utility::formatDate($this->time, "F d, Y") . ' at '.Utility::formatDate($this->time, "g:is A").'</small>
                </h4>
                '.$this->comment.'
            </div>
        </div>';
        echo $c;
    }

}
