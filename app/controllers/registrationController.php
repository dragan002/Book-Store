<?php

require_once('../../app/initialize.php');
include(SHARED_PATH . '/header.php');

if(isset($_POST['register'])) {
    $user = [
        'username' => $_POST['username'], 
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
    ];
    // if (User::create($user)) {
    //     echo "<script>alert('Registered successfully!')</script>";
    // }
    if(!createUser($user)) {
        die("Error creating user");
    } else {
        header("Location: login.php?signup=success");
    }
}