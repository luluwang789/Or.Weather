<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForecastDay extends Model
{
    use HasFactory;

    protected $table = 'forecast_days';

    public $timestamps = false;

    // protected static function booted()
    // {
    //     static::deleting(function ($forecast_day){
    //         $forecast_day->hour()->detach();
    //     });
    // }

    // chiếu qua bảng location (1 - 1)
    // chiếu qua bảng hour (1 - n)
    public function hour()
    {
        return $this->hasMany(Hour::class, 'id_forecast', 'id');
    }
}
