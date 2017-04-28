<?php
require_once ("Includes/database.php");
require_once ("Includes/validate.php");
session_start();

$form_errors1 = array();
$required_fields = array('user', 'pass');
$form_errors1 = array_merge($form_errors1, check_empty_fields($required_fields));
$fields_to_check_length = array('user' => 6, 'pass' => 8);
$form_errors1 = array_merge($form_errors1, check_min_length($fields_to_check_length));
$form_errors1 = array_merge($form_errors1, check_email("user",$_POST));
$form_errors1 = array_merge($form_errors1, valid_password("pass",$_POST));


if(!empty($form_errors1))
{
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    
    include('index.php');
    exit();
}
else
{
    $username = filter_input(INPUT_POST, "user", FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_STRING);
    $query = "SELECT * FROM user WHERE email = :username";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();

    if (empty($result)) {
        $form_errors1[] = "User doesn't exsit.";
        $user = $username;
        $pass = $password;
        include ('index.php');
        exit();
    } else {
        $id = $result['UserID'];
        $hashed_password = $result['password'];
        $username = $result['name'];
        if (password_verify($password, $hashed_password)) {
            $_SESSION['UserID'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['loggedIn'] = TRUE;
            $_SESSION['timeout'] = time();
            header('location:home.php');
           
            //echo "password valid";
        } else {
            $form_errors1[] = "Username or password doesn't match.";
            $user = $username;
        $pass = $password;
            include ('index.php');
            exit();
        }
    }
}