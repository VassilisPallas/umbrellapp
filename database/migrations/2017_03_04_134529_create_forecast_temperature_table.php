<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForecastTemperatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forecast_has_temperature', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('forecast_id')->unsigned()->index()->foreign()->references("id")->on("forecasts")->onDelete("cascade");
            $table->integer('temperature_id')->unsigned()->index()->foreign()->references("id")->on("temperatures")->onDelete("cascade");
            $table->dateTime('dt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('forecast_has_temperature');
    }
}
