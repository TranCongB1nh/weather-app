<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class WeatherAppController extends Controller
{
    public function index()
    {
        return view('weather-forecast.weather');
    }

    public function search(Request $request)
    {
        $city = $request->input('city');
        $apiKey = env('WEATHER_API_KEY');
        $response = Http::get("https://api.weatherapi.com/v1/forecast.json?key=$apiKey&q=$city&days=5");
        $weatherData = $response->json();

        return view('weather-forecast.weather', ['weatherData' => $weatherData]);
    }
}
