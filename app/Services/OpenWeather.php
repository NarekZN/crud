<?php

namespace App\Services;

use App\Contracts\Weather\Weather;
use Illuminate\Support\Facades\App;
use Throwable;

class OpenWeather implements Weather {
    
    public function __construct()
    {
        $this->MeasurementUnit = config('weatherConfig.metrics');
        $this->api_key = config('weatherConfig.api_key');
       
    }
 
    public function getWeatherInfo($param){
        try {
            $city = $param;
            $api_key = $this->api_key;
            $measurementUnit = $this->MeasurementUnit;
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', "http://api.openweathermap.org/data/2.5/weather?q=". $city."&units=".$measurementUnit."&appid=".$api_key);
            $data = $response->getBody();
            $weatherInfo = json_decode($data, true);
            return collect($weatherInfo);
        } catch (Throwable $e) {
            report($e);
            
            return "SOMETHING WENT WRONG!!!!!";
        }
       
    }
}