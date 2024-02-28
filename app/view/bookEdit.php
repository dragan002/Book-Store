<?php
    include('../controllers/bookControllers/bookEditController.php');
?>

    <div class="container mt-5">
            <h2>Edit Book</h2>
            <form action="bookEdit.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $book['book_title']; ?>">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="text" class="form-control" id="price" name="price" value="<?php echo $book['book_price']; ?>">
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author:</label>
                    <input type="text" class="form-control" id="author" name="author" value=" <?= $book['book_author']; ?> ">
                </div>
                <div class="mb-3">
                    <label for="uploadImage" class="form-label">Current Image:</label>
                    <img src="../../public/image/<?php echo $book['book_image']; ?>" alt="Existing Image" style="max-width: 120px;">
                    <input type="file" class="form-control" id="uploadImage" name="image" accept="image/*">
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category:</label><br />
                        <select id="category" name="category">
                            <?php foreach($categories as $category) :  ?>
                                <option value="<?php echo $category['id']; ?>" <?php echo ($category['id'] == $book['category_id']) ? 'selected' : ''; ?>>
                                    <?php echo $category['category_name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="3"><?= $book['book_descr']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="<?= $book['book_quantity']; ?>">
                </div>
                <button type="submit" name="edit" class="btn btn-primary">Edit Book</button>
            </form>
        </div>
        
