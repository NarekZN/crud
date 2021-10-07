<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Contracts\Weather\Weather;
use App\Services\OpenWeather;

class WeatherProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
     {

        $this->app->bind(Weather::class, OpenWeather::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 

    }
}
