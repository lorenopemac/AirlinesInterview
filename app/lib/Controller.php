<?php

namespace App\lib;

use App\lib\View;

class Controller{
    private View $view;

    public function __construct()
    {
        $this->view = new View();     
    }

    /**
     * Render an specific view by name 
     */
    protected function render(string $name, array $data = [])
    {
        $this->view->render($name,$data);   
    }

    /**
     * Extract param from POST request
     */
    protected function post(string $params)
    {
        if(!isset($POST[$param]))
        {
            return null;
        }else{
            return $POST[$param];
        } 
    }

    /**
     * Extract param from GET request
     */
    protected function get(string $params)
    {
        if(!isset($GET[$param]))
        {
            return null;
        }else{
            return $GET[$param];
        } 
    }

}