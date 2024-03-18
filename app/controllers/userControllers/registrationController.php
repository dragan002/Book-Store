<?php
require_once('../../app/initialize.php');
include(SHARED_PATH . '/header.php');

if (isset($_POST['register'])) {
    $user = [
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        'confirm_password' => $_POST['confirm_password']
    ];

    $usernameError = $userValidation->usernameValidation($user['username']);
    $emailError = $userValidation->emailValidation($user['email']);
    $passwordError = $userValidation->passwordValidation($user['password']);

    if ($user['password'] !== $user['confirm_password']) {
        $passwordError[] = "Passwords do not match";
    }

    $errors = array_merge($usernameError, $emailError, $passwordError);

    if (empty($errors)) {
        $createdUser = $userInstance->createUser([
            'username' => $user['username'],
            'email' => $user['email'],
            'password' => $user['password']
        ]);

        if (!$createdUser) {
            die("Error creating user");
        }
        header("Location: login.php?registration=success");
        exit;
    }
}
?>
