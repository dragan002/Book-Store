<?php

function login($email, $password) {
    global $db;

    $sql = "SELECT * FROM admin WHERE email = ?";
    $stmt = mysqli_prepare($db, $sql);

    if (!$stmt) {
        die('Database failed: ' . mysqli_error($db));
    } 

    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    if (!$result) {
        error_log("Database query execution failed: " . mysqli_error($db));
        die("Error: Unable to process your request. Please try again later.");
    }

    $admin = mysqli_fetch_assoc($result);

    if ($admin && password_verify($password, $admin['password'])) {
        return $admin;
    } else {
        return false;
    }
}

function get_logger_from_form() {
    if(!isset($_POST['email']) && !isset($_POST['password'])) {
        return false;
    } else {
         $logger = [
            'email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
            'password' => $_POST['password']
        ];
        return $logger;
    }
}