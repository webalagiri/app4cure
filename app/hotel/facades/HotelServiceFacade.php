<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/8/2016
 * Time: 5:42 PM
 */

namespace App\hotel\facades;
use \Illuminate\Support\Facades\Facade;

class HotelServiceFacade extends Facade {

    protected static function getFacadeAccessor() {
        //dd('Inside facade');
        return 'HotelService';
    }
}