<?php

function check_empty_fields($required_fields_array) {
    $form_errors = array();
    foreach ($required_fields_array as $name_of_field) {
        if (!isset($_POST[$name_of_field]) || $_POST[$name_of_field] == NULL) {
            $form_errors[] = $name_of_field . " is a required field.";
        }
    }
    return $form_errors;
}

//function check_user_exist($data)
//{
//    require_once ("Includes/database.php");
//
//    $form_errors = array();
//
//    
//    return $form_errors;
//}

function check_min_length($fields_to_check_length) {
    $form_errors = array();

    foreach ($fields_to_check_length as $name_of_field => $minimum_length_required) {
        if (strlen(trim($_POST[$name_of_field])) < $minimum_length_required) {
            $form_errors[] = $name_of_field . " is too short, must be {$minimum_length_required} characters long.";
        }
    }
    return $form_errors;
}

function check_email($key,$data) {
    $form_errors = array();
    if (array_key_exists($key, $data)) {
        if ($_POST[$key] != null) {
            $key = filter_var($key, FILTER_SANITIZE_EMAIL);
            if (filter_var($_POST[$key], FILTER_VALIDATE_EMAIL) === false) {
                $form_errors[] = $key . " is not a valid email address.";
            }
        }
    }
    return $form_errors;
}

//function valid_date($data) {
//    $date = $_POST['date'];
//    $date_parsed = date_parse($date);
//    $form_errors = array();
//    if ($date_parsed["error_count"] !== 0 || !checkdate($date_parsed["month"], $date_parsed["day"], $date_parsed["year"])) {
//        $form_errors[] = "Invalid date";
//    }
//
//    return $form_errors;
//}

function valid_2_password($data) {
    $form_errors = array();
    $password1 = $_POST['password'];
    $password2 = $_POST['confirm-password'];

    $p1 = '/[A-Z]/';
    $p2 = '/[a-z]/';
    $p3 = '/[0-9]/';
//$p4 = '/!#$%^&*{}()<.>]/';	

    if (!preg_match($p1, $password1)) {
        $form_errors[] = "Password must have at least 1 uppercase letter.";
    }
    if (!preg_match($p2, $password1)) {
        $form_errors[] = "Password must have at least 1 lowercase letter.";
    }
    if (!preg_match($p3, $password1)) {
        $form_errors[] = "Password must have at least 1 number.";
    }
    if ($password1 != $password2) {
        $form_errors[] = "Passwords don't match.";
    }
    return $form_errors;
}

function valid_password($key,$data) {
    $form_errors = array();
    $password = $_POST[$key];

    $p1 = '/[A-Z]/';
    $p2 = '/[a-z]/';
    $p3 = '/[0-9]/';
//$p4 = '/!#$%^&*{}()<.>]/';	

    if (!preg_match($p1, $password)) {
        $form_errors[] = "Password must have at least 1 uppercase letter.";
    }
    if (!preg_match($p2, $password)) {
        $form_errors[] = "Password must have at least 1 lowercase letter.";
    }
    if (!preg_match($p3, $password)) {
        $form_errors[] = "Password must have at least 1 number.";
    }
    return $form_errors;
}

//function check_price($data) {
//    $form_errors = array();
//    $price = $_POST['price'];
//    if (is_numeric($price) == false) {
//        $form_errors[] = "This not a numeric value!";
//    } else if ($price <= 0) {
//        $form_errors[] = "Price should be greater than 0!";
//    }
//    return $form_errors;
//}

function valid_username($data) {
    $form_errors = array();
    $username = $_POST['exampleInputUsername'];

    $p4 = '/!#$%^&*{}()<.>]/';

    if (preg_match($p4, $username)) {
        $form_errors[] = "Only digits or letters are allowed in username.";
    }
    return $form_errors;
}
