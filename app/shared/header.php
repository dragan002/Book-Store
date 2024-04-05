<?php
session_start();
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
    <link rel="stylesheet" href="..\..\public\design\style\style.css">
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
        <ul class="navbar-nav mr-auto">
            <!-- Home link -->
            <li class="nav-item active">
                <a class="nav-link" href="../../public/index.php">Home</a>
            </li>
        </ul>

        <!-- Search form -->
        <form class="form-inline my-2 my-lg-0 mx-auto">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" required>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        <ul class="navbar-nav ml-auto">
            <!-- Cart link -->
            <?php if(isset($_SESSION['username'])) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="../../public/pages/cartItems.php">
                        <i class="fas fa-shopping-cart"></i> Cart
                    </a>
                </li>
            <?php } ?>
            
            <!-- Login/Register or Logout links -->
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
            
            <!-- Welcome Message -->
            <?php if (isset($_SESSION['username'])) { ?>
                <li class="nav-item">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="rounded-circle bg-success d-flex justify-content-center align-items-center" style="width: 40px; height: 40px; overflow: hidden;">
                            <i class="fa-regular fa-user"></i>
                        </div>
                    </div>
                </li>
            <?php } ?>

            <!-- End Welcome Message -->
        </ul>
    </div>
</nav>

</body>

</html>
