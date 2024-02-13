<?php   
    require_once('../../private/initialize.php');

function get_logger_from_post() {
    if(is_post_request() && isset( $_POST['email']) && isset( $_POST['password']) ) {
        $logger = [
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];
        return $logger;
    }
}

function authenticate_user($logger, $admini) {
    foreach($admini as $admin) {
        if($admin['email'] == $logger['email'] && $admin['password'] == $logger['password']) {
            return true;
        } else {
            return false;
        }
    }
}