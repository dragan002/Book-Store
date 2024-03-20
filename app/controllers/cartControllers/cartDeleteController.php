<?php
require_once('../../initialize.php');

if(!isset($_GET['id'])) {
    echo "There is Error";
} 

$bookId = $_GET['id'];

$cartInstance = new App\models\classes\Cart\Cart();

if(!$cartInstance->deleteFromCart($bookId)) {
    echo "error";
} 
header("Location: ../../../public/pages/cartItems.php");