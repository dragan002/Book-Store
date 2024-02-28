<?php
require_once('../../app/initialize.php');
include(SHARED_PATH . '/header.php');


if (isset($_POST['register'])) {
    $user = [
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => $password = (password_hash($_POST['password'], PASSWORD_DEFAULT)),
        'confirm_password' => $_POST['confirm_password']
    ];

    $usernameError = usernameValidation($user['username']);
    $emailError = emailValidation($user['email']);
    $passwordError = passwordValidation($user['password']);

    if(password_verify($user['confirm_password'], $password));

    $errors = array_merge($usernameError, $emailError, $passwordError);

    if (empty($errors)) {
        $createdUser = createUser([
            'username' => $user['username'],
            'email' => $user['email'],
            'password' => $user['password']
        ]);

        if (!$createdUser) {
            die("Error creating user");
        }
        header("Location: login.php?registration=success");
    }
}
?>
