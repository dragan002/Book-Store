<?php 
require_once('../initialize.php');
include(SHARED_PATH . '/admin_header.php');

$bookInstance = new App\models\classes\Book\Book();

$categories = $bookInstance->findAllCategories();

if(isset($_FILES['image'])&& $_FILES['image']['name'] != ""){
    $image = $_FILES['image']['name'];
    $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
    $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "../../public/image/";
    $uploadDirectory .= $image;
    move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
}

if (isset($_POST['submit'])) {
    $book = [
        'book_title' => htmlspecialchars(trim($_POST['title'])),
        'book_price' => htmlspecialchars(floatval(trim($_POST['price']))),
        'book_author' => htmlspecialchars(trim($_POST['author'])),
        'book_image' => $image,
        'book_description' => htmlspecialchars(trim($_POST['description'])),
        'book_quantity' => htmlspecialchars(intval(trim($_POST['quantity']))),
        'category_id' => $_POST['category']
    ];

    if (!$bookInstance->createBook($book)) {
        die("There is issue with adding new book");
    }
    header( "Location: admin_homepage.php");
}

?>