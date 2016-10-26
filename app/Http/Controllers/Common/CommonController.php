<?php

namespace App\Http\Controllers\Common;

use App\hotel\services\HelperService;
use App\hotel\services\HotelService;
use App\hotel\facades\HotelServiceFacade;
use App\hotel\utilities\Exception\HelperException;
use App\hotel\utilities\Exception\HotelException;
use App\hotel\utilities\Exception\AppendMessage;
use App\hotel\common\ResponseJson;
use App\hotel\utilities\ErrorEnum\ErrorEnum;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Log;
use Exception;

class CommonController extends Controller
{
    protected $hotelService;

    public function __construct(HotelService $hotelService)
    {
        $this->hotelService = $hotelService;
    }


    public function getCities(HelperService $helperService)
    {
        $cities = null;

        try
        {
            $cities = $helperService->getCities();
        }
        catch(HelperException $cityExc)
        {
            $errorMsg = $cityExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($cityExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

        return $cities;
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
            $hotels = HotelServiceFacade::getHotels();
            //$result['hospitals'] = $hospitals;
            //$msg = trans('messages.SupportTeam');
            //dd($msg);
            //$hotelsResult = new ResponseJson(ErrorEnum::SUCCESS, trans('messages.'.ErrorEnum::HOTEL_LIST_SUCCESS));
            //$hotelsResult->setObj($hotels);
            //return $hotelsResult;
            //dd($prescriptionResult);
            //dd(json_encode($prescriptionResult));
            //array2json($hospitals);
        }
        catch(HotelException $hotelExc)
        {
            //dd($hospitalExc);
            $prescriptionResult = new ResponseJson(ErrorEnum::SUCCESS, trans('messages.'.ErrorEnum::HOTEL_LIST_ERROR));
            $errorMsg = $hotelExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($hotelExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            //dd($exc);
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

        return view('portal.hotels-list',compact('hotels'));

    }

    public function getHotelsAPI()
    {
        $hotels = null;

        try
        {
            $hotels = HotelServiceFacade::getHotels();
            //$result['hospitals'] = $hospitals;
            //$msg = trans('messages.SupportTeam');
            //dd($msg);
            $hotelsResult = new ResponseJson(ErrorEnum::SUCCESS, trans('messages.'.ErrorEnum::HOTEL_LIST_SUCCESS));
            $hotelsResult->setObj($hotels);

            //dd($prescriptionResult);
            //dd(json_encode($prescriptionResult));
            //array2json($hospitals);
        }
        catch(HotelException $hotelExc)
        {
            //dd($hotelExc);
            //$hotelsResult = new ResponseJson(ErrorEnum::SUCCESS, trans('messages.'.ErrorEnum::HOTEL_LIST_ERROR));
            //$errorMsg = $hotelExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($hotelExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            //dd($exc);
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

        return $hotelsResult;
    }


}
