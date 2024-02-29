<?php

function find_all_users() {
    global $db;

    try {
        $sql = "SELECT * FROM users";
        $stmt = $db->prepare($sql);
        $stmt->execute();
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        confirmResultSet($result);

        return $result;
    } catch (PDOException $e) {
        die("Error in query: " . $sql . " - " . $e->getMessage());
    }
}

function login($email, $password) {
    global $db;

    try {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(1, $email, PDO::PARAM_STR);

        $stmt->execute();

        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user_data) {
            throw new Exception('Login failed. Email not found.');
        }

        if (!password_verify($password, $user_data['password'])) {
            throw new Exception('Login failed. Invalid password.');
        }
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $user_data['id'];
        $_SESSION["username"] = $user_data['username'];
        
        return $user_data;

    } catch (PDOException $e) {
        die("Something went wrong with login: " . $e->getMessage());
    } finally {
        $stmt = null;
    }
}
function createUser($user) {
    global $db;

    try {
        $sql = "INSERT INTO users (username, email, password) ";
        $sql .= "VALUES (:userUsername, :userEmail, :userPassword)";

        $stmt = $db->prepare($sql);
        
        $stmt->bindParam(':userUsername', $user['username'], PDO::PARAM_STR);
        $stmt->bindParam(':userEmail', $user['email'], PDO::PARAM_STR);
        $stmt->bindParam(':userPassword', $user['password'], PDO::PARAM_STR);

        $result = $stmt->execute();

        if (!$result) {
            die("Failed to insert data into the database: " . $stmt->errorInfo()[2]);
        }

        return true;
    } catch (PDOException $e) {
        die("Failed to insert data into the database: " . $e->getMessage());
    }
}
function get_logger_from_form() {
    if(!isset($_POST['email']) && !isset($_POST['password'])) {
        return false;
    } 

    $logger = [
    'email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
    'password' => $_POST['password']
    ];
    return $logger;
}

function find_user_by_email($email) {
    global $db;

    try {
        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
    
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }  catch (PDOException $e) {
        die("Failed to retrieve data from database: " . $e->getMessage());
    }
}

function find_user_by_id($id) {
    global $db;

    try {
        $sql = "SELECT * FROM users WHERE id = :id LIMIT 1";
    
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }  catch (PDOException $e) {
        die("Failed to retrieve data from database: " . $e->getMessage());
    }
}

function delete_user($user) {
    global $db;
    try {
        $sql = "DELETE FROM users WHERE id =  :id LIMIT 1";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $user['id']);
    
        $result = $stmt->execute();
        
        $stmt = null;
    
        return true;
    }  catch (PDOException $e) {
        die("ERROR: Could not execute $sql. " . $e->getMessage());
    }
}

function editUser($user) {
    global $db;
    try {
        $sql = "UPDATE users SET 
                    username = :username,
                    email = :email,
                    password = :password,
                    role = :role
                WHERE id = :id"; 

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':username', $user['username'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $user['email'], PDO::PARAM_STR);
        $stmt->bindParam(':password', $user['password'], PDO::PARAM_STR);
        $stmt->bindParam(':role', $user['role'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $user['id'], PDO::PARAM_INT); 

        $result = $stmt->execute();
        confirmResultSet($result);

        $stmt = null;

        return true;
    }  catch (PDOException $e) {
        die("ERROR: Could not execute $sql. " . $e->getMessage());
    }
}

function searchUser($search) {
    global $db;

    try {
        $sql = "SELECT * FROM users WHERE id = :id OR username LIKE :username OR email LIKE :email";
        $stmt = $db->prepare($sql);

        $searchTerm = "%" . $search . "%";

        $stmt->bindParam(':id', $search, PDO::PARAM_INT);
        $stmt->bindParam(':username', $searchTerm, PDO::PARAM_STR);
        $stmt->bindParam(':email', $searchTerm, PDO::PARAM_STR);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    } catch (PDOException $e) {
        die("Database query failed: " . $e->getMessage());
    }
}

function handleSuccessfulLogin($user) {
    if($user['role'] == 'admin') {
        header("Location: ../../app/view/admin_homepage.php"); 
        exit();
    } else {
        header("Location: ../../public/index.php");
        exit();
    }
}

function addToCart($book) {
    global $db;

    try {
        $sql = "INSERT INTO cart_items (book_title, book_price, book_author, book_image, book_descr) ";
        $sql .= "VALUES (:book_title, :book_price, :book_author, :book_image, :book_descr)";

        $stmt = $db->prepare($sql);
        
        $stmt->bindParam(':book_title', $book['book_title'], PDO::PARAM_STR);
        $stmt->bindParam(':book_price', $book['book_price'], PDO::PARAM_STR);
        $stmt->bindParam(':book_author', $book['book_author'], PDO::PARAM_STR);
        $stmt->bindParam(':book_image', $book['book_image'], PDO::PARAM_STR);
        $stmt->bindParam(':book_descr', $book['book_descr'], PDO::PARAM_STR);

        $result = $stmt->execute();

        if (!$result) {
            die("Failed to insert data into the database: " . $stmt->errorInfo()[2]);
        }

        return true;
    } catch (PDOException $e) {
        die("Failed to insert data into the database: " . $e->getMessage());
    }
}