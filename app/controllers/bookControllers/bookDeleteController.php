<?php
    require_once('../initialize.php');
    include(SHARED_PATH . '/admin_header.php');

if(!isset($_GET['id'])) {
    echo "debugging";
    exit();
} else {
    $id = $_GET['id'];
}

$book = $bookInstance->findBookById($id);

if($bookInstance->deleteBook($book)) {
    header('Location: ../view/admin_homepage.php');
} else {
    echo "Error deleting book.";
}