<?php

function find_all_books() {
    global $db;

    $sql = "SELECT * FROM books";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function create_book($book) {
    global $db;

    $sql = "INSERT INTO books";
    $sql .= "(book_title, book_price, book_author, book_image, book_descr, book_quantity, flag)";
    $sql .="VALUES ( ";
    $sql .= "'" . $book['book_title'] . "', ";
    $sql .= "'" . $book['book_price'] . "', ";
    $sql .= "'" . $book['book_author'] . "', ";
    $sql .= "'" . $book['book_image'] . "', ";
    $sql .= "'" . $book['book_descr'] . "', ";
    $sql .= "'" . $book['book_quantity'] . "', ";
    $sql .= "'" . $book['book_flag'] . "', ";
    $sql .= " )";

    $result = mysqli_query($db, $sql);

    if(!$result) {
        echo mysqli_error($db);
        db_disconnect($db);
        exit();
    } else {
        return true;
    }
}