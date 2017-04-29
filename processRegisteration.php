<?php
require_once ("Includes/database.php");
require_once ("Includes/validate.php");
session_start();

$form_errors = array();
$required_fields = array('exampleInputUsername', 'exampleInputEmail', 'password', 'confirm-password','gender');
$form_errors = array_merge($form_errors, check_empty_fields($required_fields));
$fields_to_check_length = array('exampleInputUsername' => 6, 'password' => 8, 'confirm-password' => 8);
$form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));
$form_errors = array_merge($form_errors, check_email('exampleInputEmail',$_POST));
$form_errors = array_merge($form_errors, valid_2_password($_POST));
$form_errors = array_merge($form_errors, valid_username($_POST));
//$form_errors = array_merge($form_errors, check_user_exist($_POST));

$email = filter_input(INPUT_POST, "exampleInputEmail", FILTER_SANITIZE_EMAIL);
    $query2 = "SELECT * FROM user WHERE email = :email";
    $statement2 = $db->prepare($query2);
    $statement2->bindValue(':email', $email);
    $statement2->execute();
    $result = $statement2->fetchAll();
    
    if(!empty($result))
    {
        $form_errors[] = "This email address has already been registered.<br>";
    }

if(!empty($form_errors))
{
    $username = $_POST["exampleInputUsername"];
    $email = $_POST["exampleInputEmail"];
    $password1 = $_POST["password"];
    $password2 = $_POST["confirm-password"];
    $gender = $_POST['gender'];
    include('index.php');
    exit();
}
else
{
    $username = filter_input(INPUT_POST, "exampleInputUsername", FILTER_SANITIZE_STRING);
    $password1 = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "exampleInputEmail", FILTER_SANITIZE_EMAIL);
    $gender = filter_input(INPUT_POST, "gender", FILTER_SANITIZE_STRING);
    $hashed_password = password_hash($password1, PASSWORD_DEFAULT);
    $query = "INSERT INTO user (name,email,password,gender) VALUES (:username,:email,:password,:gender)";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $hashed_password);
    $statement->bindValue(':gender', $gender);

//$statement->bindValue(':password', $password1);   
    $statement->execute();
    $statement->closeCursor();

    $query1 = "SELECT * FROM user WHERE name = :name";
    $statement1 = $db->prepare($query1);
    $statement1->bindValue(':name', $username);
    $statement1->execute();
    $result = $statement1->fetch();
    session_start();
    $_SESSION['loggedIn'] = TRUE;
    $_SESSION['username'] = $username;
    $_SESSION['UserID'] = $result['UserID'];
    $_SESSION['timeout'] = time();
    header('location:home.php');
    
}