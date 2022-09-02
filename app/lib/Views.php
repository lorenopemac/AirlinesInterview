<?php

namespace App;

class View{

    public function render_view(string $name, array $data = [])
    {
        $this->data = $data;
        require 'app/views/'. $name.'.php';    
    }

}