<?php 
require_once('../../app/initialize.php');
require_once('../../app/controllers/cartControllers/cartController.php');
include(SHARED_PATH . '/header.php');

$pageTitle = "Cart";


echo $userId ;


//  $knjiga = $bookInstance->findBookById(88);
    $cartItems = $cartInstance->findAllFromCart();

    // $firstBook = $cartInstance->addToCart(23, 88, 2);
    

    foreach($cartItems as $cartItem) {
        echo $cartItem['book_id'] . "<hr>";
        echo $cartItem['user_id'];
    }

    $book = $bookInstance->findBookById($cartItem['book_id']);

$cartItems = [
    'book_title' => $book['book_title'],
    'book_descr' => $book['book_descr'],
    'book_image' => $book['book_image'],
    'book_price' => $book['book_price']
];
    // $example = $bookInstance->findBookById(105);

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
                            <img src="../../public/image/<?php echo $book['book_image']; ?>?>" class="card-img" alt="Item 1 Image">
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