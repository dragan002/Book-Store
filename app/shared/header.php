<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $pageTitle ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<<<<<<< Updated upstream
    <link rel="stylesheet" href="\public\resource\scss\style.css">
=======
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="/public/design/js/javascript.js"></script>

    <link rel="stylesheet" href="\public\design\style\style.css">
>>>>>>> Stashed changes
</head>

<body>

<nav class="header">
    <div class="header__container">        
       

<<<<<<< Updated upstream
        <?php if(isset($_SESSION['username'])) { ?>
    <div class="alert alert-success text-center" role="alert">
        Hello, <?php echo $_SESSION['username']; ?>! Welcome to BookStore.
    </div>
    <?php } ?> 

        <div class="background-secondary" id="navbarNav">
            <ul class="grid h6">
                <a class="navbar-brand col-span-2" href="#">Your Logo</a>

                <li class="background-secondary col-span-2">
                    <a class="" href="../../public/index.php"></a>
=======
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


        </ul>
        <ul class="navbar-nav">
            <?php if(isset($_SESSION['username'])) { ?>
            <li class="nav-item">
                <a class="nav-link" href="../../public/pages/cartItems.php">
                    <i class="fas fa-shopping-cart"></i> Cart
                </a>
            </li>
            <?php } ?>
            <?php if (!isset($_SESSION['username'])) { ?>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary text-white mr-2" href="../../public/pages/login.php">Login</a>
>>>>>>> Stashed changes
                </li>

                <li class="nav-item col-span-1">
                    <a class="nav-link" href="../../public/pages/about.php">About Us</a>
                </li>

                <li class="nav-item col-span-1">
                    <a class="nav-link" href="../../public/pages/services.php">Services</a>
                </li>

                <li class="nav-item col-span-1">
                    <a class="nav-link" href="../../public/pages/contact.php">Contact</a>
                </li>

                <li class="c-button col-span-1">
                    <a class="nav-link" href="../../public/pages/cartItems.php">
                        <i class="fas fa-shopping-cart"></i> Cart
                    </a>
                </li>

                <!-- Login and Register Buttons -->  
                <?php if(!isset($_SESSION['username'])) { ?>               
                    <li class="c-button col-span-1">
                        <a class="nav-link btn btn-outline-primary" href="../../public/pages/login.php">Login</a>
                    </li>
                <?php } ?>

                <?php if(!isset($_SESSION['username'])) { ?>               
                    <li class="nav-item">
                        <a class="nav-link btn btn-success" href="../../public/pages/registration.php">Register</a>
                    </li>
                <?php } ?>
                
                <?php if(isset($_SESSION['username'])) { ?>
                    <li class="nav-item col-span-1">
                        <a class="nav-link" href="../../app/controllers/userControllers/logOutController.php">Logout</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>


<!-- The rest of your HTML content goes here -->
