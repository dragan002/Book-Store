<?php
    include('../controllers/userControllers/userSearchController.php');
?>

<div class="container mt-5">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <?php if(is_post_request()) : ?>
                        <th>Update</th>
                        <th>Delete</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
            <?php 
                if (!empty($searchResults)) {
                    foreach($searchResults as $searched) : 
            ?>
                    <tr>
                        <td><?php echo $searched['id']; ?></td>
                        <td><?php echo $searched['username']; ?></td>
                        <td><?php echo $searched['email']; ?></td>
                        <td><?php echo $searched['role']; ?></td>
                        <?php if(is_post_request()) : ?>
                            <td><a href="userEdit.php?id=<?php echo $searched['id']; ?>" class="btn btn-warning">Update</a></td>
                            <td><a href="../controllers/userControllers/userDeleteController.php?id=<?php echo $searched['id']?>" class="btn btn-danger">Delete</a></td>
                        <?php endif;?>
                    </tr>
                <?php endforeach; } ?>
            </tbody>
        </table>
    </div>

<?php 

include(SHARED_PATH . '/footer.php');