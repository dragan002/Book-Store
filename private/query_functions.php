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

function find_by_id($id) {
    global $db;

    $sql = "SELECT * FROM books";
    $sql .= " WHERE id = ?";
    $sql .= " LIMIT 1";

    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);

    $result_set = mysqli_stmt_get_result($stmt);
    confirm_result_set($result_set);

    $book = mysqli_fetch_assoc($result_set);

    mysqli_free_result($result_set);
    mysqli_stmt_close($stmt);

    return $book;
}

function edit_book($book) {
    global $db;

    $sql = "UPDATE books SET ";
    $sql .= "book_title = ?, ";
    $sql .= "book_price = ?, ";
    $sql .= "book_author = ?, ";
    $sql .= "book_image = ?, ";
    $sql .= "book_descr = ?, ";
    $sql .= "book_quantity = ? ";
    $sql .= "WHERE id = ?"; 

    $stmt = mysqli_prepare($db, $sql);

    mysqli_stmt_bind_param($stmt, 'sdssssi', $book['book_title'], $book['book_price'], $book['book_author'], $book['book_image'], $book['book_descr'], $book['book_quantity'], $book['id']);
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

function delete_book($book) {
    global $db;

    $sql = "DELETE FROM books ";
    $sql .= "WHERE id=" . $book['id'] . " ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);

    if($result) {
        return true;
    } else {
        echo "debugg";
        echo mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}

function login($email, $password) {
    global $db;

    $sql = "SELECT * FROM admin WHERE email = ? AND  password = ?";
    $stmt = mysqli_prepare($db, $sql);

    if(!$stmt) {
        die('Database failed: ' . mysqli_error($db));
    } 
    mysqli_stmt_bind_param($stmt, 'ss', $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    if(!$result) {
        die("Database query execution failed: " .mysqli_error($db));
    }
    $admin = mysqli_fetch_assoc($result);
    return $admin;
}