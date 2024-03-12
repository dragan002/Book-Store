<?php
    require_once('../../initialize.php');
    include(SHARED_PATH . '/admin_header.php');

if(!isset($_GET['id'])) {
    exit();
}

$id = $_GET['id'];

$user = $userInstance->findUserById($id);

if($userInstance->deleteUser($user)) {
    header('Location: ../../view/adminUsers.php');
} else {
    echo "Error deleting user";
}