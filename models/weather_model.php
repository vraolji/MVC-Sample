<?php

class Weather_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function doForecast($zipcode)
    {
        $hamclientid = "";
        $hamsecret = "";
        
        $response1 = file_get_contents("https://api.aerisapi.com/observations/" . $zipcode . "?client_id=" . $hamclientid ."&client_secret=" . $hamsecret);
        $response2 = file_get_contents("https://api.aerisapi.com//forecasts/" . $zipcode . "?fields=periods.timestamp,periods.minTempF,periods.maxTempF,periods.icon,periods.weather,periods.pop,periods.windSpeedMPH&client_id=" . $hamclientid . "&client_secret=" . $hamsecret);
        $response3 = file_get_contents("https://api.aerisapi.com//places/closest?p=" . $zipcode . "&client_id=" . $hamclientid . "&client_secret=" . $hamsecret);
        
        $json1 = json_decode($response1,true);
        $json2 = json_decode($response2,true);
        $json3 = json_decode($response3,true);
        
        return array($json1,$json2,$json3);
    }
}