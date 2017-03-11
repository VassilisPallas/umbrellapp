<?php
/**
 * Created by PhpStorm.
 * User: Vassilis Pallas
 * Date: 9/3/2017
 * Time: 6:47 μμ
 */

namespace Umbrellapp\Repositories\Contracts;


interface ICityRepository
{
    public function getCityFromName($name);

    public function getCityFromCoords($lat, $lng);
}