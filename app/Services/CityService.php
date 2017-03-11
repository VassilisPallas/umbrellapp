<?php
namespace Umbrellapp\Services;

use Umbrellapp\Repositories\Contracts\ICityRepository;

/**
 * Created by PhpStorm.
 * User: Vassilis Pallas
 * Date: 9/3/2017
 * Time: 6:56 μμ
 */
class CityService
{
    private $cityRepository;

    /**
     * UserAuthService constructor.
     * @param ICityRepository $cityRepository : repository for city
     */
    public function __construct(ICityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function searchCityByName($name)
    {
        return $this->cityRepository->getCityFromName($name);
    }

    public function findIn($field, $values)
    {
        return $this->cityRepository->findIn($field, $values);
    }

    public function searchCityByCoords($lat, $lng)
    {
        $city = $this->cityRepository->getCityFromCoords($lat, $lng);
        if ($city)
            return $this->searchCityByName($city);

        return null;
    }
}