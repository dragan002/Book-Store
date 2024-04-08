<?php 
require_once('../../app/initialize.php');
// require_once "../../vendor/autoload.php";

include(SHARED_PATH . '/header.php');

$id = $_GET['id'];
// $bookInstance = new App/Book();
$bookInstance = new App\models\classes\Book\Book();

$book = $bookInstance->findBookById($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
    <div class="card bg-light">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="../../public/image/<?php echo $book['book_image']; ?>" alt="Book Image" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title text-primary"><?php echo $book['book_title']; ?></h2>
                    <p class="card-text"><strong class="text-success">Author:</strong> <?php echo $book['book_author']; ?></p>
                    <p class="card-text"><strong class="text-danger">Price:</strong> $<?php echo $book['book_price']; ?></p>
                    <p class="card-text"><strong class="text-info">Quantity:</strong> <?php echo $book['book_quantity']; ?></p>

                    <div class="mb-3">
                        <label for="description" class="form-label"><strong class="text-warning">Description:</strong></label>
                        <p class="card-text"><?= $book['book_description']; ?></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h1 class="text-center mb-4">Reader Views, Impressions, and Impressions</h1>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Book Title</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum lectus eget lacus elementum placerat.</p>
                    <p class="card-text">Author: John Doe</p>
                    <hr>
                    <!-- Reader views, impressions, and comments -->
                    <div class="reader-comments">
                        <div class="media mb-3">
                            <img src="..." class="mr-3 rounded-circle" alt="...">
                            <div class="media-body">
                                <h5 class="mt-0">Reader Name</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum lectus eget lacus elementum placerat.</p>
                            </div>
                        </div>
                        <!-- Add more comments here -->
                    </div>
                    <!-- End of reader views, impressions, and comments -->
                    <hr>
                    <!-- Comment form -->
                    <form>
                        <div class="form-group">
                            <label for="readerName">Your Name</label>
                            <input type="text" class="form-control" id="readerName" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label for="readerComment">Your Comment</label>
                            <textarea class="form-control" id="readerComment" rows="3" placeholder="Enter your comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <!-- End of comment form -->
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php 
include(SHARED_PATH . '/footer.php');
?>

