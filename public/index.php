<?php 
require_once('../app/initialize.php');
include(SHARED_PATH . '/header.php');

$books = find_all_books();

?>


<!-- Jumbotron (Hero Section) -->
<div class="jumbotron text-center bg-primary text-white">
    <h1 class="display-4">Immerse Yourself in the World of Books</h1>
    <p class="lead">Discover the magic of literature with our curated collection.</p>
    <a class="btn btn-light btn-lg" href="#" role="button">Explore Books</a>
</div>

<!-- Search Input -->
<div class="container mt-4">
    <form class="form-inline my-2 my-lg-0" action="pages/search.php" method="GET">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" required>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>
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

<?php
include(SHARED_PATH . '/footer.php');
?>
