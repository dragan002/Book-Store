<?php 
    require_once('../initialize.php');
    include(SHARED_PATH . '/admin_header.php');

    $bookInstance = new App\models\classes\Book\Book();
    
    if(!isset($_GET['id'])) {
        echo "debugging";
        exit();
      }
      $id = $_GET['id'];

    $book = $bookInstance->findBookById($id);
    
    $image = $book['book_image'];

    // -> dodaj ga u temp
    // preimenuj -> .exe -> .jpg, .jpeg, .png. .gif
 // Pomeri ga u moj folder
    
    if(isset($_FILES['image']) && $_FILES['image']['name'] !== ""){
        $image = $_FILES['image']['name'];

        // C:\Users\PC\AppData\Local\Temp -> xampp://book-store/controllers/bookController/../../public/image/mojaSlika.jpg
        $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
        $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "../../public/image/";
        // time()."jpg -> pathinfo($image, PATHINFO_EXTENSION);
        $uploadDirectory .= $image;
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
    }

    // slika.jpg

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
