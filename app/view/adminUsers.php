<?php 
require_once('../initialize.php');
include(SHARED_PATH . '/admin_header.php');

$users = find_all_users();
echo $_SESSION['username'];

?>

<div class="container mt-5">
        <div class="mb-3">
        <div class="alert alert-success" role="alert">
            Hello, <?php echo $_SESSION['username']; ?>! Welcome to the Admin Panel.
        </div>
            <a href="bookCreate.php" class="btn btn-success">Add New User</a>
        </div>
        <form class="form-inline" action="bookSearch.php" method="POST">
            <input style="width: 150px;" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user) : ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['role']; ?></td>
                    <td><a href="bookEdit.php?id=<?php echo $book['id']; ?>" class="btn btn-warning">Update</a></td>
                    <td><a href="../controllers/bookDeleteController.php?id=<?php echo $book['id']?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php 

include(SHARED_PATH . '/footer.php');