<?php
/**
 * Created by PhpStorm.
 * User: Vassilis Pallas
 * Date: 10/3/2017
 * Time: 12:31 πμ
 */

namespace Umbrellapp\Repositories\Contracts;


interface IForecastRepository
{
    public function getByCityAndDate($id, $date, $nextWeek);
}