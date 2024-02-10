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
    $sql = "INSERT INTO books ";
    $sql .= "(book_title, book_price, book_author, book_image, book_descr, book_quantity) ";
    $sql .= "VALUES (?, ?, ?, ?, ?, ?) ";

    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, 'sdssss', $book['book_title'], $book['book_price'], $book['book_author'], $book['book_image'], $book['book_descr'], $book['book_quantity']);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        echo mysqli_error($db);
        db_disconnect($db);
        exit();
    } else {
        mysqli_stmt_close($stmt);
        return true;
    }
}