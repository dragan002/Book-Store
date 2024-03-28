<?php

namespace App\models\classes\Validation;
class FunctionsValidation {
    
    private $errors;

    public function getErrors()
    {
        return $this->errors;
    }

    function usernameValidation(string $username): void {
        $this->errors = [];
        if (empty($username) || !preg_match('/^[a-zA-Z0-9_]{5,20}$/', $username)) {
            $this->errors['username'] = 'Invalid username. It should be 5-20 characters long and contain only letters, numbers, and underscores.';
        }
    }

    function emailValidation(string $email): void {
        $this->errors = [];
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Invalid email address.';
        }
    }

    function passwordValidation(string $password): void {
        $this->errors = [];
        if (empty($password) || strlen($password) < 6 || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $password)) {
            $this->errors['password'] = 'Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.';
        }
    }

    function confirmPasswordValidation(string $confirmPassword): void {
        if(empty($confirmPassword)) {
            $this->errors['confirmPassword'] = "Please enter your password again.";
        }
    }
}