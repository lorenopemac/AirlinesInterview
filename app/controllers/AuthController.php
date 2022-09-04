<?php
declare(strict_types = 1);
namespace App\controllers;

use App\lib\Controller;
use App\models\User;

class AuthController extends Controller{
 

    public function __construct(){
        parent::__construct(); 
    }

    /**
     * render login view with airlines 
     */
    public function login() : void
    {
        $url = "https://beta.id90travel.com/airlines";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 

        $response = curl_exec($curl);
        curl_close($curl);
        $airlines = json_decode($response,true);
        $this->render('login',["airlines" => $airlines]);
    }

    /**
     * 
     */
    public function auth() : void
    { 
        $username = $_POST["username"];
        $password = $_POST["password"];
        $airline = $_POST["airline"];
        $remember_me = isset($_POST['remember_me']); 

        
        if(!is_null($username) && !is_null($password) && !is_null($airline) && !is_null($remember_me))
        { 
            $data = array("username" => $username,"password" => $password,"airline" => $airline,"remember_me" => $remember_me);
            $user = User::get($data);
            if($user){
                
                $_SESSION['user'] = serialize($user); 
                header('location: /home');
            }else{
                error_log('User not exist');
                header('location: /login');
            }
            
        }else{
            error_log('Login incorrect, data is null');
            header('location: /login');
        }
    }
 
}