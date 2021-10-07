<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Weather\Weather;
use App\Facades\openWeatherFacade;

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

    public function store(Request $request)
    {
        $weather = openWeatherFacade::getWeatherInfo($request->Country);
        return  view("weather.index", compact("weather"));
        
    }
}
