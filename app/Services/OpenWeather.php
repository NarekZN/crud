<?php

namespace App\Services;

use App\Contracts\Weather\Weather;
use Illuminate\Http\Request;
use App\Config\weatherConfig;
use Throwable;

class OpenWeather implements Weather {
 
    public function getWeatherInfo($param){
        try {
            $city = $param;
            $api_key = config('weatherConfig.api_key');
            $api_url = "http://api.openweathermap.org/data/2.5/weather?q=". $city."&units=metric&appid=".$api_key;
            $get_weather = file_get_contents($api_url);
            $weatherInfo = json_decode($get_weather, true);
    
            return collect($weatherInfo);
        } catch (Throwable $e) {
            report($e);
    
            return "SOMETHING WENT WRONG!!!!!";
        }
       
    }
}