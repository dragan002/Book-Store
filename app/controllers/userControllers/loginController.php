<?php

require_once('../../app/initialize.php');
include(SHARED_PATH . '/login_header.php');

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $user = find_user_by_email($email);
}

$errors = [];

// Negacija prvo
if (is_post_request()) {
    try {
        $logger_data = get_logger_from_form();

        if (!$logger_data) {
            $errors[] = "Form submission error: No data received";
        } else {
            $email = $logger_data['email'];
            $password = $logger_data['password'];

            $match = login($email, $password);

            if (!$match) {
                throw new Exception("Incorrect email or password");
            }
            
            handleSuccessfulLogin($user);
        }
    } catch (Exception $e) {
        $errors[] = $e->getMessage();
    }
}
// PRvi put kada kliknem na login uvijek ce biti  bez podataka o useru jer nisam kliknuo na post i ne mogu negaciju da uradim 