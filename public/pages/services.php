<?php 
require_once('../../app/initialize.php');
$pageTitle = "Services";
include(SHARED_PATH . '/header.php');
?>


<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Our Services</h1>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Book Sales</h5>
                        <p class="card-text">Explore and purchase books from our vast collection, spanning various genres and topics.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Book Recommendations</h5>
                        <p class="card-text">Get personalized book recommendations based on your preferences and reading history.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Events and Workshops</h5>
                        <p class="card-text">Participate in book-related events, workshops, and discussions hosted by our team and special guests.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Book Club</h5>
                        <p class="card-text">Join our book club to connect with other readers, share insights, and engage in lively discussions.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gift Cards</h5>
                        <p class="card-text">Surprise your loved ones with the gift of reading by giving them our bookstore gift cards.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Author Signings</h5>
                        <p class="card-text">Meet your favorite authors and get your books signed at our exclusive author signing events.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include(SHARED_PATH . '/footer.php');
?>
