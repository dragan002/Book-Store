<?php 
require_once('../../app/initialize.php');
include(SHARED_PATH . '/header.php');


if(!isPostRequest()) {
    die("Something went wrong");
} 
$search = $_POST['search'];

$userInstance = new App\models\classes\User\User();
$users = $userInstance->findAllUsers();
$searchResults = $userInstance->searchUser($search);

