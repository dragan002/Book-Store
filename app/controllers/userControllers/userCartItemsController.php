<?php

$id = $_GET['id'];
echo $id;

$book = find_book_by_id($id);
echo $book['book_title'];

$cartItems = [
    'book_title' => $book['book_title'],
    'book_descr' => $book['book_descr'],
    'book_image' => $book['book_image'],
    'book_price' => $book['book_price']
];
addToCart($id, $book);