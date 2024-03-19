<?php

namespace Validation;
class FunctionsValidation {
    
    private $errors;

    public function getErrors()
    {
        return $this->errors;
    }

    function usernameValidation($username) {
        $this->errors = [];
        if (empty($username) || !preg_match('/^[a-zA-Z0-9_]{5,20}$/', $username)) {
            $this->errors['username'] = 'Invalid username. It should be 5-20 characters long and contain only letters, numbers, and underscores.';
        }
    }

    function emailValidation($email) {
        $this->errors = [];
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Invalid email address.';
        }
    }

    function passwordValidation($password) {
        $this->errors = [];
        if (empty($password) || strlen($password) < 6 || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $password)) {
            $this->errors['password'] = 'Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.';
        }
    }

    function confirmPasswordValidation($confirmPassword) {
        if(empty($confirmPassword)) {
            $this->errors['confirmPassword'] = "Please enter your password again.";
        }
    }
}