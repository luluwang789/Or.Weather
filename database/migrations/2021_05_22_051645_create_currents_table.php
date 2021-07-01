<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // chiếu qua bảng location (1 - 1)
    public function up()
    {
        // Lấy thời tiết hiện tại của thành phố đang tìm kiếm
        Schema::create('currents', function (Blueprint $table) {
            $table->increments('id')->start(10000);
            $table->string('name_city', 100)->nullable()->default('text');
            $table->dateTime('last_updated')->nullable(); //
            $table->double('temp_c', 15, 8)->nullable()->default(123.4567); //
            $table->double('feelslike_c', 15, 8)->nullable()->default(123.4567);
            $table->double('temp_f', 15, 8)->nullable()->default(123.4567);
            $table->double('feelslike_f', 15, 8)->nullable()->default(123.4567);
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
            $table->integer('is_day')->unsigned()->nullable()->default(12);
            $table->double('uv', 15, 8)->nullable()->default(123.4567);
            $table->double('gust_mph', 15, 8)->nullable()->default(123.4567);
            $table->double('gust_kph', 15, 8)->nullable()->default(123.4567);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currents');
    }
}
