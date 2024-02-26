<?php 
require_once('../../app/initialize.php');
$pageTitle = "Books by Category";

include(SHARED_PATH . '/header.php');

$id = $_GET['category_id'];

$booksById = find_book_by_category($id);
?>

<div class="container mt-5">
    <h2>Books by Category</h2>
    <hr>

    <div class="row">
        <?php foreach ($booksById as $book) : ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="../../public/image/<?php echo $book['book_image']; ?>" class="card-img-top" alt="<?php echo $book['book_title']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $book['book_title']; ?></h5>
                        <p class="card-text"><strong>Author:</strong> <?php echo $book['book_author']; ?></p>
                        <p class="card-text"><strong>Price:</strong> $<?php echo $book['book_price']; ?></p>
                        <a href="details.php?id=<?php echo $book['id']; ?>" class="btn btn-primary">Details</a>
                        
                        <button class="btn btn-success ml-2" onclick="addToCart(<?php echo $book['id']; ?>)">
                            <i class="fas fa-shopping-cart"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>