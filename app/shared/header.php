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
    <link rel="stylesheet" href="\public\resource\scss\style.css">
</head>

<body>

<nav class="header">
    <div class="header__container">        
       
    <!-- 
        <?php if(isset($_SESSION['username'])) { ?>
    <div class="alert alert-success text-center" role="alert">
        Hello, <?php echo $_SESSION['username']; ?>! Welcome to BookStore.
    </div>
    <?php } ?> -->

        <div class="wrapper background-secondary" id="navbarNav">
            <ul class="grid h6">
                <a class="navbar-brand col-span-1" href="#">Your Logo</a>

                <li class="background-secondary col-span-2">
                    <a class="" href="../../public/index.php">Home</a>
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
