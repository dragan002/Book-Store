<?php 
require_once('../../app/initialize.php');
require_once('../../app/controllers/cartControllers/cartController.php');
include(SHARED_PATH . '/header.php');

$pageTitle = "Cart";
echo $userId = $_SESSION['id'];
echo $bookId = $_GET['id'];

$item = $cartInstance->addToCart($userId, $bookId, '');


$cartItems = $cartInstance->findAllFromCart();
?>

<!-- Cart Content Section -->
<div class="container mt-5">
    <h2>Your Shopping Cart</h2>
    <hr>
    <?php
                if (isset($_SESSION['alert_message']['success'])) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo $_SESSION['alert_message']['success'];
                    echo '</div>';
                    unset($_SESSION['alert_message']['success']); // Remove the message from the session
                } elseif (isset($_SESSION['alert_message']['error'])) {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo $_SESSION['alert_message']['error'];
                    echo '</div>';
                    unset($_SESSION['alert_message']['error']); // Remove the message from the session
                } ?>

    <!-- Cart Items -->
    <div class="row">
        <div class="col-md-8">
            <?php foreach ($cartItems as $cartItem) {
                $book = $bookInstance->findBookById($cartItem['book_id']);
                var_dump($book);
            ?>
                <!-- Item 1 -->
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="../../public/image/<?php echo $book['book_image']; ?>" class="card-img" alt="Item 1 Image">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $book['book_title']; ?></h5>
                                <p class="card-text"><?php echo $book['book_descr']; ?></p>
                                <p class="card-text"><?php echo $book['book_price']; ?></p>
                                <form action="delete_from_cart.php" method="post">
                                    <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="col-md-4">
            <!-- Order Summary or Checkout Section -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Order Summary</h5>
                    <p class="card-text">Total Items: </p>
                    <p class="card-text">Total Price: $</p>
                    <a href="checkout.html" class="btn btn-primary">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>


