<?php
require_once 'Utility.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Posts
 *
 * @author lizhengxing
 */
class Post {

    public $UserID;
    public $PostID;
    public $title;
    public $content;
    public $time;
    public $picName;
    public $No_like;
    public $No_dislike;
    public $hashtag;
    public $AllowComment;
                function __construct($PostID = 0, $UserID = 0, $title = '', $content = '', $picName = '', $No_like = 0, $No_dislike = 0, $time = '', $hashtag = '',$AllowComment=1) {
        $this->UserID = $UserID;
        $this->PostID = $PostID;
        $this->title = $title;
        $this->content = $content;
        $this->time = $time;
        $this->picName = $picName;
        $this->No_like = $No_like;
        $this->No_dislike = $No_dislike;
        $this->hashtag = $hashtag;
        $this->AllowComment = $AllowComment;
    }

    function getUserID() {
        return $this->UserID;
    }

    function getPostID() {
        return $this->PostID;
    }

    function getTitle() {
        return $this->title;
    }

    function getContent() {
        return $this->content;
    }

    function getTime() {
        return $this->time;
    }

    function getPicName() {
        return $this->picName;
    }

    function getNo_like() {
        return $this->No_like;
    }

    function getNo_dislike() {
        return $this->No_dislike;
    }

    function getHashtag() {
        return $this->hashtag;
    }

    function setUserID($UserID) {
        $this->UserID = $UserID;
    }

    function setPostID($PostID) {
        $this->PostID = $PostID;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setContent($content) {
        $this->content = $content;
    }

    function setTime($time) {
        $this->time = $time;
    }

    function setPicName($picName) {
        $this->picName = $picName;
    }

    function setNo_like($No_like) {
        $this->No_like = $No_like;
    }

    function setNo_dislike($No_dislike) {
        $this->No_dislike = $No_dislike;
    }

    function setHashtag($hashtag) {
        $this->hashtag = $hashtag;
    }

    function displayAtHome() {
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
        $str = '<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 gallery" style="padding: 0;">
                <img class="img-responsive img" src="img/' . $this->picName . '" alt=""/>
                <div class="col-md-12 text">
                    <h3 class="title">' . $this->title . '</h3>
                    <span>by <strong>' . $result['name'] . '</strong></span>
                    <p>' . substr($this->content,0,50) . ' ......'.$this->AllowComment.'</p>
                    <h5 class="date pull-right">' . Utility::formatDate($this->time,"j M Y") . '</h5>
                </div>
            </div>';
        return $str;
    }

    function displayTileInList()
    {
        return '<li><a href="">'.$this->title.'</a></li>';
        
    }
}
