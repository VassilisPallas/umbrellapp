<?php

namespace Umbrellapp;

use Illuminate\Database\Eloquent\Model;

class ForecastsTemperature extends Model
{
    protected $table = 'forecast_has_temperature';

    protected $fillable = [
        'forecast_id', 'temperature_id', 'dt'
    ];

    public function temperature()
    {
        return $this->belongsTo('Umbrellapp\Temperature');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at','updated_at','temperature_id','forecast_id'
    ];
}
