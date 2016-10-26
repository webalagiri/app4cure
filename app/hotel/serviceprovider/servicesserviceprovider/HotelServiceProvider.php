<?php

namespace App\hotel\serviceprovider\servicesserviceprovider;

use Illuminate\Support\ServiceProvider;
use App\hotel\services\HotelService;

class HotelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //dd('Inside register');
        $this->app->bind('HotelService', function($app){
            $hotelService = new HotelService($app->make('App\hotel\repositories\repointerface\HotelInterface'));
            return $hotelService;

        });
    }
}
