<?php

$id = $_GET['id'];
echo $id;

$book = $bookInstance->findBookById($id);

$cartItems = [
    'book_title' => $book['book_title'],
    'book_descr' => $book['book_descr'],
    'book_image' => $book['book_image'],
    'book_price' => $book['book_price']
];
