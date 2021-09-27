<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OpenWeather;
use App\Contracts\Weather\Weather;


class WeatherController extends Controller
{
    public function __construct(Weather $weather)
    {
        $this->weather = $weather;
    }

    public function index(Weather $service)
    {
        return view("weather/index", compact("service"));
    }

    public function store(Request $request, OpenWeather $weather)
    {
        $weather = $weather->getWeatherInfo($request->Country);
        return  view("weather.index", compact("weather"));
    }
}
