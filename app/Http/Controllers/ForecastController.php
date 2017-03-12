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

    public function getForecast($id = null, $date = null)
    {
        if (!$id || !$date) {
            return response()->json(array('status' => 'data are missing'), 422);
        }

        $data = $this->forecastService->getForecast($id, $date);

        if ($data)
            return response()->json($data, 200);

        return response()->json(array('status' => 'forecast not found'), 404);
    }
}
