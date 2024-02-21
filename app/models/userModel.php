<?php

function login($email, $password) {
    global $db;

    try {
        $sql = "SELECT * FROM admin WHERE email = ?";
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