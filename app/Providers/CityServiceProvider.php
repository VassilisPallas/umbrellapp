<?php
/**
 * Created by PhpStorm.
 * User: Vassilis Pallas
 * Date: 9/3/2017
 * Time: 6:53 μμ
 */

namespace Umbrellapp\Providers;

use Illuminate\Support\ServiceProvider;
use Umbrellapp\Repositories\CityRepository;
use Umbrellapp\Repositories\Contracts\ICityRepository;

class CityServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(ICityRepository::class, CityRepository::class);
    }
}