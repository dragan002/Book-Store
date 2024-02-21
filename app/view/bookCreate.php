<?php
    include('../controllers/bookCreateController.php');
?>
<div class="container mt-5">
        <h2>Create New Book</h2>
        <form action="bookCreate.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author:</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>
            <div class="mb-3">
                <label for="uploadImage" class="form-label">Upload Image:</label>
                <input type="file" class="form-control" id="uploadImage" name="image" accept="image/*" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
            <label for="category" class="form-label">Category:</label><br />
                <select id="category" name="category">
                    <?php foreach($categories as $category) : ?>
                        <option value="<?php echo $category['id']; ?>">
                            <?php echo $category['category_name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Create Book</button>
        </form>
    </div>