<?php 
require_once('../../app/initialize.php');
include(SHARED_PATH . '/header.php');

if(is_post_request()) {
    $search = $_POST['search'];
} else {
    $search = $_GET['search'];
}

$users = find_all_users();
$search_results = searchUser($search);

