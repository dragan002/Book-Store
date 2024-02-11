<?php 
require_once('../initialize.php');
include(SHARED_PATH . '/admin_header.php');

if(!isset($_GET['id'])) {
    header( 'Location: admin_homepage.php' );
}  else {
    $id = $_GET['id'];
}

// if(isset($_FILES['image'])&& $_FILES['image']['name'] != ""){
//     $image = $_FILES['image']['name'];
//     $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
//     $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "../../public/image/";
//     $uploadDirectory .= $image;
//     move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
// }

$book = [];
$book['id'] = $id;
$book['book_title'] = $_POST['title'] ?? '';
$book['book_price'] = $_POST['price'] ?? '';
$book['book_author'] = $_POST['author'] ?? '';
$book['book_image'] = $_POST['image'] ?? '';
$book['book_descr'] = $_POST['description'] ?? '';
$book['book_quantity'] = $_POST['quantity'] ?? '';

$result = edit_book($book);



    // if (!create_book($book)) {
    //     echo '<script>';
    //     echo 'alert("Error creating the book.");';
    //     echo '</script>';
    // } else {
    //     header( "Location: admin_homepage.php");
    // }

?>

<div class="container mt-5">
        <h2>Edit Book</h2>
        <form action="admin_edit.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $book['book_title']; ?>" required>
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
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Edit Book</button>
        </form>
    </div>