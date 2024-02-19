<?php 
require_once('../../app/initialize.php');
include(SHARED_PATH . '/header.php');

if(is_get_request()) {
    $search = $_GET['search'];
}

$books = find_all_books();

$searched_results = search_books($search);



?>

<!-- Featured Books Section -->
<div class="container mt-4">
    <h2 class="text-center mb-4">Featured Books</h2>
    <div class="row">

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
                        </tr>
                <?php
                    }
                } else {
                    echo '<tr><td colspan="7">No results found</td></tr>';
                }
                ?>
            </tbody>
        </table>

    </div>
</div>