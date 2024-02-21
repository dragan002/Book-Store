<?php

require_once('../../app/initialize.php');
include(SHARED_PATH . '/login_header.php');

$errors = [];

if (is_post_request()) {
    try {
        $logger_data = get_logger_from_form();
        
        if (!$logger_data) {
            $errors[] = "Form submission error: No data received";
        } 
        
        $email = $logger_data['email'];
        $password = $logger_data['password'];
    
        $match = login($email, $password);
    
        if (!$match) {
            return false;
        } 

        header('Location: ../../app/view/admin_homepage.php');
        exit();
        
    } catch (Exception $e) {
        $errors[] = $e->getMessage();
    }
}