<?php
declare(strict_types = 1);
namespace App\lib;

class View{

    public function __construct(){
        
    }

    public function render(string $name, array $data = [])
    {
        $this->data = $data;
        require 'app/views/'. $name . '.php';    
    }

}