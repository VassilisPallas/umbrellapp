<?php

namespace Umbrellapp\Http\Controllers;

use Umbrellapp\Http\Requests\SaveFavouriteCityRequest;
use Umbrellapp\Services\CityService;
use Umbrellapp\Services\FavouriteCitiesService;
use Umbrellapp\Services\FavouriteCityService;

class FavouriteCitiesController extends Controller
{
    private $favouriteCityService;
    private $cityService;

    /**
     * FavouriteCitiesController constructor.
     * @param CityService $cityService
     * @param FavouriteCityService $favouriteCityService
     * @internal param FavouriteCitiesService $favouriteCitiesService
     */
    public function __construct(CityService $cityService, FavouriteCityService $favouriteCityService)
    {
        $this->favouriteCityService = $favouriteCityService;
        $this->cityService = $cityService;
    }


    public function saveFavouriteCity(SaveFavouriteCityRequest $request)
    {
        $id = $request['id'];

        $added = $this->favouriteCityService->saveFavouriteCity($id);

        if ($added)
            return response()->json(array('status' => 'favourite city inserted'), 200);

        return response()->json(array('status' => 'city is already in favourite list'), 409);
    }

    public function showFavouriteCities()
    {
        $favouriteCities = $this->favouriteCityService->showFavouriteCities();

        if ($favouriteCities)
            return response()->json($favouriteCities, 200);

        return response()->json(array('status' => 'an error occurred while retrieving favourite cities'), 500);
    }

    public function deleteFavouriteCity($id = null)
    {
        if (!$id) {
            return response()->json(array('status' => 'id is missing'), 422);
        }

        if ($this->favouriteCityService->deleteFavouriteCity($id))
            return response()->json(array('status' => 'favourite city deleted'), 200);

        return response()->json(array('status' => 'city not found'), 404);
    }
}
