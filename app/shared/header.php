<?php session_start();
$bookInstance = new App\models\classes\Book\Book();

$books = $bookInstance->findAllBooks();

$categories = $bookInstance->findAllCategories();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $pageTitle ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="\public\style\style.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <a class="navbar-brand" href="#">
        <img class="navbar__logo" src="../../public/image/logo1.png" alt="">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <!-- Welcome Message -->
        <?php if (isset($_SESSION['username'])) { ?>
            <div class="alert alert-success text-center mx-auto mb-0" role="alert">
                Hello, <?php echo $_SESSION['username']; ?>! Welcome to BookStore.
            </div>
        <?php } ?>
        <!-- End Welcome Message -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../../public/index.php">Home</a>
            </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php foreach ($categories as $category) : ?>
                    <a class="dropdown-item" href="../../public/pages/categoryList.php?category_id=<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></a>
                <?php endforeach; ?>
            </div>
        </li>

        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../../public/pages/cartItems.php">
                    <i class="fas fa-shopping-cart"></i> Cart
                </a>
            </li>
            <?php if (!isset($_SESSION['username'])) { ?>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary text-white mr-2" href="../../public/pages/login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-success text-white" href="../../public/pages/registration.php">Register</a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="../../app/controllers/userControllers/logOutController.php">Logout</a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>

</body>

</html>
