<?php
    require_once('../initialize.php');
    include(SHARED_PATH . '/admin_header.php');

if(!isset($_GET['id'])) {
    exit();
}

$id = $_GET['id'];

$user = find_user_by_id($id);

if(delete_user($user)) {
    header('Location: ../view/adminUsers.php');
} else {
    echo "Error deleting user";
}