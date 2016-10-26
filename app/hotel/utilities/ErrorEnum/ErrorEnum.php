<?php
namespace App\hotel\utilities\ErrorEnum;

use MyCLabs\Enum\Enum;

class ErrorEnum extends Enum{

    const SUCCESS = 1;
    const FAILURE = 0;
    const UNKNOWN_ERROR = 100;

    //const USER_NOT_FOUND_ERROR = 101;
    
    //Doctor Error code 101 - 150

    const HOTEL_LIST_ERROR = 101;
    const HOTEL_LIST_SUCCESS = 102;

    //Appointments
    const APPOINTMENT_LIST_ERROR = 105;
    const APPOINTMENT_LIST_SUCCESS = 106;

    //User Login 160 - 170

    const USER_LOGIN_SUCCESS = 160;


    //Helper constants 211 to 220
    const CITIES_LIST_ERROR = 211;


}
