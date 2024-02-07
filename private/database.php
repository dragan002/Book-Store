<?php

require_once('db_credentials.php');

function db_connect() {
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    confirm_db_connection();
    echo "test for db"; 
    return $conn;
}

function  confirm_db_connection() {
    if(mysqli_connect_errno()) {
        $msg = "Database failed: ";
        $msg .=  mysqli_connect_error();
        $msg .= "( " . mysqli_connect_error() . " )";
        exit($msg);
    }
}