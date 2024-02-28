<?php
    require_once('../initialize.php');
    include(SHARED_PATH . '/admin_header.php');

if(!isset($_GET['id'])) {
    echo "debugging";
    exit();
} else {
    $id = $_GET['id'];
}

$book = find_book_by_id($id);

if(delete_book($book)) {
    header('Location: ../view/admin_homepage.php');
} else {
    echo "Error deleting book.";
}