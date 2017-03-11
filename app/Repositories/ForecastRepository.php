<?php
/**
 * Created by PhpStorm.
 * User: Vassilis Pallas
 * Date: 10/3/2017
 * Time: 12:31 πμ
 */

namespace Umbrellapp\Repositories;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Umbrellapp\Forecast;
use Umbrellapp\Helpers\Utils;
use Umbrellapp\Repositories\Contracts\IForecastRepository;
use Umbrellapp\Repositories\Eloquent\Repository;

class ForecastRepository extends Repository implements IForecastRepository
{
    /**
     * ForecastRepository constructor.
     */
    public function __construct()
    {
        $this->model = new Forecast();
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return $this->model;
    }

    public function getByCityAndDate($id, $date, $nextWeek)
    {
        return Cache::remember('city' . $id . $date, 30 /* 30 minutes */, function () use ($id, $date, $nextWeek) {
            $forecast = $this->model->where('city_id', $id)->whereBetween(DB::raw('DATE(`time`)'), array($date, $nextWeek))->first();

            if ($forecast) {

                $forecast->setStart($date);
                $forecast->setEnd($nextWeek);

                // get forecast temperatures
                $forecastTemperatures = $forecast->temperatures;

                // for each temperature, get the temperature object and push it on temperatures
                $forecastTemperatures->each(function ($forecastTemperature) {
                    return $forecastTemperature->push($forecastTemperature->temperature);
                });

                // get forecast weathers
                $forecastWeathers = $forecast->weathers;

                // for each weather, get the weather object and push it on weathers
                $forecastWeathers->each(function ($forecastWeather) {
                    return $forecastWeather->push($forecastWeather->weather);
                });

                // add city to forecast
                $forecast->city;
            }

            return $forecast;
        });
    }
}