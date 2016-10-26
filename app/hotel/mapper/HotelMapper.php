<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/2/2016
 * Time: 3:33 PM
 */

namespace App\hotel\mapper;

use App\Http\ViewModels\HotelViewModel;
use Illuminate\Http\Request;

//use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HotelMapper
{
    public static function setHotelDetails($hotelRequest)
    {
        $hotelVM = new HotelViewModel();
        $userName = Session::get('DisplayName');
        $hotelVM->setHotelId(Auth::user()->id);
        $hotelVM->setName($hotelRequest['hotel_name']);
        $hotelVM->setAddress($hotelRequest['address']);
        $hotelVM->setCity($hotelRequest['city']);
        $hotelVM->setCountry($hotelRequest['country']);
        $hotelVM->setTelephone($hotelRequest['telephone']);
        $hotelVM->setEmail($hotelRequest['email']);
        $hotelVM->setHotelLogo($hotelRequest['hotellogo']);
        $hotelVM->setHotelPhoto($hotelRequest['hotelphoto']);
        $hotelVM->setCreatedBy($userName);
        $hotelVM->setUpdatedBy($userName);
        $hotelVM->setCreatedAt(date("Y-m-d H:i:s"));
        $hotelVM->setUpdatedAt(date("Y-m-d H:i:s"));

        return $hotelVM;
    }
}