<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    //API to get the weather forecast
    public function index($selectedCity)
    {
    	$response = Http::get("api.openweathermap.org/data/2.5/weather?q=".$selectedCity.",jp&APPID=d6e0da539385cedc3d017673572c0d62");

        $jsonData = $response->json();

    	return response()->json($jsonData);
    }
}
