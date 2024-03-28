<?php
    require_once('../../initialize.php');
    include(SHARED_PATH . '/admin_header.php');

if(!isset($_GET['id'])) {
    exit();
}

$id = $_GET['id'];

$userInstance = new App\models\classes\User\User();

$user = $userInstance->findUserById($id);

if(!$userInstance->deleteUser($user['id'])) {
    echo "Error deleting user";
} 
header('Location: ../../view/adminUsers.php');