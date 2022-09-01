<?php


require '../vendor/autoload.php';

//require_once '../app/User.php';
$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);
 
use App\User;
use App\Airline;

$asd = new App\User;
echo($asd->hola());

$url = "https://beta.id90travel.com/airlines";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 

$response = curl_exec($curl);
curl_close($curl);
echo var_dump(json_decode($response));


