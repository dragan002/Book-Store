<?php
require_once('../../initialize.php');
include(SHARED_PATH . '/admin_header.php');

$bookInstance = new App\models\classes\Book\Book();

if(!isset($_GET['id'])) {
    echo "debugging";
    exit();
}

$id = $_GET['id'];


$book = $bookInstance->findBookById($id);

if($bookInstance->deleteBook($book)) {
    header('Location: ../../view/admin_homepage.php');
} else {
    echo "Error deleting book.";
}