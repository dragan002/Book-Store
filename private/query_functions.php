<?php

function find_all_books() {
    global $db;

    $sql = "SELECT * FROM books";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}