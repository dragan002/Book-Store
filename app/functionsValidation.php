<?php

function usernameValidation($username) {
    $errors = [];
    if (empty($username) || !preg_match('/^[a-zA-Z0-9_]{5,20}$/', $username)) {
        $errors['username'] = 'Invalid username. It should be 5-20 characters long and contain only letters, numbers, and underscores.';
    }
    return $errors;
}

function emailValidation($email) {
    $errors = [];
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email address.';
    }
    return $errors;
}

function passwordValidation($password) {
    $errors = [];
    if (empty($password) || strlen($password) < 6 || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $password)) {
        $errors['password'] = 'Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.';
    }
    return $errors;
}

function confirmPasswordValidation($confirmPassword) {
    if(empty($confirmPassword)) {
        $errors['confirmPassword'] = "Please enter your password again.";
        return $errors;
    }
}
