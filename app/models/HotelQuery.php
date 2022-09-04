<?php
declare(strict_types = 1);
namespace App\models;

use App\lib\Model;
use App\models\Hotel;

class HotelQuery extends Model{

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

    /**
     * @param array $data : contains params for API call 
     * @return array
     */
    public static function search_hotel(array $data) : string
    {
        $url = "https://beta.id90travel.com/api/v1/hotels.json".'?'. http_build_query($data) ;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  
        $response = curl_exec($curl);
        curl_close($curl);
        if(!curl_errno($curl) && (curl_getinfo($curl, CURLINFO_HTTP_CODE) != 500)){
            return $response;
        }else{
            //return empty json
            return '{}';
        }
    }

}