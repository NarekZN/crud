<?php

namespace App\Contracts\Weather;


interface Weather{
    public function getWeatherInfo($param);
};