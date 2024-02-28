<?php
    include('../controllers/userControllers/userEditController.php');
?>

    <div class="container mt-5">
            <h2>Edit User</h2>
            <form action="userEdit.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Role</label>
                    <input type="text" class="form-control" id="role" name="role" value=" <?= $user['role']; ?> ">
                </div>
                <!-- <div class="mb-3">
                    <label for="category" class="form-label">Category:</label><br />
                        <select id="category" name="category">
                            <?php foreach($categories as $category) :  ?>
                                <option value="<?php echo $category['id']; ?>" <?php echo ($category['id'] == $book['category_id']) ? 'selected' : ''; ?>>
                                    <?php echo $category['category_name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                </div> -->
                <button type="submit" name="edit" class="btn btn-primary">Edit User</button>
            </form>
        </div>
        
