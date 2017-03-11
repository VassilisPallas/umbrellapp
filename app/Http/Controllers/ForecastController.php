<?php

namespace Umbrellapp\Http\Controllers;

use Umbrellapp\Services\ForecastService;

class ForecastController extends Controller
{
    private $forecastService;

    /**
     * ForecastController constructor.
     * @param ForecastService $forecastService
     * @internal param FavouriteCitiesService $favouriteCitiesService
     */
    public function __construct(ForecastService $forecastService)
    {
        $this->forecastService = $forecastService;
    }

    public function getForecast($id, $date)
    {
        return response()->json($this->forecastService->getForecast($id, $date), 200);
    }
}
