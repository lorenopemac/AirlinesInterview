<?php

declare(strict_types = 1);
namespace App;


class User{

    private int $id;
    private string $airline;
    private string $username;
    private string $password; 

    public function _construct(array $data) : void
    {
        foreach($data as $key => $val) {
            if(property_exists(__CLASS__,$key)) {
                $this->$key = $val;
            }
        }
    }

    public function hola() : string
    {
        return "hola";
    }
}