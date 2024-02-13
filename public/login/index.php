<?php
    require_once('../../private/initialize.php');
    include(SHARED_PATH . '/login_header.php');
    include(PUBLIC_PATH . '/login/login.php');

    $logger = get_logger_from_post();
    
    if($logger) {
        $admini = find_admin();
        authenticate_user($logger, $admini);
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
                    <form action="index.php" method="post">
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