<?php
require_once('../../app/initialize.php');
include(SHARED_PATH . '/header.php');

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    $usernameError = $userValidation->usernameValidation($username);
    $emailError = $userValidation->emailValidation($email);
    $passwordError = $userValidation->passwordValidation($password);

    if ($password !== $confirmPassword) {
        $passwordError[] = "Passwords do not match";
    }

    $errors = array_merge($usernameError, $emailError, $passwordError);

    if (empty($errors)) {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $createdUser = $userInstance->createUser([
            'username' => $username,
            'email' => $email,
            'password' => $hashedPassword
        ]);

        if (!$createdUser) {
            die("Error creating user");
        }
        header("Location: login.php?registration=success");
        exit;
    }
}
?>
