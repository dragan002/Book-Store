<?php 
require_once('../initialize.php');
include(SHARED_PATH . '/admin_header.php');

if(isset($_FILES['image'])&& $_FILES['image']['name'] != ""){
    $image = $_FILES['image']['name'];
    $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
    $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "../../public/image/";
    $uploadDirectory .= $image;
    move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
}

if (isset($_POST['submit'])) {
    $book = [
        'book_title' => trim($_POST['title']),
        'book_price' => floatval(trim($_POST['price'])),
        'book_author' => trim($_POST['author']),
        'book_image' => $image,
        'book_descr' => trim($_POST['description']),
        'book_quantity' => intval(trim($_POST['quantity'])),
    ];

    if (!create_book($book)) {
        echo '<script>';
        echo 'alert("Error creating the book.");';
        echo '</script>';
    } else {
        header( "Location: admin_homepage.php");
    }
}

?>

<div class="container mt-5">
        <h2>Create New Book</h2>
        <form action="admin_create.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author:</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>
            <div class="mb-3">
                <label for="uploadImage" class="form-label">Upload Image:</label>
                <input type="file" class="form-control" id="uploadImage" name="image" accept="image/*" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Create Book</button>
        </form>
    </div>