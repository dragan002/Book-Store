<?php 
require_once('../../app/initialize.php');
$pageTitle = "Contact Us";
include(SHARED_PATH . '/header.php');
?>

<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Contact Us</h1>

        <div class="row">
            <div class="col-md-6">
                <h2>Our Location</h2>
                <p>123 Bookstore Street<br>Cityville, State 12345<br>Country</p>
                <p>Email: info@example.com<br>Phone: +1 (555) 123-4567</p>
            </div>
            <div class="col-md-6">
                <h2>Contact Form</h2>
                <form action="submit_form.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Your Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Your Message:</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
<?php
    include(SHARED_PATH . '/footer.php');
?>

