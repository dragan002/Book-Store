<?php
require_once('../../private/initialize.php');
include(SHARED_PATH . '/login_header.php');
include(PUBLIC_PATH . '/login/login.php');

// add();
$logger_data = get_logger_from_form();

if (!$logger_data) {
    echo "Error: Please provide both email and password";
} else {
    $email =  $logger_data['email'];
    $password = $logger_data['password'];

    $match = login($email, $password);

    if (!$match) {
        echo "Error: Incorrect email or password";
    } else {
        echo "You are in";
    }
}

?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Login</h3>
                </div>
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" name="login" >Login</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php 
include(SHARED_PATH . '/login_footer.php');
?>