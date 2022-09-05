<?php
declare(strict_types = 1);
namespace App\controllers;

use App\lib\Controller;
use App\models\Hotel;

class BookingController extends Controller{


    public function __construct(){
        parent::__construct(); 
    }

    /**
     * Search for hotels from home page using GET params
     */
    public function searchListHotels() : string
    {
        try{
            $result = '';
            if($_GET["guests"] != '' && $_GET["checkin"] != '' && $_GET["checkout"] != ''&& $_GET["city"] != '')
            {
                $data = array(
                    'guests[]' => $_GET["guests"],
                    'checkin' => date('Y-m-d', strtotime($_GET["checkin"])),
                    'checkout' => date('Y-m-d', strtotime($_GET["checkout"])),
                    'destination' => $_GET["city"], 
                );
                $result_search = Hotel::searchHotels($data);
                $result = $this->buildHotelList(json_decode($result_search,true)); 
            }else{
                $result = '{}';
            }
            return $result;
        }catch( Exception $e){
            echo 'Exception: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * Build a summary of hotels data from API
     * @param array $hotels : if empty return empty JSON
     */
    private function buildHotelList($hotels) : string
    { 
        try{
            $important_data = array();
            if(array_key_exists('hotels',$hotels))
            {
                foreach($hotels["hotels"] as $hotel)
                {
                    $data = array();
                    $data["name"] = $hotel["name"]; 
                    $data["location"] = $hotel["location"]["city"]; 
                    $data["subtotal"] = $hotel["subtotal"];   
                    $data["checkin"] = $hotel["checkin"];   
                    $data["checkout"] = $hotel["checkout"];      
                    $data["nights"] = $hotel["nights"];   
                    array_push($important_data,$data); 
                }
            }

            return json_encode($important_data);
        }catch( Exception $e){
            echo 'Exception: ',  $e->getMessage(), "\n";
        }
    }
 
}