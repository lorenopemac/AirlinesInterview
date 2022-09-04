<?php
declare(strict_types = 1);
namespace App\controllers;

use App\lib\Controller;
use App\models\User;

class HomeController extends Controller{

    private User $user;

    public function __construct(User $user){
        parent::__construct();
        $this->user = $user;
    }

    /**
     * 
     */
    public function index()
    {
        $this->render('home',["user" => $this->user]);
    }
 
}