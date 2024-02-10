<?php 
require_once('../initialize.php');
include(SHARED_PATH . '/admin_header.php');

$books = find_all_books();
?>

<div class="container mt-5">
        <div class="mb-3">
            <a href="admin_create.php" class="btn btn-success">Add New Book</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Author</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Quantity</th>                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <!-- Your table rows go here -->
                <?php while($book = mysqli_fetch_assoc($books)) { ?>
                <tr>
                    <td><?php echo $book['id']; ?></td>
                    <td><?php echo $book['book_title']; ?></td>
                    <td><?php echo $book['book_price']; ?></td>
                    <td><?php echo $book['book_author']; ?></td>
                    <td><img src="<?php $book['book_image']; ?>" style="max-width: 50px;"></td>
                    <td><?php echo $book['book_descr']; ?></td>
                    <td><?php echo $book['book_quantity']; ?></td>
                    <td><a href="#" class="btn btn-warning">Update</a></td>
                    <td><a href="#" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php } ?>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>

<?php 

include(SHARED_PATH . '/footer.php');