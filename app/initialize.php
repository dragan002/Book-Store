<?php

define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');

$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0 , $public_end);
define('WWW_ROOT', $doc_root); 

require('functionsHelpers.php');
require('FunctionsValidation.php');
require('database/database.php');
require('models/BookModel.php');
require('models/UserModel.php');
require('models/CartModel.php');


$database = new Database();

$bookInstance = new Book();

$userInstance = new User();

$cartInstance = new Cart();

$userValidation = new FunctionsValidation();

spl_autoload_register(function($class) {
    var_dump($class);
});

?>
