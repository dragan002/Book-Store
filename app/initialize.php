<?php

define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');

$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0 , $public_end);
define('WWW_ROOT', $doc_root); 

    require('functionsHelpers.php');
    require('database/database.php');
    require('models/bookModel.php');
    require('models/userModel.php');

    $db = db_connect();
?>
