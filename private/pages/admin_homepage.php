<?php 
require_once('../initialize.php');
include(SHARED_PATH . '/admin_header.php');

$books = find_all_books();

?>

<div class="container mt-5">
        <div class="mb-3">
            <a href="admin_create.php" class="btn btn-success">Add New Book</a>
        </div>
        <form class="form-inline" action="admin_search.php" method="POST">
            <input style="width: 150px;" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Author</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php while($book = mysqli_fetch_assoc($books)) { ?>
                <tr>
                    <td><?php echo $book['id']; ?></td>
                    <td><?php echo $book['book_title']; ?></td>
                    <td><?php echo $book['book_price']; ?></td>
                    <td><?php echo $book['book_author']; ?></td>
                    <td><img src="../../public/image/<?php echo $book['book_image']; ?>" alt="Uploaded Image" style="width: 150px;"/></td>
                    <td><?php echo $book['book_descr']; ?></td>
                    <td><?php echo $book['book_quantity']; ?></td>
                    <td><a href="admin_edit.php?id=<?php echo $book['id']; ?>" class="btn btn-warning">Update</a></td>
                    <td><a href="admin_delete.php?id=<?php echo $book['id']?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<?php 

include(SHARED_PATH . '/footer.php');