<?php


require '../vendor/autoload.php';

//require_once '../app/User.php';
$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);
 
use App\User;


$asd = new App\User;
echo($asd->hola());


