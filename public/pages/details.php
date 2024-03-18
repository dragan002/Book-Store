<?php 
require_once('../../app/initialize.php');
include(SHARED_PATH . '/header.php');

$id = $_GET['id'];
$bookInstance = new Book\Book();
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
                        <p class="card-text"><?= $book['book_descr']; ?></p>
                    </div>

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

