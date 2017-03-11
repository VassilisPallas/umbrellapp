<?php

namespace Umbrellapp;

use Illuminate\Database\Eloquent\Model;

class Forecast extends Model
{
    private $start;
    private $end;

    protected $table = 'forecasts';

    protected $fillable = [
        'id', 'time', 'city_id'
    ];

    public function temperatures()
    {
        return $this->hasMany('Umbrellapp\ForecastsTemperature')->where('dt', '>=', $this->start)->limit(7);
    }

    public function weathers()
    {
        return $this->hasMany('Umbrellapp\ForecastsWeather')->where('dt', '>=', $this->start)->limit(7);
    }

    public function city()
    {
        return $this->belongsTo('Umbrellapp\City');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'city_id'
    ];

    /**
     * @param mixed $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @param mixed $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }
}
