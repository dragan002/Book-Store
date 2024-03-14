<?php 
    require_once('../initialize.php');
    include(SHARED_PATH . '/admin_header.php');

    if(!isset($_GET['id'])) {
        echo "debugging";
        exit();
      }
      $id = $_GET['id'];

    $book = $bookInstance->findBookById($id);
    
    $image = $book['book_image']; 
    
    if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
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
            'category_id' => $_POST['category']
        ];

        $result = $bookInstance->editBook($book);

        if (!$result) {
            echo '<script>alert("Error editing the book.");</script>';
        } 
        header( "Location: admin_homepage.php");
    }


    $categories = $bookInstance->findAllCategories();
    $category = $bookInstance->findCategoryById($book['category_id']);
    $category_name = $category ? $category['category_name'] : 'N/A';
    
    ?>
