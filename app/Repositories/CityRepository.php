<?php
/**
 * Created by PhpStorm.
 * User: Vassilis Pallas
 * Date: 8/3/2017
 * Time: 11:26 μμ
 */

namespace Umbrellapp\Repositories;

use Illuminate\Support\Facades\Cache;
use Umbrellapp\City;
use Umbrellapp\Repositories\Contracts\ICityRepository;
use Umbrellapp\Repositories\Eloquent\Repository;

class CityRepository extends Repository implements ICityRepository
{
    /**
     * CityRepository constructor.
     */
    public function __construct()
    {
        $this->model = new City();
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

    public function getCityFromName($name)
    {
        $cities = Cache::remember('city' . strtolower($name), 30 /* 30 minutes */, function () use ($name) {
            return $this->findLike("name", $name);
        });

        return $cities;
    }

    public function getCityFromCoords($lat, $lng)
    {
        $param = array("latlng" => "$lat,$lng");
        $response = \Geocoder::geocode('json', $param);

        $response = str_replace('"""', '', $response);
        $response = str_replace('\n', '', $response);
        $json = json_decode($response, true);
        $addressComponents = $json['results'][0]['address_components'];

        if (isset($addressComponents[5])){
         return $addressComponents[5]['long_name'];
        }

        return null;
    }
}