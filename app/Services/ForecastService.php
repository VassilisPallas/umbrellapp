<?php
/**
 * Created by PhpStorm.
 * User: Vassilis Pallas
 * Date: 10/3/2017
 * Time: 12:44 πμ
 */

namespace Umbrellapp\Services;


use Carbon\Carbon;
use Umbrellapp\Repositories\Contracts\IForecastRepository;

class ForecastService
{
    private $forecastRepository;

    public function __construct(IForecastRepository $forecastRepository)
    {
        $this->forecastRepository = $forecastRepository;
    }

    public function getForecast($id, $timestamp)
    {
        $date = Carbon::createFromTimestamp($timestamp);
        // today + 6 days to get weakly forecast
        $nextWeek = Carbon::createFromTimestamp($timestamp)->addDays(6);
        return $this->forecastRepository->getByCityAndDate($id, $date->toDateString(), $nextWeek->toDateString());
    }
}