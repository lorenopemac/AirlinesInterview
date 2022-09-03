<?php

error_reporting(E_ALL); // Error/Exception engine, always use E_ALL
ini_set('ignore_repeated_errors', TRUE); // always use TRUE
ini_set('display_errors', TRUE); // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment
ini_set('log_errors', TRUE); // Error/Exception file logging engine.
ini_set('error_log', 'php-error.log');

require './vendor/autoload.php'; 
require './app/lib/routes.php';
/*
echo 'ola';


$url = 'https://beta.id90travel.com/session.json';
$data = array("username" => "f9user","password" => "123456","remember_me"=>"1");

$postdata = json_encode($data);

$ch = curl_init($url); 
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$result = curl_exec($ch);
curl_close($ch);
echo curl_getinfo($ch, CURLINFO_HTTP_CODE);
echo !curl_errno($ch);
//print_r ($result);





/*
use App\App;

$app = new App();
//echo "HOLA INDEX";
//require '../app/lib/routes.php';
//require_once '../app/User.php'; 
 
/*use App\User;  
$asd = new App\User;
echo($asd->hola());
/*
$url = "https://beta.id90travel.com/airlines";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 

$response = curl_exec($curl);
curl_close($curl);
echo var_dump(json_decode($response));
 
// use Predis\autoload; 
 
//$redis = new Redis(); 
//Se puede cambiar la configuración
//$redis->connect('localhost',6379, 0);
/*Predis\Autoloader::register();
$client = new Predis\Client(array('host' => '127.0.0.1', 'port' => 6300), array('prefix' => 'php:'));
$client->set("string:my_key", "Hello World");
$client->get("string:my_key");*/
