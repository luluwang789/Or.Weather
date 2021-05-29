<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForecastDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // chiếu qua bảng location (1 - 1)
    // chiếu qua bảng hour (1 - n)
    public function up()
    {
        Schema::create('forecast_days', function (Blueprint $table) {
            $table->increments('id')->start(100);
            $table->string('name_city', 100)->nullable()->default('text');
            $table->date('date')->nullable();
            $table->double('day_maxtemp_c', 15, 8)->nullable()->default(123.4567);
            $table->double('day_maxtemp_f', 15, 8)->nullable()->default(123.4567);
            $table->double('day_mintemp_c', 15, 8)->nullable()->default(123.4567);
            $table->double('day_mintemp_f', 15, 8)->nullable()->default(123.4567);
            $table->double('day_avgtemp_c', 15, 8)->nullable()->default(123.4567);
            $table->double('day_avgtemp_f', 15, 8)->nullable()->default(123.4567);
            $table->double('day_maxwind_mph', 15, 8)->nullable()->default(123.4567);
            $table->double('day_maxwind_kph', 15, 8)->nullable()->default(123.4567);
            $table->double('day_totalprecip_mm', 15, 8)->nullable()->default(123.4567);
            $table->double('day_totalprecip_in', 15, 8)->nullable()->default(123.4567);
            $table->double('day_avgvis_km', 15, 8)->nullable()->default(123.4567);
            $table->double('day_avgvis_miles', 15, 8)->nullable()->default(123.4567);
            $table->double('day_avghumidity', 15, 8)->nullable()->default(123.4567);
            $table->integer('day_daily_will_it_rain')->unsigned()->nullable()->default(12);
            $table->string('day_daily_chance_of_rain', 100)->nullable()->default('text');
            $table->integer('day_daily_will_it_snow')->unsigned()->nullable()->default(12);
            $table->string('day_daily_chance_of_snow', 100)->nullable()->default('text');
            $table->string('day_condition_text', 100)->nullable()->default('text');
            $table->string('day_condition_icon', 100)->nullable()->default('text');
            $table->integer('day_condition_code')->unsigned()->nullable()->default(12);
            $table->double('day_uv', 15, 8)->nullable()->default(123.4567);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forecast_days');
    }
}
