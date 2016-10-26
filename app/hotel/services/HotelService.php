<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/8/2016
 * Time: 5:12 PM
 */

namespace App\hotel\services;

use App\hotel\facades\HospitalServiceFacade;
use App\hotel\repositories\repointerface\HotelInterface;
use App\hotel\utilities\Exception\HotelException;
use App\hotel\utilities\ErrorEnum\ErrorEnum;
use Illuminate\Support\Facades\DB;

use Exception;


class HotelService {

    protected $hotelRepo;

    public function __construct(HotelInterface $hotelRepo)
    {
        //dd('Inside constructor');
        $this->hotelRepo = $hotelRepo;
    }

    /**
     * Get list of hotels
     * @param none
     * @throws $hotelException
     * @return array | null
     * @author Vimal
     */

    public function getHotels()
    {
        $hotels = null;

        try
        {
            $hotels = $this->hotelRepo->getHotels();
        }
        catch(HotelException $hotelExc)
        {
            throw $hotelExc;
        }
        catch(Exception $exc)
        {
            throw new HotelException(null, ErrorEnum::HOTEL_LIST_ERROR, $exc);
        }

        return $hotels;
    }

}