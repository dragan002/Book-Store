<?php
    include('../controllers/bookSearchController.php');
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
                if (!empty($search_results)) {
                    foreach($search_results as $searched) : 
            ?>
                    <tr>
                        <td><?php echo $searched['id']; ?></td>
                        <td><?php echo $searched['book_title']; ?></td>
                        <td><?php echo $searched['book_price']; ?></td>
                        <td><?php echo $searched['book_author']; ?></td>
                        <td><img src="../../public/image/<?php echo $searched['book_image']; ?>" alt="Uploaded Image" style="width: 150px;"/></td>
                        <td><?php echo $searched['book_descr']; ?></td>
                        <td><?php echo $searched['book_quantity']; ?></td>
                        <td><a href="bookEdit.php?id=<?php echo $searched['id']; ?>" class="btn btn-warning">Update</a></td>
                        <td><a href="../controllers/bookDeleteController.php?id=<?php echo $searched['id']?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                <?php endforeach; } ?>
            </tbody>
        </table>
    </div>

<?php 

include(SHARED_PATH . '/footer.php');