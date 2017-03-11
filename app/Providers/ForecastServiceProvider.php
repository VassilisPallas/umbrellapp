<?php
/**
 * Created by PhpStorm.
 * User: Vassilis Pallas
 * Date: 10/3/2017
 * Time: 12:34 πμ
 */

namespace Umbrellapp\Providers;

use Illuminate\Support\ServiceProvider;
use Umbrellapp\Repositories\Contracts\IForecastRepository;
use Umbrellapp\Repositories\ForecastRepository;

class ForecastServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(IForecastRepository::class, ForecastRepository::class);
    }
}