<?php

namespace App\hotel\serviceprovider\reposerviceprovider;

use Illuminate\Support\ServiceProvider;

class HotelRepoServiceProvider extends ServiceProvider
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
        $this->app->bind('App\hotel\repositories\repointerface\HotelInterface',
            'App\hotel\repositories\repoimpl\HotelImpl');
        $this->app->bind('App\hotel\repositories\repointerface\HelperInterface',
            'App\hotel\repositories\repoimpl\HelperImpl');
    }
}
