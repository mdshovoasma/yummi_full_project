<?php
session_start();
include "../database/env.php";
$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$encPassword = password_hash($password, PASSWORD_BCRYPT);

$confirmPassword = $_REQUEST['confirmPassword'];
$errors = [];



//* VALIDATION
if (empty($fname)) {
    $errors['fname_error'] = "Your first name is missing";
}
if (empty($lname)) {
    $errors['lname_error'] = "Your last name is missing";
}
if (empty($email)) {
    $errors['email_error'] = "Your email is missing";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email_error'] = "please enter a valid email address";
}

if (empty($password)) {
    $errors['password_error'] = "Your password is missing";
} else if (strlen($password) < 8) {
    $errors['password_error'] = "Your password is too short";
} else if ($password != $confirmPassword) {
    $errors['password_error'] = "Your password did not match";
}


//* ERROR REDIRECT





if (count($errors) > 0) {
    $_SESSION['register_errors'] = $errors;
    header("Location: ../backend/register.php");
} else {




    $query = "INSERT INTO user_table(fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$encPassword')";

    $result  = mysqli_query($conn, $query);
    if($result){
        header("Location:../backend/login.php");
    }

}
