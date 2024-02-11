<?php 
require_once('../initialize.php');
include(SHARED_PATH . '/admin_header.php');

if (!isset($_GET['id'])) {
    header('Location: admin_homepage.php');
    exit();
} else {
    $id = $_GET['id'];
}

$book = find_by_id($id);

if (!$book) {
    header('Location: admin_homepage.php');
    exit();
}

if (isset($_POST['submit'])) {
    // Handle form submission

    $edited_book = [
        'id' => $id,
        'book_title' => $_POST['title'] ?? '',
        'book_price' => $_POST['price'] ?? '',
        'book_author' => $_POST['author'] ?? '',
        'book_image' => $_POST['image'] ?? '',
        'book_descr' => $_POST['description'] ?? '',
        'book_quantity' => $_POST['quantity'] ?? '',
    ];

    $result = edit_book($edited_book);

    if ($result) {
        header('Location: admin_homepage.php');
        exit();
    } else {
        echo '<script>alert("Error editing the book.");</script>';
    }
}

?>


<div class="container mt-5">
        <h2>Edit Book</h2>
        <form action="admin_edit.php" method="POST" enctype="multipart/form-data">
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

                <input type="file" class="form-control" id="uploadImage" name="image" accept="image/*"  value = "" >
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3"><?= $book['book_descr']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="<?= $book['book_quantity']; ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Edit Book</button>
        </form>
    </div>