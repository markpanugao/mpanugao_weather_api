<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

class DefaultController extends Controller
{
    //Default Landing Page
    public function index($id="Tokyo"){
    
        $result = (new WeatherController)->index($id);
        $result = json_decode(json_encode($result));

        $data['main_weather']   = $result->{'original'}->{'weather'}[0]->{'description'};
        $icon_weather           = $result->{'original'}->{'weather'}[0]->{'icon'};
        $data['icon_weather']   = "https://openweathermap.org/img/wn/". $icon_weather . "@2x.png";
        $data['humidity']       = $result->{'original'}->{'main'}->{'humidity'};
        $data['temperature']    = $result->{'original'}->{'main'}->{'temp'};
        $data['wind_speed']     = $result->{'original'}->{'wind'}->{'speed'};
        $data['country']        = "Japan";
        $data['city']           = $id;

        //Date and Day 
        $timestamp = time();
	    $dateToday = date("M,d");
	    $timeToday  = date("h:i A", $timestamp);
        $data['date_today']           = $dateToday;
        $data['time_today']           = $timeToday;

    	return view('default')->with("data",$data);
    }

    //Page to show when city selected
    public function show(Request $request) {

    	$id = $request->id;

        $result = (new WeatherController)->index($id);
        $result = json_decode(json_encode($result));

        $data['main_weather']   = $result->{'original'}->{'weather'}[0]->{'description'};
        $icon_weather           = $result->{'original'}->{'weather'}[0]->{'icon'};
        $data['icon_weather']   = "https://openweathermap.org/img/wn/". $icon_weather . "@2x.png";
        $data['humidity']       = $result->{'original'}->{'main'}->{'humidity'};
        $data['temperature']    = $result->{'original'}->{'main'}->{'temp'};
        $data['wind_speed']     = $result->{'original'}->{'wind'}->{'speed'};
        $data['country']        = "Japan";
        $data['city']           = $id;

        //Date and Day 
        $timestamp = time();
	    $dateToday = date("M,d");
	    $timeToday  = date("h:i A", $timestamp);
        $data['date_today']           = $dateToday;
        $data['time_today']           = $timeToday;

    	return response()->json(['success'=>$data]);
    }
}
