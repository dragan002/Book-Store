<?php
require_once('../initialize.php');
include(SHARED_PATH . '/admin_header.php');

if (!isset($_GET['id'])) {
    exit();
}

$id = $_GET['id'];
$user = find_user_by_id($id);

if (isset($_POST['edit'])) {
    $editedUser = [
        'id' => $id,
        'username' => trim($_POST['username']),
        'email' => trim($_POST['email']),
        'role' => trim($_POST['role']),
    ];

    $result = editUser($editedUser);

    if ($result) {
        header("Location: admin_homepage.php");
    } else {
        echo '<script>alert("Error editing the user.");</script>';
    }
}
?>