<?php
declare(strict_types = 1);
namespace App\lib;
// Require composer autoloader
require './vendor/autoload.php';

//Controllers
use App\controllers\AuthController;
use App\controllers\HomeController;
use App\controllers\BookingController;

// Create Router instance
$router = new \Bramus\Router\Router();
session_start();

//Check if user is already authenticated
function checkAuth()
{
    if(!isset($_SESSION['user'])){ 
        header('location: login');
        exit();
    } 
}
 
//if already succesfull login redirect home
$router->before('GET', '/', function() 
{  
    if(isset($_SESSION['user'])){ 
        header('location: home');
    }else{
        header('location: login'); 
    }
});


// Define routes 

//login page
$router->get('/login', function() 
{  
    $controller = new AuthController();
    $controller->login();
});
 
//authentication submit
$router->post('/auth', function() 
{ 
    $controller = new AuthController();
    $controller->auth();
});


//home page - seach hotels page 
$router->get('/home', function() {
    checkAuth();
    $user = unserialize($_SESSION['user']);
    $controller = new HomeController($user);
    $controller->index();
});


$router->get('/bookingsearch', function() 
{ 
    checkAuth();
    $controller = new BookingController();
    echo $controller->search_list_hotels(); 
});


// Run
$router->run();