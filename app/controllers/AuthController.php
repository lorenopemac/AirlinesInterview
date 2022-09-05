<?php
declare(strict_types = 1);
namespace App\controllers;

use App\lib\Controller;
use App\models\User;
use App\models\Airline;

class AuthController extends Controller{
 

    public function __construct(){
        parent::__construct(); 
    }

    /**
     * Render login view with airlines 
     */
    public function login() : void
    {
        try{
            $airlines = Airline::getAirlines();
            $this->render('login',["airlines" => $airlines]);
        }catch( Exception $e){
            echo 'Exception: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * Logut user and render login page
     */
    public function logout() : void
    {
        try{ 
            session_unset();
            header('location: /login');
        }catch( Exception $e){
            echo 'Exception: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * Authentication function for users
     * @param POST username
     * @param POST password
     * @param POST airline
     * @param POST remember_me
     */
    public function auth() : void
    { 
        try{
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
                    header('location: /login');
                }
                
            }else{ 
                header('location: /login');
            }
        }catch( Exception $e){
            echo 'Exception: ',  $e->getMessage(), "\n";
        }
    }
 
}