<?php

function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == "POST";
}

function is_get_request() {
    return $_SERVER['REQUEST_METHOD'] == "GET";
}

function displayCategoryName( $categoryId ) {
    if($categoryId == 1) {
        return "Fiction";
    } elseif($categoryId == 2) {
        return "Non-Fiction";
    } elseif($categoryId == 3) {
        return "Mystery";
    } elseif($categoryId == 4) {
        return "Science Fiction";
    }
} 
?>
