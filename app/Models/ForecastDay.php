<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForecastDay extends Model
{
    use HasFactory;

    protected $table = 'forecast_days';

    public $timestamps = false;

    // chiếu qua bảng location (1 - 1)
    // chiếu qua bảng hour (1 - n)
}
