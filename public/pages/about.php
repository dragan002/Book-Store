<?php 
require_once('../../app/initialize.php');
$pageTitle = "About";

include(SHARED_PATH . '/header.php');
?>

    <div class="container mt-5">
        <h1 class="text-center mb-4">About Our Book Store</h1>

        <div class="row">
            <div class="col-md-6">
                <h2>Our Story</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam sed commodo nibh ante facilisis bibendum.</p>
                <p>Curabitur et odio ullamcorper, aliquet sapien ac, porttitor velit. Ut non enim ut est scelerisque sollicitudin ut sed justo.</p>
            </div>
            <div class="col-md-6">
                <img src="https://via.placeholder.com/400" alt="Bookstore Image" class="img-fluid">
            </div>
        </div>

        <h2 class="mt-4">Our Team</h2>

        <div class="row mt-3">
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/150" alt="Team Member" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">John Doe</h5>
                        <p class="card-text">Founder</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/150" alt="Team Member" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Jane Smith</h5>
                        <p class="card-text">Marketing Manager</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/150" alt="Team Member" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Bob Johnson</h5>
                        <p class="card-text">Customer Support</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include(SHARED_PATH . '/footer.php');
?>