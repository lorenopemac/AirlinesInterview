<?php
declare(strict_types = 1);
namespace App\controllers;

use App\lib\Controller;
use App\models\User;
use Exception;
class HomeController extends Controller{

    private User $user;

    public function __construct(User $user){
        if(isset($user)){
            parent::__construct();
            $this->user = $user;
        }else{
            throw new Exception('Empty User on HomeController __construct');
        }
    }

    /**
     * Render home page with user information
     */
    public function index()
    {
        $this->render('home',["user" => $this->user]);
    }
 
}