<?php

require_once('../../app/initialize.php');
include(SHARED_PATH . '/login_header.php');


if(isset($_GET['email'])) {
    $email = $_GET['email'];
    $user = find_user_by_email($email);
}   




$errors = [];

if (is_get_request()) {
    try {
        $logger_data = get_logger_from_forms();
        
        if (!$logger_data) {
            $errors[] = "Form submission error: No data received";
        } 
        
        if($logger_data['email']) {}
        $email = $logger_data['email'];
        $password = $logger_data['password'];
    
        $match = login($email, $password);
    
        if (!$match) {
            return false;
        } 
        
        if( $user['role'] == 'admin') {
            header("Location: ..private/view/admin_homepage.php");
        };
        
        exit();
        
    } catch (Exception $e) {
        $errors[] = $e->getMessage();
    }
}