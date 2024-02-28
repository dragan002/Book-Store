<?php
include('../../app/controllers/userControllers/loginController.php');

if(isset($_GET['registration'])) {
    $registrationSuccess = $_GET['registration'];
}

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

        <?php if (isset($registrationSuccess)) : ?>
                <div class="alert alert-success" role="alert">
                    Registration successful! You can now log in.
                </div>
            <?php endif; ?>

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
                    <form action="#" method="POST">
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