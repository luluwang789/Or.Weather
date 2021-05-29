<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Current;
use Session;

class HomeController extends Controller
{
    //
    public function home()
    {
        $location = Location::all();
        
        $name = Session::get('city');
        if($name == null)
        {
            $nameCity = "Thanh Pho Ho Chi Minh";
        }
        else
        {
            $nameCity = $name;
        }
        $current_default = Current::where('name_city', $nameCity)->orderBy('id', 'DESC')->first();

        // dd($current_default->city);

        return view('weather.get_api_weather', compact(['location', 'current_default']));
    }
}
