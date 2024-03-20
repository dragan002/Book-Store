<?php 
require_once('../../app/initialize.php');
require_once('../../app/controllers/cartControllers/cartController.php');
include(SHARED_PATH . '/header.php');

$pageTitle = "Cart";
(isset($_SESSION['id'])) ? $userId = $_SESSION['id'] : '';
(isset($_GET['id'])) ? $bookId = $_GET['id'] : '';

$cartInstance = new App\models\classes\Cart\Cart();
$bookInstance = new App\models\classes\Book\Book();

if(isset($userId) && isset($bookId)) {
    $item = $cartInstance->addToCart($userId, $bookId, '');
    header("Location: ../index.php");
} 

$cartItems = $cartInstance->findAllFromCart($userId);

$totalPrice = 0;
?>

<!-- Cart Content Section -->
<div class="container mt-5">
    <h2>Your Shopping Cart</h2>
    <!-- Cart Items -->
    
    <div class="row">
        <div class="col-md-8">
            <?php foreach ($cartItems as $cartItem) {
                $book = $bookInstance->findBookById($cartItem['book_id']);
                $totalPrice += $book['book_price'];
                ?>
  
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="../../public/image/<?php echo $book['book_image']; ?>" class="card-img" alt="Item Image">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $book['book_title']; ?></h5>
                                <p class="card-text"><?php echo $book['book_descr']; ?></p>
                                <p class="card-text"><?php echo $book['book_price']; ?></p>
                                    <td><a href="../../app/controllers/cartControllers/cartDeleteController.php?id=<?php echo $book['id']?>" class="btn btn-danger">Delete</a></td>
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
                    <p class="card-text">Total Items: <?php echo count($cartItems); ?> </p>
                    <p class="card-text">Total Price: $<?php echo $totalPrice; ?></p>
                    <a href="checkout.html" class="btn btn-primary">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>


