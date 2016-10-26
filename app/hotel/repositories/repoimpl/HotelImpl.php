<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/8/2016
 * Time: 5:09 PM
 */

namespace App\hotel\repositories\repoimpl;

use App\Http\ViewModels\HotelViewModel;
use App\hotel\model\entities\Hotel;
use App\hotel\repositories\repointerface\HotelInterface;
use App\hotel\utilities\ErrorEnum\ErrorEnum;
use App\hotel\utilities\Exception\HospitalException;

use App\prescription\utilities\UserType;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Exception;


class HotelImpl implements HotelInterface{

    /**
     * Get list of hospitals
     * @param none
     * @throws $hospitalException
     * @return array | null
     * @author Baskar
     */

    public function getHotels()
    {
        $hospitals = null;

        try
        {
            /*
            $query = DB::table('hotel as h')->select('h.id', 'h.hotel_id', 'h.hotel_name');
            $query->join('users as u', 'u.id', '=', 'h.hotel_id');
            $query->where('u.delete_status', '=', 1);
            */

            $query = DB::table('hotel as h');
            $hotels = $query->get();

        }
        catch(QueryException $queryEx)
        {
            throw new HotelException(null, ErrorEnum::HOTEL_LIST_ERROR, $queryEx);
        }
        catch(Exception $exc)
        {
            throw new HotelException(null, ErrorEnum::HOTEL_LIST_ERROR, $exc);
        }

        return $hotels;
    }

}