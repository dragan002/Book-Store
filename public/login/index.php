<?php
    require_once('../../private/initialize.php');
    include(SHARED_PATH . '/login_header.php');
    include(PUBLIC_PATH . '/login/login.php');

    if (is_post_request()) {
        if (isset($_POST['login'])) {
            $logger = [
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ];
        }
    }
    
    $admini = find_admin();
    $loginSuccessful = false;
    
    foreach ($admini as $admin) {
        if ($admin['password'] == $logger['password'] && $admin['email'] == $logger['email']) {
            $loginSuccessful = true;
            break;
        }
    }
    
    if ($loginSuccessful) {
        echo "unutra si";
    } else {
        echo "greska";
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