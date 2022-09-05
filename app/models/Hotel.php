<?php
declare(strict_types = 1);
namespace App\models;

use App\lib\Model;
use App\config\Configs;

class Hotel extends Model{

    private int $id;
    private string $name;
    private string $location; 
    private string $chain; 
    private string $email;


    public function __construct(array $data)
    {
        if(sizeof($data)>0)
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
        }else{
            throw new Exception('Empty or missing atributes in data array on Hotel Construct');
        }

    } 

    /**
     * Return name attribute
     */
    public function getName() : string
    {
        return $this->name;
    } 

    /**
     * Return chain attribute
     */
    public function getChain() : string
    {
        return $this->chain;
    } 

    /**
     * Return location attribute
     */
    public function getLocation() : string
    {
        return $this->location;
    } 

    /**
     * Return email attribute
     */
    public function getEmail() : string
    {
        return $this->email;
    }
 
    /**
     * Return search data from API call
     * @param array $data : contains params for API call 
     * @return string
     */
    public static function searchHotels(array $data) : string
    {
        try{
            $url = Configs::$API_HOTELS.'?'. http_build_query($data) ;
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  
            //timeout in seconds
            curl_setopt($curl, CURLOPT_TIMEOUT, 120); 
            $response = curl_exec($curl);
            curl_close($curl);

            if(!curl_errno($curl) && (curl_getinfo($curl, CURLINFO_HTTP_CODE) != 500)){
                return $response;
            }else{
                //return empty json
                return '{}';
            }
        }catch( Exception $e){
            echo 'Exception: ',  $e->getMessage(), "\n";
        }
    }

}