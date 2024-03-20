<?php

require_once('../../app/initialize.php');
include(SHARED_PATH . '/header.php');

if(!isPostRequest()) {
    $search = $_GET['search'];
} else {
    $search = $_POST['search'];
}
$bookInstance = new App\models\classes\Book\Book();

$books = $bookInstance->findAllBooks();
$searchResults = $bookInstance->searchBooks($search);

