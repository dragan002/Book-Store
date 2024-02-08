<?php 
require_once('../initialize.php');
include(SHARED_PATH . '/admin_header.php');

    if(is_post_request()) {
        if(isset($_POST['submit'])) {

          $title = trim($_POST['title']);
          $title = mysqli_escape_string($db, $title);

          $price = floatval(trim($_POST['price']));
          $price = mysqli_escape_string($db, $price);

          $author = trim($_POST['author']);
          $author = mysqli_escape_string($db, $author);
          
          $description = trim($_POST['description']);
          $description = mysqli_escape_string($db, $description);

          $quanitity = intval(trim($_POST['quantity']));
          $quanitity = mysqli_escape_string($db, $quanitity);

          $stock = isset( $_POST["in-stock"] ) ? "Yes" : "No";
        } 
    } else {
        die('Request Method is not POST');
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
                <label for="image" class="form-label">Image URL:</label>
                <input type="text" class="form-control" id="image" name="image" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="inStock" name="inStock">
                <label class="form-check-label" for="inStock">Is in Stock?</label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Create Book</button>
        </form>
    </div>