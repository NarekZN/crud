<?php

namespace App\Services;

use App\Contracts\Weather\Weather;
use Throwable;

class OpenWeather implements Weather {
    
    public function __construct()
    {
        $this->celsiusMeasurementUnit = config('weatherConfig.C');
        $this->fahrenheitMeasurementUnit = config('weatherConfig.F');
        $this->api_key = config('weatherConfig.api_key');
       
    }
 
    public function getWeatherInfo($param){
        try {
            $city = $param;
            $api_key = $this->api_key;
            $measurementUnit = $this->celsiusMeasurementUnit;
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', "http://api.openweathermap.org/data/2.5/weather?q=". $city."&".$measurementUnit."&appid=".$api_key);
            $data = $response->getBody();
            $weatherInfo = json_decode($data, true);
            
            return collect($weatherInfo);
        } catch (Throwable $e) {
            report($e);
    
            return "SOMETHING WENT WRONG!!!!!";
        }
       
    }
}