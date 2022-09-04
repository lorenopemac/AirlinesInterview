<?php
 
namespace App\models;

use App\lib\Model;

class User extends Model{

    private int $id;
    private string $name;
    private string $location; 
    private string $chain; 
    private string $email;


    public function __construct(array $data)
    {
        parent::__construct();  
        foreach($data as $key => $val) {
            if(property_exists(__CLASS__,$key)) {
                if(!is_null($val))
                {
                    $this->$key = $val;
                }
            }
        }

    } 

    public function getName() : string
    {
        return $this->name;
    } 

    public function getChain() : string
    {
        return $this->chain;
    }

}