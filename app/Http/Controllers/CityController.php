<?php

namespace Umbrellapp\Http\Controllers;

use Umbrellapp\Services\CityService;

class CityController extends Controller
{
    private $cityService;

    /**
     * CityController constructor.
     * @param CityService $cityService
     */
    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    public function searchCityName($name = null)
    {
        if (!$name) {
            return response()->json(array('status' => 'name is missing'), 422);
        }

        $cities = $this->cityService->searchCityByName($name);
        if (!$cities->isEmpty())
            return response()->json($cities, 200);

        return response()->json(array('status' => 'city not found'), 404);
    }

    public function searchCityByCoords($lat = null, $lng= null)
    {
        if (!$lat || !$lng) {
            return response()->json(array('status' => 'data are missing'), 422);
        }

        $cities = $this->cityService->searchCityByCoords($lat, $lng);

        if ($cities)
            return response()->json($cities, 200);

        return response()->json(array('status' => 'city not found'), 404);
    }
}
