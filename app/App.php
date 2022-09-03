<?php
namespace App;

use App\controllers\Login;

 class App{
    function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url,'/');
        $url = explode('/',$url);
        echo "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        if(empty($url[0]))
        {
            $controller = new Login();
            $controller->render('login');
            return false;
        }
         
        $controller_file = 'controllers/'. $url[0] .'.php';
        if(file_exists($controller))
        {
            require_once $controller_file;
            $controller = new $rul[0];
            $controller->render($rul[0]);
            if(isset($url[1])){
                if(method_exists($controller, $url[1])){
                    if(isset($url[1]))
                    {

                    }
                }
            }
        }else{
            //controller does not exist
        }
        return false;
    }
 }