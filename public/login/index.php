<?php
require_once('../../private/initialize.php');
include(SHARED_PATH . '/login_header.php');
include(PUBLIC_PATH . '/login/login.php');

// add();
$errors = [];

if (is_post_request()) {
    try {
        $logger_data = get_logger_from_form();
        
        if (!$logger_data) {
            $errors[] = "Form submission error: No data received";
        } else {
            $email = $logger_data['email'];
            $password = $logger_data['password'];
        
            $match = login($email, $password);
        
            if (!$match) {
                $errors[] = "Login failed: Invalid email or password";
            } else {
                header('Location: ../../private/pages/admin_homepage.php');
                exit();
            }
        }
    } catch (Exception $e) {
        $errors[] = $e->getMessage();
    }
}
?>



<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <?php foreach($errors as $error) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endforeach; ?>

            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Login</h3>
                </div>
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
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