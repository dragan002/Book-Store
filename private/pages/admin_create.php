<?php 
require_once('../initialize.php');
include(SHARED_PATH . '/admin_header.php');

    


if (isset($_POST['submit'])) {
    $book = [
        'book_title' => trim($_POST['title']),
        'book_price' => floatval(trim($_POST['price'])),
        'book_author' => trim($_POST['author']),
        'book_image' => $_POST['image'],
        'book_descr' => trim($_POST['description']),
        'book_quantity' => intval(trim($_POST['quantity'])),
    ];

    // Additional code for uploading image if needed

    if (create_book($book)) {
        echo '<div class="alert alert-success" role="alert">Book created successfully!</div>';
        echo '<script>';
        echo 'setTimeout(function(){ window.location.href = "admin_homepage.php"; }, 2000);';
        echo '</script>';
    } else {
        echo '<script>';
        echo 'alert("Error creating the book.");';
        echo '</script>';
    }
}

?>

<div class="container mt-5">
        <h2>Create New Book</h2>
        <form action="admin_create.php" method="POST">
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