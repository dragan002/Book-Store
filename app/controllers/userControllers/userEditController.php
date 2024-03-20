<?php
require_once('../initialize.php');
include(SHARED_PATH . '/admin_header.php');

if (!isset($_GET['id'])) {
    exit();
}

$id = $_GET['id'];

$userInstance = new App\models\classes\User\User();

$user = $userInstance->findUserById($id);

if (isset($_POST['edit'])) {
    $editedUser = [
        'id' => $id,
        'username' => trim($_POST['username']),
        'email' => trim($_POST['email']),
        'password' => $password = trim((password_hash($_POST['password'], PASSWORD_DEFAULT))),
        'role' => trim($_POST['role']),
    ];

    $result = $userInstance->editUser($editedUser);

    if(!$result) {
        echo '<script>alert("Error editing the user.");</script>';
    }
    header("Location: ../view/adminUsers.php");
}
?>