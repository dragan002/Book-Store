<?php

require_once('db_credentials.php');

// function db_connect() {
//     $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
//     confirm_db_connection();
//     return $conn;
// }

function db_connect() {
    try {
        $conn = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}

function confirm_db_connection() {
    if(mysqli_connect_errno()) {
        $msg = "Database failed: ";
        $msg .=  mysqli_connect_error();
        $msg .= "( " . mysqli_connect_error() . " )";
        exit($msg);
    }
}

function confirmResultSet($resultSet) {
    if(!$resultSet) {
        die('Error in query') . $resultSet->error(db_connect());
    }
}

function db_disconnect($conn) {
    if(isset($conn)) {
        $conn = null;
    }
}
