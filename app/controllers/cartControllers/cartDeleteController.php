<?php
require_once('../../initialize.php');

if(!isset($_GET['id'])) {
    echo "There is Error";
} 

$bookId = $_GET['id'];

$cartInstance = new App\models\classes\Cart\Cart();

if($cartInstance->deleteFromCart($bookId)) {
    header("Location: ../../../public/pages/cartItems.php");
} else {
    echo "error";
}

// if($bookInstance->deleteBook($book)) {
//     header('Location: ../view/admin_homepage.php');
// } else {
//     echo "Error deleting book.";
// }