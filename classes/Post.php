<?php
require_once 'Comment.php';
require_once 'Utility.php';
require_once './constants.php';
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

    private $UserID;
    private $PostID;
    private $title;
    private $content;
    private $time;
    private $picName;
    private $No_like;
    private $No_dislike;
    private $hashtag;
    private $AllowComment;
    private $filter_keyword;

    function __construct($PostID = 0, $UserID = 0, $title = '', $content = '', $picName = '', $No_like = 0, $No_dislike = 0, $time = '', $hashtag = '', $AllowComment = 1,$filter_keyword = '') {
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
        $this->filter_keyword = $filter_keyword;
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

    function getAllowComment() {
        return $this->AllowComment;
    }

    function setAllowComment($AllowComment) {
        $this->AllowComment = $AllowComment;
    }
    function getFilter_keyword() {
        return $this->filter_keyword;
    }

    function setFilter_keyword($filter_keyword) {
        $this->filter_keyword = $filter_keyword;
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
                <a href="postDetail.php?post_id=' . $this->PostID . '"><img class="img-responsive img" src="img/' . $this->picName . '" alt=""/></a>
                <div class="col-md-12 text">
                    <h3 class="title">' . $this->title . '</h3>
                    <span>by <strong>' . $result['name'] . '</strong></span>
                    <p>' . substr($this->content, 0, MAX_LENGTH_OF_C_P) . ' ......' . $this->AllowComment . '</p>
                    <h5 class="date pull-right">' . Utility::formatDate($this->time, "j M Y") . '</h5>
                </div>
            </div>';
        return $str;
    }

    function displayTileInList() {
        return '<li><a href="postDetail.php?post_id=' . $this->PostID . '">' . $this->title . '</a></li>';
    }

    function displayAtAllPost() {
        $ap = '<div class="col-md-4 portfolio-item">
                        <a href="postDetail.php?post_id=' . $this->PostID . '">
                            <img class="img-responsive posts" src="img/' . $this->picName . '" alt="">
                        </a>
                        <span class="fa fa-thumbs-up fa-lg like">&nbsp;&nbsp; ' . $this->No_like . '</span>
                        <h3>
                            <a href="#" style="color: #000">' . $this->title . '</a>
                        </h3>
                        <p>' . substr($this->content, 0, MAX_LENGTH_OF_C_P) . ' ......</p>
                    </div>';
        return $ap;
    }

    function displayAtDetail() {
        require_once 'constants.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == TRUE) {
    $U = $_SESSION['username'];
    $UID = $_SESSION['UserID'];
    $L = $_SESSION['loggedIn'];
} else {
    $L = FALSE;
}

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
        $pd = '<h1>' . $this->title . '</h1>
            <p class="lead">by <a href="profile.php">' . $result['name'] . '</a></p>
            <hr>
            <p><span class="glyphicon glyphicon-time"></span> Posted on ' . Utility::formatDate($this->time, "F d, Y") . ' at ' . Utility::formatDate($this->time, "g:i:s A") . '<form><input type="hidden"  value="'.$this->PostID.'" name="PID" id="PID" class="pull-right">'
                . '<input type="hidden" name="UID" id="UID" value="'.$UID.'" class="pull-right"><input type="hidden" name="No_like" id="No_like" value="'.$this->No_like.'" class="pull-right"><input type="hidden" name="loggedIn" id="loggedIn" value="'.$L.'" class="pull-right"><button class="pull-right like-btn" type="button" id="like_button"><i class="fa fa-thumbs-up">&nbsp;&nbsp;' . $this->No_like . '</i></button></form></p>
            <hr>
            <img class="img-responsive" src="img/' . $this->picName . '" alt="">
            <hr>
            <p>' . $this->content . '</p>
            <p class="lead">';
            if($this->hashtag != ""){
            $hashtags = Utility::changeToHashtag($this->hashtag);
                foreach($hashtags as $tag)
                {
                    $pd.= '<a href="allPost.php?keyword='. substr($tag, 1).'&fDate=&tDate=">'.$tag.'</a>';
                }

            }
               $pd.= '</p>
            <hr>';

        return $pd;
    }

    function displayPostComments() {
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
        $query = "SELECT * FROM comment WHERE PostID = :PID";
        $statement = $db->prepare($query);
        $statement->bindValue(':PID', $this->PostID);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Comment');
        $statement->closeCursor();
        if ($this->AllowComment == 0) {
            return '<center><p>No Comments are allowed on this post :)</p></center>';
        } 
        else
        {
            if (empty($result)) 
            {
                return '<center><p>No Comments so far :)</p></center>';
            }
            else 
            {
                $cs = '';
                foreach ($result as $c) {
                    $cs += $c->diplayComment();
                }
                return substr($cs,0,strlen($cs)-1);
            }
        }
    }

}
