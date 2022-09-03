<?php
 
namespace App\models;

use App\lib\Model;

class User extends Model{

    private int $id;
    private string $airline;
    private string $username; 
    private string $frist_name;
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
    public static function get(array $data) : User
    {
        try{
            //$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . './config/');
            //$dotenv->load();
            //$url = $_ENV['API_LOGIN']; 
            $postdata = json_encode($data);
            $url = "https://beta.id90travel.com/session.json";

            $curl = curl_init($url); 
            curl_setopt($curl, CURLOPT_POST, true); 
            curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

            $result = curl_exec($curl);
            curl_close($curl);
            //echo var_dump((json_decode($result,true)["member"])); 
            //exit;
            if(!curl_errno($curl) && curl_getinfo($curl, CURLINFO_HTTP_CODE)==200)
            {
                $user = new User(json_decode($result,true)["member"]);
                return $user;
            }else{
                return null;
            }
        }catch( Exception $e){

        }
    }

    public function getUsername() : string
    {
        return $this->username;
    } 

    public function getAirline() : string
    {
        return $this->airline;
    }

}