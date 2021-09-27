<?php

namespace App\Contracts\Weather;
use Illuminate\Http\Request;


interface Weather{
    public function getWeatherInfo($param);
};