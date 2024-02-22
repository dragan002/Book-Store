<?php

require_once('../../app/initialize.php');
include(SHARED_PATH . '/header.php');

$errors = [];

if(isset($_POST['register'])) {
    $user = [
        'username' => usernameValidation($_POST['username']), 
        'email' => emailValidation($_POST['email']),
        'password' => passwordValidation(password_hash($_POST['password'], PASSWORD_DEFAULT)),
        'confirm_password' => $_POST['confirm_password']
    ];

    if(!createUser($user)) {
        die("Error creating user");
    } else {
        header("Location: login.php?signup=success");
    }
}
        // if (User::create($user)) {
        //     echo "<script>alert('Registered successfully!')</script>";
        // }