<?php

class Cart extends Database {
    
    public function insertIntoCart($book) {
        $sql = "INSERT INTO `cartItems` (book_title, book_author, book_descr, book_image, book_quantity, book_price) ";
        $sql .= "VALUES(:book)"
    }
}