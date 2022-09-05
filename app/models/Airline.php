<?php
declare(strict_types = 1);
namespace App\models;

use App\lib\Model; 
use Exception;
use App\config\Configs;

class Airline extends Model{

    private int $id;
    private string $name;
    private string $code; 
    private string $display_name; 
    private string $currency;
    private bool $sign_in_availible;
    private bool $sign_up_availible;

    public function __construct(array $data)
    {
        if(sizeof($data)>0 && array_key_exists('name',$data) && array_key_exists('id',$data)){
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
            throw new Exception('Empty or missing atributes in data array on Airline Construct');
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
     * Return code attribute
     */
    public function getCode() : string
    {
        return $this->code;
    }

    /**
     * Return display_name attribute
     */
    public function getDisplayName() : string
    {
        return $this->display_name;
    }

    /**
     * Return name attribute
     */
    public function getCurrency() : string
    {
        return $this->currency;
    }

    /**
     * Return sign_in_availible attribute
     */
    public function getSignInAvailible() : string
    {
        return $this->sign_in_availible;
    }

    /**
     * Return sign_up_availible attribute
     */
    public function getSignUpAvailible() : string
    {
        return $this->sign_up_availible;
    }

    /**
     * Return all Airlines from API call
     * @return array
     */
    public static function getAirlines() : array
    {
        try{
            $url = Configs::$API_AIRLINES;
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
            //timeout in seconds
            curl_setopt($curl, CURLOPT_TIMEOUT, 120); 
            $response = curl_exec($curl);
            curl_close($curl);
            $airlines = json_decode($response,true);
            if(!curl_errno($curl) && (curl_getinfo($curl, CURLINFO_HTTP_CODE) != 500)){
                return $airlines;
            }else{
                //return empty array
                return array();
            }
        }catch( Exception $e){
            echo 'Exception: ',  $e->getMessage(), "\n";
        }
    }

}