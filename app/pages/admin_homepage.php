<?php 
require_once('../initialize.php');
include(SHARED_PATH . '/admin_header.php');

$books = find_all_books();

?>

<div class="container mt-5">
        <div class="mb-3">
            <a href="bookCreate.php" class="btn btn-success">Add New Book</a>
        </div>
        <form class="form-inline" action="bookSearch.php" method="POST">
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
                    <th>Category</th>
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

                    <?php
                    $category = find_category_by_id($book['category_id']);
                    $category_name = $category ? $category['category_name'] : 'N/A';
                    ?>
                    
                    <td><?php echo $category_name; ?></td>
                    <td><?php echo $book['book_descr']; ?></td>
                    <td><?php echo $book['book_quantity']; ?></td>
                    <td><a href="bookEdit.php?id=<?php echo $book['id']; ?>" class="btn btn-warning">Update</a></td>
                    <td><a href="bookDelete.php?id=<?php echo $book['id']?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<?php 

include(SHARED_PATH . '/footer.php');