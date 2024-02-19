    <?php 
    require_once('../initialize.php');
    include(SHARED_PATH . '/admin_header.php');

    if(!isset($_GET['id'])) {
        echo "debugging";
        exit();
      }
      $id = $_GET['id'];

    $book = find_by_id($id);


    
    if(isset($_FILES['image'])&& $_FILES['image']['name'] != ""){
        $image = $_FILES['image']['name'];
        $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
        $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "../../public/image/";
        $uploadDirectory .= $image;
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
    }

    if (isset($_POST['edit'])) {
        $book = [
            'id' => $id,
            'book_title' => trim($_POST['title']),
            'book_price' => floatval(trim($_POST['price'])),
            'book_author' => trim($_POST['author']),
            'book_image' => $image,
            'book_descr' => trim($_POST['description']),
            'book_quantity' => intval(trim($_POST['quantity'])),
        ];

        $result = edit_book($book);

        if ($result) {
            header( "Location: admin_homepage.php");
            } else {
            echo '<script>alert("Error editing the book.");</script>';
        }
    }
    
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
                <!-- <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="3">
                        <?php
                            $category = find_category_by_id($book['category_id']);
                            $category_name = $category ? $category['category_name'] : 'N/A';
                            echo $category_name;
                        ?>
                    </textarea>
                </div> -->
                <div class="mb-3">
                    <label for="category" class="form-label">Category:</label><br />
                    <select id="category" name="category">
                      <option value="<?php echo $book['category_id']; ?>"><?php echo $category_name; ?></option>
                        <option value="">Select a category...</option>
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
        
