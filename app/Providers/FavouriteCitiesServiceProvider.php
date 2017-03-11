<?php
/**
 * Created by PhpStorm.
 * User: Vassilis Pallas
 * Date: 9/3/2017
 * Time: 6:54 μμ
 */

namespace Umbrellapp\Providers;

use Illuminate\Support\ServiceProvider;
use Umbrellapp\Repositories\Contracts\IFavouriteCitiesRepository;
use Umbrellapp\Repositories\FavouriteRepository;

class FavouriteCitiesServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(IFavouriteCitiesRepository::class, FavouriteRepository::class);
    }
}