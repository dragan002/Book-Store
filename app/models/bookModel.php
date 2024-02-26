<?php
function find_all_books() {
    global $db;

    try {
        $sql = "SELECT * FROM books";
        $stmt = $db->prepare($sql);
        $stmt->execute();
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        confirmResultSet($result);

        return $result;
    } catch (PDOException $e) {
        die("Error in query: " . $sql . " - " . $e->getMessage());
    }
}

function find_all_categories() {
    global $db;

    try {
        $sql = "SELECT * FROM categories";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        confirmResultSet($result);
        
        return $result;
    } catch(PDOException $e) {
        die("ERROR: Could not execute $sql. " . $e->getMessage());  
    }
}

function create_book($book) {
    global $db;

    try {
        $sql = "INSERT INTO books (book_title, book_price, book_author, book_image, book_descr, book_quantity, category_id) ";
        $sql .= "VALUES (:book_title, :book_price, :book_author, :book_image, :book_descr, :book_quantity, :category_id)";

        $stmt = $db->prepare($sql);
        
        $stmt->bindParam(':book_title', $book['book_title'], PDO::PARAM_STR);
        $stmt->bindParam(':book_price', $book['book_price'], PDO::PARAM_STR);
        $stmt->bindParam(':book_author', $book['book_author'], PDO::PARAM_STR);
        $stmt->bindParam(':book_image', $book['book_image'], PDO::PARAM_STR);
        $stmt->bindParam(':book_descr', $book['book_descr'], PDO::PARAM_STR);
        $stmt->bindParam(':book_quantity', $book['book_quantity'], PDO::PARAM_INT);
        $stmt->bindParam(':category_id', $book['category_id'], PDO::PARAM_INT);

        $result = $stmt->execute();

        if (!$result) {
            die("Failed to insert data into the database: " . $stmt->errorInfo()[2]);
        }

        return true;
    } catch (PDOException $e) {
        die("Failed to insert data into the database: " . $e->getMessage());
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
function find_book_by_category($id) {
    global $db;

    try {
        $sql = "SELECT * FROM books WHERE category_id = :category_id";
    
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':category_id', $id, PDO::PARAM_INT);
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }  catch (PDOException $e) {
        die("Failed to retrieve data from database: " . $e->getMessage());
    }
}
function find_category_by_id($id) {
    global $db;

    try {
        $sql = "SELECT * FROM categories WHERE id =  :id LIMIT 1";
        $stmt = $db->prepare($sql);
        $stmt->bindParam('id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $result =  $stmt->fetch(PDO::FETCH_ASSOC);

        confirmResultSet($result);

        return $result;
    } catch (PDOException $e) {
        die("Error: " + $e->getMessage());
    }
}

function edit_book($book) {
        global $db;
        try {
            $sql = "UPDATE books SET 
                        book_title = :book_title,
                        book_price = :book_price,
                        book_author = :book_author,
                        book_image = :book_image,
                        book_descr = :book_descr,
                        book_quantity = :book_quantity,
                        category_id = :category_id
                    WHERE id = :id"; 
    
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':book_title', $book['book_title'], PDO::PARAM_STR);
            $stmt->bindParam(':book_price', $book['book_price'], PDO::PARAM_STR);
            $stmt->bindParam(':book_author', $book['book_author'], PDO::PARAM_STR);
            $stmt->bindParam(':book_image', $book['book_image'], PDO::PARAM_STR);
            $stmt->bindParam(':book_descr', $book['book_descr'], PDO::PARAM_STR);
            $stmt->bindParam(':book_quantity', $book['book_quantity'], PDO::PARAM_INT);
            $stmt->bindParam(':category_id', $book['category_id'], PDO::PARAM_INT);
            $stmt->bindParam(':id', $book['id'], PDO::PARAM_INT); 
    
            $result = $stmt->execute();
            confirmResultSet($result);
    
            $stmt = null;
    
            return true;
        }  catch (PDOException $e) {
            die("ERROR: Could not execute $sql. " . $e->getMessage());
        }
}
    
function delete_book($book) {
    global $db;
    try {
        $sql = "DELETE FROM books WHERE id =  :id LIMIT 1";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $book['id']);
    
        $result = $stmt->execute();
        
        $stmt = null;
    
        return true;
    }  catch (PDOException $e) {
        die("ERROR: Could not execute $sql. " . $e->getMessage());
    }
}

function search_books($search) {
    global $db;

    try {
        $sql = "SELECT * FROM books WHERE id = :id OR book_title LIKE :title OR book_author LIKE :author";
        $stmt = $db->prepare($sql);

        $searchTerm = "%" . $search . "%";

        $stmt->bindParam(':id', $search, PDO::PARAM_INT);
        $stmt->bindParam(':title', $searchTerm, PDO::PARAM_STR);
        $stmt->bindParam(':author', $searchTerm, PDO::PARAM_STR);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    } catch (PDOException $e) {
        die("Database query failed: " . $e->getMessage());
    }
}


