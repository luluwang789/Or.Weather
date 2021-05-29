<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Location;
use App\Models\Current;
use App\Models\ForecastDay;
use App\Models\Hour;
use DB;

class DashboardAdminController extends Controller
{
    public function login()
    {
        return view('admin.login.login');
    }

    public function index()
    {
        return view('admin.page.dashboard');
    }

    public function search(Request $request)
    {
        $url = url("http://api.weatherapi.com/v1/forecast.json?key=7c0579f5a6d54afa8bf40652210105&q=".$request->search."&days=1&aqi=yes&alerts=yes");

        // Make HTTP Request
        $client = new Client();

        $res = $client->request("GET", $url, [
            'verify' => false,
            'timeout' => 20
        ]);
        
        $data_json = "Not Found";

        if($res->getStatusCode() == 200)
        {
            $response_data = $res->getBody()->getContents();
            $data_json = json_decode($response_data);
        }
        
        // dd($data_json);

        $check = Current::where([['last_updated', $data_json->current->last_updated],['name_city', $data_json->location->name]])->first();

        // chưa có
        if($check == null)
        {
            $weather_current = new Current();
            $weather_current->name_city = $data_json->location->name;
            $weather_current->last_updated = $data_json->current->last_updated;
            $weather_current->temp_c = $data_json->current->temp_c;
            $weather_current->feelslike_c = $data_json->current->feelslike_c;
            $weather_current->temp_f = $data_json->current->temp_f;
            $weather_current->feelslike_f = $data_json->current->feelslike_f;
            $weather_current->condition_text = $data_json->current->condition->text;
            $weather_current->condition_icon = $data_json->current->condition->icon;
            $weather_current->condition_code = $data_json->current->condition->code;
            $weather_current->wind_mph = $data_json->current->wind_mph;
            $weather_current->wind_kph = $data_json->current->wind_kph;
            $weather_current->wind_degree = $data_json->current->wind_degree;
            $weather_current->wind_dir = $data_json->current->wind_dir;
            $weather_current->pressure_mb = $data_json->current->pressure_mb;
            $weather_current->precip_mm = $data_json->current->precip_mm;
            $weather_current->precip_in = $data_json->current->precip_in;
            $weather_current->humidity = $data_json->current->humidity;
            $weather_current->cloud = $data_json->current->cloud;
            $weather_current->is_day = $data_json->current->is_day;
            $weather_current->uv = $data_json->current->uv;
            $weather_current->gust_mph = $data_json->current->gust_mph;
            $weather_current->gust_kph = $data_json->current->gust_kph;
    
            $weather_current->save();

            // forecast
            $weather_forecast = new ForecastDay();
            // save here
            $weather_forecast->name_city = $data_json->location->name;
            $weather_forecast->date = $data_json->forecast->forecastday[0]->date;
            $weather_forecast->day_maxtemp_c = $data_json->forecast->forecastday[0]->day->maxtemp_c;
            $weather_forecast->day_maxtemp_f = $data_json->forecast->forecastday[0]->day->maxtemp_f;
            $weather_forecast->day_mintemp_c = $data_json->forecast->forecastday[0]->day->mintemp_c;
            $weather_forecast->day_mintemp_f = $data_json->forecast->forecastday[0]->day->mintemp_f;
            $weather_forecast->day_avgtemp_c = $data_json->forecast->forecastday[0]->day->avgtemp_c;
            $weather_forecast->day_avgtemp_f = $data_json->forecast->forecastday[0]->day->avgtemp_f;
            $weather_forecast->day_maxwind_mph = $data_json->forecast->forecastday[0]->day->maxwind_mph;
            $weather_forecast->day_maxwind_kph = $data_json->forecast->forecastday[0]->day->maxwind_kph;
            $weather_forecast->day_totalprecip_mm = $data_json->forecast->forecastday[0]->day->totalprecip_mm;
            $weather_forecast->day_totalprecip_in = $data_json->forecast->forecastday[0]->day->totalprecip_in;
            $weather_forecast->day_avgvis_km = $data_json->forecast->forecastday[0]->day->avgvis_km;
            $weather_forecast->day_avgvis_miles = $data_json->forecast->forecastday[0]->day->avgvis_miles;
            $weather_forecast->day_avghumidity = $data_json->forecast->forecastday[0]->day->avghumidity;
            $weather_forecast->day_daily_will_it_rain = $data_json->forecast->forecastday[0]->day->daily_will_it_rain;
            $weather_forecast->day_daily_chance_of_rain = $data_json->forecast->forecastday[0]->day->daily_chance_of_rain;
            $weather_forecast->day_daily_will_it_snow = $data_json->forecast->forecastday[0]->day->daily_will_it_snow;
            $weather_forecast->day_daily_chance_of_snow = $data_json->forecast->forecastday[0]->day->daily_chance_of_snow;
            $weather_forecast->day_condition_text = $data_json->forecast->forecastday[0]->day->condition->text;
            $weather_forecast->day_condition_icon = $data_json->forecast->forecastday[0]->day->condition->icon;
            $weather_forecast->day_condition_code = $data_json->forecast->forecastday[0]->day->condition->code;
            $weather_forecast->day_uv = $data_json->forecast->forecastday[0]->day->uv;

            $weather_forecast->save();

            // save here
            $id_forecast = ForecastDay::where('date', $data_json->forecast->forecastday[0]->date)->orderBy('id', 'DESC')->first('id');

            $i = 0;
            foreach($data_json->forecast->forecastday[0]->hour as $hour)
            {
                $weather_forecast_hour = new Hour();

                $weather_forecast_hour->id_forecast = $id_forecast->id;
                $weather_forecast_hour->time = $data_json->forecast->forecastday[0]->hour[$i]->time ;
                $weather_forecast_hour->temp_c = $data_json->forecast->forecastday[0]->hour[$i]->temp_c ;
                $weather_forecast_hour->temp_f = $data_json->forecast->forecastday[0]->hour[$i]->temp_f ;
                $weather_forecast_hour->is_day = $data_json->forecast->forecastday[0]->hour[$i]->is_day ;
                $weather_forecast_hour->condition_text = $data_json->forecast->forecastday[0]->hour[$i]->condition->text ;
                $weather_forecast_hour->condition_icon = $data_json->forecast->forecastday[0]->hour[$i]->condition->icon ;
                $weather_forecast_hour->condition_code = $data_json->forecast->forecastday[0]->hour[$i]->condition->code ;
                $weather_forecast_hour->wind_mph = $data_json->forecast->forecastday[0]->hour[$i]->wind_mph ;
                $weather_forecast_hour->wind_kph = $data_json->forecast->forecastday[0]->hour[$i]->wind_kph ;
                $weather_forecast_hour->wind_degree = $data_json->forecast->forecastday[0]->hour[$i]->wind_degree ;
                $weather_forecast_hour->wind_dir = $data_json->forecast->forecastday[0]->hour[$i]->wind_dir ;
                $weather_forecast_hour->pressure_mb = $data_json->forecast->forecastday[0]->hour[$i]->pressure_mb ;
                $weather_forecast_hour->pressure_in = $data_json->forecast->forecastday[0]->hour[$i]->pressure_in ;
                $weather_forecast_hour->precip_mm= $data_json->forecast->forecastday[0]->hour[$i]->precip_mm ;
                $weather_forecast_hour->precip_in = $data_json->forecast->forecastday[0]->hour[$i]->precip_in ;
                $weather_forecast_hour->humidity = $data_json->forecast->forecastday[0]->hour[$i]->humidity ;
                $weather_forecast_hour->cloud = $data_json->forecast->forecastday[0]->hour[$i]->cloud ;
                $weather_forecast_hour->feelslike_c = $data_json->forecast->forecastday[0]->hour[$i]->feelslike_c ;
                $weather_forecast_hour->feelslike_f = $data_json->forecast->forecastday[0]->hour[$i]->feelslike_f ;
                $weather_forecast_hour->windchill_c = $data_json->forecast->forecastday[0]->hour[$i]->windchill_c ;
                $weather_forecast_hour->windchill_f = $data_json->forecast->forecastday[0]->hour[$i]->windchill_f ;
                $weather_forecast_hour->heatindex_c = $data_json->forecast->forecastday[0]->hour[$i]->heatindex_c ;
                $weather_forecast_hour->heatindex_f = $data_json->forecast->forecastday[0]->hour[$i]->heatindex_f ;
                $weather_forecast_hour->dewpoint_c = $data_json->forecast->forecastday[0]->hour[$i]->dewpoint_c ;
                $weather_forecast_hour->dewpoint_f = $data_json->forecast->forecastday[0]->hour[$i]->dewpoint_f ;
                $weather_forecast_hour->will_it_rain = $data_json->forecast->forecastday[0]->hour[$i]->will_it_rain ;
                $weather_forecast_hour->chance_of_rain = $data_json->forecast->forecastday[0]->hour[$i]->chance_of_rain ;
                $weather_forecast_hour->will_it_snow = $data_json->forecast->forecastday[0]->hour[$i]->will_it_snow ;
                $weather_forecast_hour->chance_of_snow = $data_json->forecast->forecastday[0]->hour[$i]->chance_of_snow ;
                $weather_forecast_hour->vis_km = $data_json->forecast->forecastday[0]->hour[$i]->vis_km ;
                $weather_forecast_hour->vis_miles = $data_json->forecast->forecastday[0]->hour[$i]->vis_miles ;
                $weather_forecast_hour->gust_mph = $data_json->forecast->forecastday[0]->hour[$i]->gust_mph ;
                $weather_forecast_hour->gust_kph = $data_json->forecast->forecastday[0]->hour[$i]->gust_kph ;
                $weather_forecast_hour->uv = $data_json->forecast->forecastday[0]->hour[$i]->uv ;
                
                $weather_forecast_hour->save();
                $i++;
            }
        }

        $city = $data_json->location->name;
   
        return redirect()->back()->with('city', $city);
    }
}
