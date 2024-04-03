<?php
require_once('../app/initialize.php');
$pageTitle = "Book Store";
include(SHARED_PATH . '/header.php');

$bookInstance = new App\models\classes\Book\Book();

$books = $bookInstance->findAllBooks();

$categories = $bookInstance->findAllCategories();

?>

<!-- Jumbotron (Hero Section) -->
<div class="jumbotron text-center bg-primary text-white">
    <h1 class="display-4">Immerse Yourself in the World of Books</h1>
    <p class="lead">Discover the magic of literature with our curated collection.</p>
    <a class="btn btn-light btn-lg" href="#" role="button">Explore Books</a>
</div>

<?php cartMessage() ?>

<div class="container mt-4">
    <form class="form-inline my-2 my-lg-0" action="../app/view/bookSearch.php" method="GET">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" required>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>

<!-- Main Content Section -->
<div class="container mt-4">
    <div class="row">
        <!-- Sidebar with Book Categories -->
        <div class="col-md-3">
            <div class="card bg-info">
                <div class="card-body">
                    <h5 class="card-title">Book Categories</h5>
                    <ul class="list-group">
                        <?php foreach ($categories as $category) : ?>
                            <li class="list-group-item bg-info text"><a class="text-white" href="pages/categoryList.php?category_id=<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Featured Books Section -->
        <div class="col-md-9">
            <div class="row">
                <?php foreach ($books as $book) : ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="../../public/image/<?php echo $book['book_image']; ?>" class="card__image card-img-top" alt="<?php echo $book['book_title']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $book['book_title']; ?></h5>
                                <p class="card-text"><strong>Author:</strong> <?php echo $book['book_author']; ?></p>
                                <p class="card-text"><strong>Price:</strong> $<?php echo $book['book_price']; ?></p>
                                <a href="pages/details.php?id=<?php echo $book['id']; ?>" class="btn btn-primary">Details</a>

                                <?php if(isset($_SESSION['username'])) { ?>
                                    <a href="pages/cartItems.php?id=<?php echo $book['id']; ?>" class="btn btn-success ml-1">
                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                    </a>
                                <?php  } ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php include(SHARED_PATH . '/footer.php'); ?>



