<?php

namespace App;
// Require composer autoloader
require '../vendor/autoload.php';

// Create Router instance
$router = new \Bramus\Router\Router();
session_start();

// Define routes
$router->get('/', function() { 
    echo "Its Works";
});

// Run
$router->run();