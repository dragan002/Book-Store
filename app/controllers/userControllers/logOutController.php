<?php 
session_start();

session_destroy();

header('Location: ../../../public/index.php');
exit;

// provjeriti da li radi 