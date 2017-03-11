<?php

namespace Umbrellapp\Services;

use Umbrellapp\Repositories\Contracts\IFavouriteCitiesRepository;

/**
 * Created by PhpStorm.
 * User: Vassilis Pallas
 * Date: 9/3/2017
 * Time: 7:00 μμ
 */
class FavouriteCityService
{
    private $favouriteCityRepository;

    public function __construct(IFavouriteCitiesRepository $favouriteCitiesRepository)
    {
        $this->favouriteCityRepository = $favouriteCitiesRepository;
    }

    public function saveFavouriteCity($id)
    {
        return $this->favouriteCityRepository->create(['city_id' => $id]);
    }

    public function showFavouriteCities()
    {
        return $this->favouriteCityRepository->all();
    }

    public function deleteFavouriteCity($id)
    {
        return $this->favouriteCityRepository->deleteBy('city_id', $id);
    }
}