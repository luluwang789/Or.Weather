<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // chiếu qua bảng current (1 - 1)
    // chiếu qua bảng forecast (1 - 1)
    public function up()
    {
        // Tên các thành phố Việt Nam
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable()->default('text');
            $table->string('country', 100)->nullable()->default('text');
            $table->double('lat', 15, 8)->nullable()->default(123.4567);
            $table->double('lon', 15, 8)->nullable()->default(123.4567);
            $table->string('tz_id', 100)->nullable()->default('text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
