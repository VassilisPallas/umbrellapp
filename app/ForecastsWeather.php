<?php

namespace Umbrellapp;

use Illuminate\Database\Eloquent\Model;

class ForecastsWeather extends Model
{
    protected $table = 'forecast_has_weather';

    protected $fillable = [
        'forecast_id', 'weather_id', 'dt'
    ];

    public function weather()
    {
        return $this->belongsTo('Umbrellapp\Weather');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'temperature_id', 'forecast_id', 'weather_id'
    ];
}
