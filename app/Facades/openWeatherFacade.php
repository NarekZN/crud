<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\Services\OpenWeather;

class openWeatherFacade extends Facade{
    
    protected static function getFacadeAccessor()
    {
        return OpenWeather::class;
    }
}