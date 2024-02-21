<?php
// function find_all_books() {
//     global $db;

//     $sql = "SELECT * FROM books";
//     $result = mysqli_query($db, $sql);
//     confirm_result_set($result);
//     return $result;
// }

function find_all_books() {
    global $db;

    try {
        $sql = "SELECT * FROM books";
        $stmt = $db->prepare($sql);
        $stmt->execute();
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        confirm_result_set($result);

        return $result;
    }  catch (PDOException $e) {
        die("Error in query:" . $e->getMessage());
    }
}


// function find_all_categories() {
//     global $db;

//     $sql = "SELECT * FROM categories";
//     $result = mysqli_query($db, $sql);
//     confirm_result_set($result);
//     return $result;
// }

function find_all_categories() {
    global $db;

    try {
        $sql = "SELECT * FROM categories";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        confirm_result_set($result);
        
        return $result;
    } catch(PDOException $e) {
        die("ERROR: Could not execute $sql. " . $e->getMessage());  
    }
}

function create_book($book) {
    global $db;

    $sql = "INSERT INTO books ";
    $sql .= "(book_title, book_price, book_author, book_image, book_descr, book_quantity, category_id) ";
    $sql .= "VALUES (?, ?, ?, ?, ?, ?, ?) ";

    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, 'sdssss', $book['book_title'], $book['book_price'], $book['book_author'], $book['book_image'], $book['book_descr'], $book['book_quantity'], $book['category_id']);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        echo mysqli_error($db);
        db_disconnect($db);
        exit();
    } else {
        mysqli_stmt_close($stmt);
        return true;
    }
}

function find_book_by_id($id) {
    global $db;

    try {
        $sql = "SELECT * FROM books WHERE id = :id LIMIT 1";
    
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }  catch (PDOException $e) {
        die("Failed to retrieve data from database: " . $e->getMessage());
    }
}



function find_category_by_id($id) {
    global $db;

    $sql = "SELECT * FROM categories WHERE id = ? LIMIT 1";

    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);

    $result_set = mysqli_stmt_get_result($stmt);
    confirm_result_set($result_set);

    $category = mysqli_fetch_assoc($result_set);

    mysqli_free_result($result_set);
    mysqli_stmt_close($stmt);

    return $category;
}

function edit_book($book) {
    global $db;

    $sql = "UPDATE books SET ";
    $sql .= "book_title = ?, ";
    $sql .= "book_price = ?, ";
    $sql .= "book_author = ?, ";
    $sql .= "book_image = ?, ";
    $sql .= "book_descr = ?, ";
    $sql .= "book_quantity = ?, ";
    $sql .= "category_id = ? ";
    $sql .= "WHERE id = ?"; 

    $stmt = mysqli_prepare($db, $sql);

    mysqli_stmt_bind_param($stmt, 'sdsdsssi', $book['book_title'], $book['book_price'], $book['book_author'], $book['book_image'], $book['book_descr'], $book['book_quantity'], $book['category_id'], $book['id']);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        echo mysqli_error($db);
        db_disconnect($db);
        exit();
    } else {
        mysqli_stmt_close($stmt);
        return true;
    }
}


function delete_book($book) {
    global $db;

    $sql = "DELETE FROM books WHERE id=" . $book['id'] . "  LIMIT 1";

    $result = mysqli_query($db, $sql);

    if(!$result) {
        echo "debugg";
        echo mysqli_error($db);
        db_disconnect($db);
        exit();
    } else {
        return true;
    }
}

function search_books($search) {
    global $db;

    $sql = "SELECT * FROM books WHERE id = ? OR book_title LIKE ? OR book_author LIKE ?";
    $stmt = mysqli_prepare($db, $sql);

    if ($stmt) {
        $searchTerm = "%" . $search . "%";

        mysqli_stmt_bind_param($stmt, 'iss', $search, $searchTerm, $searchTerm);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        mysqli_stmt_close($stmt);
        
        return $result;
    } else {
        die('Database query failed: ' . mysqli_error($db));
    }
}

