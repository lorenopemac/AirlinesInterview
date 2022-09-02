<?php

error_reporting(E_ALL); // Error/Exception engine, always use E_ALL
ini_set('ignore_repeated_errors', TRUE); // always use TRUE
ini_set('display_errors', TRUE); // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment
ini_set('log_errors', TRUE); // Error/Exception file logging engine.
ini_set('error_log', 'php-error.log');

require '../vendor/autoload.php';
require '../app/lib/routes.php';
//require_once '../app/User.php'; 
 
use App\User;  
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
?>

<!DOCTYPE html>

<html>

<head>

    <title>LOGIN</title>

    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

     <form action="login.php" method="post">

        <h2>LOGIN</h2>

        <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>

        <label>User Name</label>

        <input type="text" name="uname" placeholder="User Name"><br>

        <label>Password</label>

        <input type="password" name="password" placeholder="Password"><br> 

        <button type="submit">Login</button>

     </form>

</body>

</html>