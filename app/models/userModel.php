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
            die('Login failed. Email not found.');
        }

        if (!password_verify($password, $user_data['password'])) {
            die('Login failed. Invalid password.');
        }

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

function get_logger_from_forms() {
    if(!isset($_GET['email']) && !isset($_GET['password'])) {
        return false;
    } 

    $logger = [
    'email' => filter_var($_GET['email'], FILTER_SANITIZE_EMAIL),
    'password' => $_GET['password']
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