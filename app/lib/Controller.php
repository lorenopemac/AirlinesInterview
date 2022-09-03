<?php

namespace App\lib;
 
use App\lib\Controller;

class Controller{
    private View $view;

    public function __construct()
    {
        $this->view = new View();     
    }

    /**
     * Render an specific view by name 
     */
    public function render(string $name, array $data = [])
    {
        $this->view->render($name,$data);   
    }

    /**
     * Extract param from POST request
     */
    protected function post(string $params)
    {
        if(!isset($POST[$params]))
        {
            return null;
        }else{
            return $POST[$params];
        } 
    }

    /**
     * Extract param from GET request
     */
    protected function get(string $params)
    {
        if(!isset($GET[$params]))
        {
            return null;
        }else{
            return $GET[$params];
        } 
    }

}