<?php 
require_once('../private/initialize.php');
include(SHARED_PATH . '/header.php')
?>

<!-- Jumbotron (Hero Section) -->
<div class="jumbotron text-center">
    <h1 class="display-4">Welcome to our Book Store</h1>
    <p class="lead">Explore a vast collection of books and discover new worlds.</p>
    <a class="btn btn-primary btn-lg" href="#" role="button">Browse Books</a>
</div>

<!-- Featured Books Section -->
<div class="container mt-4">
    <h2 class="text-center mb-4">Featured Books</h2>
    <div class="row">
        <!-- Sample Book Cards (Add more as needed) -->
        <div class="col-md-4">
            <div class="card">
                <img src="book1.jpg" class="card-img-top" alt="Book 1">
                <div class="card-body">
                    <h5 class="card-title">Book Title 1</h5>
                    <p class="card-text">Description of the book goes here.</p>
                    <a href="#" class="btn btn-primary">Details</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="book2.jpg" class="card-img-top" alt="Book 2">
                <div class="card-body">
                    <h5 class="card-title">Book Title 2</h5>
                    <p class="card-text">Description of the book goes here.</p>
                    <a href="#" class="btn btn-primary">Details</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="book3.jpg" class="card-img-top" alt="Book 3">
                <div class="card-body">
                    <h5 class="card-title">Book Title 3</h5>
                    <p class="card-text">Description of the book goes here.</p>
                    <a href="#" class="btn btn-primary">Details</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include(SHARED_PATH . '/footer.php');