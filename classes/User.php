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
class User {
    public $uname;
    private $uid;
    public $email;
    public $gender;
    public $profilePic;
    
    public function __construct($uname, $uid, $email, $gender, $profilePic) {
        $this->uname = $uname;
        $this->uid = $uid;
        $this->email = $email;
        $this->gender = $gender;
        $this->profilePic = $profilePic;
    }


    
    
}
