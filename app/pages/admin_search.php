<?php 
require_once('../../app/initialize.php');
include(SHARED_PATH . '/header.php');

if(is_post_request()) {
    $search = $_POST['search'];
}

$books = find_all_books();

$search_results = search_books($search);

?>

<div class="container mt-5">

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
                <?php 
                            if (mysqli_num_rows($search_results) > 0) {
                    while ($searched = mysqli_fetch_assoc($search_results)) {
                ?>
                        <tr>
                            <td><?php echo $searched['id']; ?></td>
                            <td><?php echo $searched['book_title']; ?></td>
                            <td><?php echo $searched['book_price']; ?></td>
                            <td><?php echo $searched['book_author']; ?></td>
                            <td><img src="../../public/image/<?php echo $searched['book_image']; ?>" alt="Uploaded Image" style="width: 150px;"/></td>
                            <td><?php echo $searched['book_descr']; ?></td>
                            <td><?php echo $searched['book_quantity']; ?></td>
                    <td><a href="admin_edit.php?id=<?php echo $searched['id']; ?>" class="btn btn-warning">Update</a></td>
                    <td><a href="admin_delete.php?id=<?php echo $searched['id']?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php } } ?>
            </tbody>
        </table>
    </div>

<?php 

include(SHARED_PATH . '/footer.php');