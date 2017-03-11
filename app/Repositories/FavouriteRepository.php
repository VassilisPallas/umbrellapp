<?php
/**
 * Created by PhpStorm.
 * User: Vassilis Pallas
 * Date: 9/3/2017
 * Time: 12:39 πμ
 */

namespace Umbrellapp\Repositories;

use Umbrellapp\Favourite;
use Umbrellapp\Helpers\Utils;
use Umbrellapp\Repositories\Contracts\IFavouriteCitiesRepository;
use Umbrellapp\Repositories\Eloquent\Repository;

class FavouriteRepository extends Repository implements IFavouriteCitiesRepository
{
    /**
     * CityRepository constructor.
     */
    public function __construct()
    {
        $this->model = new Favourite();
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

    public function all($columns = array('*'))
    {
        $favouriteCities = parent::all($columns);

        // get whole country name for each favourite city
        return $favouriteCities->map(function ($favouriteCity) {
            $city = $favouriteCity->city;
            $city['country_name'] = Utils::code_to_country($city->country);
            return $city;
        });
    }
}