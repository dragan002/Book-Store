<?php 
require_once('../../app/initialize.php');
include(SHARED_PATH . '/header.php');

if(is_post_request()) {
    $search = $_POST['search'];
} else {
    $search = $_GET['search'];
}

$books = find_all_books();
$search_results = search_books($search);


?>