<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    use HasFactory;

    protected $table = "hours";

    public $timestamps = false;

    // protected static function booted()
    // {
    //     static::deleting(function ($forecast_day){
    //         $forecast_day->forecast_day()->detach();
    //     });
    // }

    public function forecast_day()
    {
        return $this->belongsTo(ForecastDay::class, 'id_forecast', 'id');
    }
}
