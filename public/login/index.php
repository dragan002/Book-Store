<?php
require_once('../../private/initialize.php');
include(SHARED_PATH . '/login_header.php');
include(PUBLIC_PATH . '/login/login.php');

$logger = get_logger_from_form();

if ($logger) {
    
    
    
    
    // Example Usage
    $id = 1;
    $admin = find_admin_by_id($id);
    
    var_dump($admin);
    
    



    // $login_result = authenticate_user($logger, $admini);

    // if ($login_result) {
    //     header("Location: " . WWW_ROOT . "/../private/pages/admin_homepage.php");
    //     exit(); 
    // } else {
    //     echo $login_error = "That username and password combination did not work. <br>";
    // }
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