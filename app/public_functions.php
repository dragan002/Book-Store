<?php

function get_logger_from_form() {
    if(!isset($_POST['email']) && !isset($_POST['password'])) {
        return false;
    } else {
         $logger = [
            'email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
            'password' => $_POST['password']
        ];
        return $logger;
    }
}