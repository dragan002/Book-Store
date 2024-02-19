<?php
    require_once('functions.php');

    define("PRIVATE_PATH", dirname(__FILE__));
    define("PROJECT_PATH", dirname(PRIVATE_PATH));
    define("PUBLIC_PATH", PROJECT_PATH . '/public');
    define("SHARED_PATH", PRIVATE_PATH . '/shared');

    $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
    $doc_root = substr($_SERVER['SCRIPT_NAME'], 0 , $public_end);
    define('WWW_ROOT', $doc_root); 

    require('database.php');
    require('query_functions.php');
    require('public_functions.php');
    require('validation_functions.php');
    require('bookModel/bookModel.php');
    require('userModel/userModel.php');

    $db = db_connect();
?>
