<?php
declare(strict_types = 1);

namespace App\models;

use App\lib\Model;
use App\config\Configs;

class User extends Model{

    private int $id;
    private string $airline;
    private string $username; 
    private string $first_name;
    private string $last_name;
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

    /**
     * Verify if an user exist using API and return it
     * @param array $data
     */
    public static function get(array $data)
    {
        try{
            $postdata = json_encode($data);
            $url = Configs::$API_LOGIN;

            $curl = curl_init($url); 
            curl_setopt($curl, CURLOPT_POST, true); 
            curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            //timeout in seconds
            curl_setopt($curl, CURLOPT_TIMEOUT, 120); 
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
            $result = curl_exec($curl);
            curl_close($curl); 

            if(!curl_errno($curl) && curl_getinfo($curl, CURLINFO_HTTP_CODE)==200)
            {
                $user = new User(json_decode($result,true)["member"]);
                return $user;
            }else{
                return null;
            }
        }catch( Exception $e){
            echo 'Exception: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * Return username attribute
     */
    public function getUsername() : string
    {
        return $this->username;
    } 

    /**
     * Return airline attribute
     */
    public function getAirline() : string
    {
        return $this->airline;
    }

    /**
     * Return first_name attribute
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Return email attribute
     */
    public function getEmail()
    {
        return $this->email;
    }

}