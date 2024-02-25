<?php 
require_once('../../app/initialize.php');
$pageTitle = "About";

include(SHARED_PATH . '/header.php');

$id = $_GET['id'];

$books = find_all_books();

foreach($books as $book) {
    var_dump($book['category_id']);
}

$categories = find_category_by_id($id);


var_dump($categories['category_name']);

?>

<!-- <?php foreach ($books as $book) : ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="../../public/image/<?php echo $book['book_image']; ?>" class="card-img-top" alt="<?php echo $book['book_title']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $book['book_title']; ?></h5>
                        <p class="card-text"><strong>Author:</strong> <?php echo $book['book_author']; ?></p>
                        <p class="card-text"><strong>Price:</strong> $<?php echo $book['book_price']; ?></p>
                        <a href="pages/details.php?id=<?php echo $book['id']; ?>" class="btn btn-primary">Details</a>

                        <a href="#" class="btn btn-success ml-2">
                            <i class="fas fa-shopping-cart"></i> Add to Cart
                        </a>

                    </div>
                </div>
            </div>
        <?php endforeach; ?> -->