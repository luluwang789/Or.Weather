<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // chiếu qua bảng forecast (n - 1): 1 forecast thì có n(24) hours 
    public function up()
    {
        // Nhiệt dộ theo giờ trong ngày
        Schema::create('hours', function (Blueprint $table) {
            $table->increments('id')->start(100);;
            $table->integer('id_forecast')->unsigned()->nullable()->default(12); 
            $table->dateTime('time')->nullable(); // lấy giờ
            $table->double('temp_c', 15, 8)->nullable()->default(123.4567);
            $table->double('temp_f', 15, 8)->nullable()->default(123.4567);
            $table->integer('is_day')->nullable()->default(12);
            $table->string('condition_text', 100)->nullable()->default('text');
            $table->string('condition_icon', 100)->nullable()->default('text');
            $table->integer('condition_code')->unsigned()->nullable()->default(12);
            $table->double('wind_mph', 15, 8)->nullable()->default(123.4567);
            $table->double('wind_kph', 15, 8)->nullable()->default(123.4567);
            $table->integer('wind_degree')->unsigned()->nullable()->default(12);
            $table->string('wind_dir', 100)->nullable()->default('text');
            $table->double('pressure_mb', 15, 8)->nullable()->default(123.4567);
            $table->double('pressure_in', 15, 8)->nullable()->default(123.4567);
            $table->double('precip_mm', 15, 8)->nullable()->default(123.4567);
            $table->double('precip_in', 15, 8)->nullable()->default(123.4567);
            $table->integer('humidity')->unsigned()->nullable()->default(12);
            $table->integer('cloud')->unsigned()->nullable()->default(12);
            $table->double('feelslike_c', 15, 8)->nullable()->default(123.4567);
            $table->double('feelslike_f', 15, 8)->nullable()->default(123.4567);
            $table->double('windchill_c', 15, 8)->nullable()->default(123.4567);
            $table->double('windchill_f', 15, 8)->nullable()->default(123.4567);
            $table->double('heatindex_c', 15, 8)->nullable()->default(123.4567);
            $table->double('heatindex_f', 15, 8)->nullable()->default(123.4567);
            $table->double('dewpoint_c', 15, 8)->nullable()->default(123.4567);
            $table->double('dewpoint_f', 15, 8)->nullable()->default(123.4567);
            $table->integer('will_it_rain')->unsigned()->nullable()->default(12);
            $table->string('chance_of_rain', 100)->nullable()->default('text');
            $table->integer('will_it_snow')->unsigned()->nullable()->default(12);
            $table->string('chance_of_snow', 100)->nullable()->default('text');
            $table->double('vis_km', 15, 8)->nullable()->default(123.4567);
            $table->double('vis_miles', 15, 8)->nullable()->default(123.4567);
            $table->double('gust_mph', 15, 8)->nullable()->default(123.4567);
            $table->double('gust_kph', 15, 8)->nullable()->default(123.4567);
            $table->double('uv', 15, 8)->nullable()->default(123.4567);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hours');
    }
}
