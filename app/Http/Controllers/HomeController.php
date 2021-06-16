<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Current;
use App\Models\ForecastDay;
use App\Models\Hour;
use DB;
use Session;

class HomeController extends Controller
{
    //
    public function home()
    {
        $location = Location::orderBy('name', 'ASC')->get();
        
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

        $forecast_hour = DB::table('forecast_days')
                            ->join('hours', 'forecast_days.id', '=', 'hours.id_forecast')
                            ->select('forecast_days.name_city', 'hours.*')
                            ->where([['forecast_days.name_city',$nameCity]])
                            ->orderBy('hours.id_forecast', 'DESC')
                            ->orderBy('hours.id', 'ASC')
                            ->limit(24)
                            ->get();

        // dd($forecast_hour);

        return view('weather.get_api_weather', compact(['location', 'current_default', 'forecast_hour']));
    }
}
