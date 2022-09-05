<?php
declare(strict_types = 1);

namespace App\lib;

class View{

    public function __construct(){}

    /**
     * @param string $name : php file name
     * @param array $data : additional data
     * Render a html file 
     */
    public function render(string $name, array $data = [])
    {
        $this->data = $data;
        require 'app/views/'. $name . '.php';    
    }

}