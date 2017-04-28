<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author lizhengxing
 */
require_once './constants.php';
require_once 'Post.php';
class User {

    public $UserID;
    public $name;
    public $password;
    public $email;
    public $gender;
    public $profilePic;

    function __construct($UserID = 0, $name = "", $password = "", $email = "", $gender = "", $profilePic = "") {
        $this->UserID = $UserID;
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
        $this->gender = $gender;
        $this->profilePic = $profilePic;
    }

    function getUserID() {
        return $this->UserID;
    }

    function getName() {
        return $this->name;
    }

    function getPassword() {
        return $this->password;
    }

    function getEmail() {
        return $this->email;
    }

    function getGender() {
        return $this->gender;
    }

    function getProfilePic() {
        return $this->profilePic;
    }

    function setUserID($UserID) {
        $this->UserID = $UserID;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setGender($gender) {
        $this->gender = $gender;
    }

    function setProfilePic($profilePic) {
        $this->profilePic = $profilePic;
    }

    function displayProfilePic() {
        if ($this->profilePic == "") {
            $this->profilePic = DEFAULT_PROFILE_PIC;
        }
        $s = '<center><img class="img-responsive visible-lg profile-pic" src="img/' . $this->profilePic . '" alt="" style="height:250px;"/></center>
                    <center><img class="img-responsive visible-md profile-pic" src="img/' . $this->profilePic . '" alt="" style="height:250px;"/></center>
                    <center><img class="img-responsive visible-sm profile-pic" src="img/' . $this->profilePic . '" alt="" style="width: 50%;height:250px;"/></center>
                    <center><img class="img-responsive visible-xs profile-pic" src="img/' . $this->profilePic . '" alt="" style="width: 50%; height:180px;"/></center>';
        return $s;
    }

    function displayPostsOfUser() {
        $dsn = "mysql:host=localhost;dbname=miles";
        $username = "root";
        $password = "";
        try {
            $db = new PDO($dsn, $username, $password);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            error_reporting(E_ALL);
            //echo "Connected";
        } catch (Exception $ex) {
            $form_errors = array();
            $form_errors[] = $ex->getMessage();
            include("index.php");
            exit();
        }

        $query1 = "SELECT * FROM post as p WHERE p.UserID = :uid";
        $stmt1 = $db->prepare($query1);
        $stmt1->bindValue(':uid', $this->UserID);
        $stmt1->execute();
        $results = $stmt1->fetchALL(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Post');
        $stmt1->closeCursor();

        $count = 0;
        $ss = '';
        while ($count < MAX_POST_AT_PROFILE && $count < sizeof($results)) {
            //$ss +=  $results[$count]->displayTileInList();
            echo $results[$count]->displayTileInList();
            $count++;
        }
        //return $ss;
    }

}
