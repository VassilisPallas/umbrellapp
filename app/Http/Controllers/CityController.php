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

    public function searchCityName($name)
    {
        if (!$name) {
            return response()->json(array('status' => 'name is missing'), 400);
        }

        $cities = $this->cityService->searchCityByName($name);
        return response()->json($cities, 200);
    }

    public function searchCityByCoords()
    {
        return response()->json($this->cityService->searchCityByCoords(40.300581, 21.789813), 200);
    }
}
