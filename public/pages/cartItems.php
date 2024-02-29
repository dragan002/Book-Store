<?php 
require_once('../../app/initialize.php');
require_once('../../app/controllers/userControllers/userCartItemsController.php');
$pageTitle = "Cart";

include(SHARED_PATH . '/header.php');
?>
  <!-- Cart Content Section -->
  <div class="container mt-5">
        <h2>Your Shopping Cart</h2>
        <hr>

        <!-- Cart Items -->
        <div class="row">
            <div class="col-md-8">
                <!-- Item 1 -->
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="path/to/item1/image.jpg" class="card-img" alt="Item 1 Image">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Item 1</h5>
                                <p class="card-text">Description of Item 1.</p>
                                <p class="card-text">Price: $19.99</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <!-- Order Summary or Checkout Section -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order Summary</h5>
                        <p class="card-text">Total Items: 2</p>
                        <p class="card-text">Total Price: $49.98</p>
                        <a href="checkout.html" class="btn btn-primary">Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>