<?php 
require_once('../../private/initialize.php');
include(SHARED_PATH . '/header.php');

$search = $_GET['search'];

$books = find_all_books();



?>

<!-- Featured Books Section -->
<div class="container mt-4">
    <h2 class="text-center mb-4">Featured Books</h2>
    <div class="row">

        <?php while($book = mysqli_fetch_assoc($books)) { ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="../../public/image/<?php echo $book['book_image']; ?>" class="card-img-top" alt="<?php echo $book['book_title']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $book['book_title']; ?></h5>
                        <p class="card-text"><strong>Author:</strong> <?php echo $book['book_author']; ?></p>
                        <p class="card-text"><strong>Price:</strong> $<?php echo $book['book_price']; ?></p>
                        <a href="pages/details.php?id=<?php echo $book['id']; ?>" class="btn btn-primary">Details</a>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</div>