<?php

namespace App\controllers;

use App\lib\Controller;

class BookingController extends Controller{


    public function __construct(){
        parent::__construct(); 
    }

    /**
     * 
     */
    public function search_list_hotels()
    {
        $data = array(
            'guests[]' => $_GET["guests"],
            'checkin' => date('Y-m-d', strtotime($_GET["checkin"])),
            'checkout' => date('Y-m-d', strtotime($_GET["checkout"])),
            'destination' => $_GET["city"], 
        );  
        $url = "https://beta.id90travel.com/api/v1/hotels.json".'?'. http_build_query($data) ;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  
        $response = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($response,true); 
        if(!curl_errno($curl) && (curl_getinfo($curl, CURLINFO_HTTP_CODE) == 200)){
            return $this->build_hotel_list($result); 
        }else{
            //return empty json
            return '{}';
        }
        //print_r(var_dump($result["hotels"][0]["name"]));
        //$this->build_hotel_list($result);
        //print_r(var_dump($this->build_hotel_list($result)));
        //exit;
        //return  $this->build_hotel_list($result);
    }

    /**
     * Build a summary of hotels data from API
     */
    private function build_hotel_list($hotels)
    { 
        $important_data = array();
        foreach($hotels["hotels"] as $hotel)
        {
            $data = array();
            $data["name"] = $hotel["name"]; 
            $data["location"] = $hotel["location"]["city"]; 
            //$data["chain"] = $hotel["chain"];   
            $data["subtotal"] = $hotel["subtotal"];   
            $data["checkin"] = $hotel["checkin"];   
            $data["checkout"] = $hotel["checkout"];      
            $data["nights"] = $hotel["nights"];   
            array_push($important_data,$data); 
        }

        return json_encode($important_data);
    }
 
}