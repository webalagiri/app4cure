<?php

namespace App\Http\Controllers\Hospital;

use App\prescription\model\entities\Hospital;
use App\prescription\model\entities\HospitalType;
use App\prescription\model\entities\LabTest;
use App\prescription\model\entities\Patient;
use App\prescription\model\entities\Countries;
use App\prescription\model\entities\States;
use App\prescription\model\entities\Cities;
use App\prescription\model\entities\Areas;


use App\prescription\mapper\LabMapper;

use App\prescription\services\HelperService;
use App\prescription\services\HospitalService;
use App\prescription\facades\HospitalServiceFacade;
use App\prescription\services\LabService;
use App\prescription\services\CommonService;
use App\prescription\utilities\Exception\LabException;
use App\prescription\utilities\Exception\AppendMessage;
use Illuminate\Http\Request;



use App\Http\Requests;
use App\Http\Requests\HospitalRegisterRequest;


use App\Http\Controllers\Controller;

use Exception;
use Log;

class HospitalController extends Controller
{
    protected $hospitalService;

    public function __construct(HospitalService $hospitalService)
    {
        $this->hospitalService = $hospitalService;
    }



    public function getCountry()
    {
        $cities = null;

        try
        {
            $country = Countries::get();
        }
        catch(HelperException $countryExc)
        {
            $errorMsg = $countryExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($countryExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

        return $country;
    }


    public function getState()
    {
        $cities = null;

        try
        {
            $state = States::get();
        }
        catch(HelperException $stateExc)
        {
            $errorMsg = $stateExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($stateExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

        return $state;
    }


    public function getCity()
    {
        $cities = null;

        try
        {
            $city = Cities::get();
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

        return $city;
    }


    public function getArea()
    {
        $cities = null;

        try
        {
            $area = Areas::get();
        }
        catch(HelperException $areaExc)
        {
            $errorMsg = $areaExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($areaExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

        return $area;
    }


    public function getHospitalType()
    {
        $cities = null;

        try
        {
            //$cities = $helperService->getCities();
            $area = HospitalType::get();
        }
        catch(HospitalException $hospitalExc)
        {
            $errorMsg = $hospitalExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($hospitalExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

        return $area;
    }


    public function hospitalList()
    {

        $hospitals = null;

        try
        {
            $hospitals = $this->hospitalService->hospitalList();

        }
        catch(HospitalException $hospitalExc)
        {
            //dd($hospitalExc);
            $errorMsg = $hospitalExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($hospitalExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            //dd($exc);
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

        return view('portal.hospital',compact('hospital'));

    }


    public function hospitalListAdmin()
    {

        $hospitalInfo = null;

        try
        {
            $hospitalInfo = $this->hospitalService->hospitalList();

            $countryInfo = $this->getCountry();
            $stateInfo = $this->getState();
            $cityInfo = $this->getCity();
            $areaInfo = $this->getArea();

        }
        catch(HospitalException $hospitalExc)
        {
            //dd($hospitalExc);
            $errorMsg = $hospitalExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($hospitalExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            //dd($exc);
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

        return view('admi.portal.hospital',compact('hospitalInfo','countryInfo','stateInfo','cityInfo','areaInfo'));

    }

    public function hospitalAddAdmin()
    {

        $countryInfo = null;
        $stateInfo = null;
        $cityInfo = null;
        $areaInfo = null;
        $hospitalTypeInfo = null;

        try
        {

            $countryInfo = $this->getCountry();
            $stateInfo = $this->getState();
            $cityInfo = $this->getCity();
            $areaInfo = $this->getArea();
            $hospitalTypeInfo = $this->getHospitalType();

        }
        catch(HospitalException $hospitalExc)
        {
            //dd($hospitalExc);
            $errorMsg = $hospitalExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($hospitalExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            //dd($exc);
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

        return view('admi.portal.hospital-add',compact('countryInfo','stateInfo','cityInfo','areaInfo','hospitalTypeInfo'));

    }


    public function hospitalSaveAdmin(HospitalRegisterRequest $hospitalRequest)
    {
        $hospitalInfo = $hospitalRequest->all();
        //dd($hospitalInfo);

        try
        {
            $status = HospitalServiceFacade::registerNewHospital($hospitalInfo);
        }
        catch(HospitalException $hospitalExc)
        {
            //dd($hospitalExc);
            $errorMsg = $hospitalExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($hospitalExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            //dd($exc);
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

        $msg="Hospital Added Successfully";
        return redirect('admin/hospital/add')->with('message',$msg);

    }

    public function hospitalUpdateAdmin(Request $hospitalProfileInfo)
    {
        $status =  true;
        $hospitalProfileInfoValue = $hospitalProfileInfo->all();
        //dd($hospitalProfileInfoValue);

        try
        {

            $hospitalAreaInfo = Areas::find($hospitalProfileInfoValue['area']);

            $hospitalInfo = Hospital::where('hospital_id','=',$hospitalProfileInfoValue['hospital_id'])->first();

            $hospitalInfo->hospital_name = $hospitalProfileInfoValue['hospital_name'];
            $hospitalInfo->telephone = $hospitalProfileInfoValue['telephone'];
            $hospitalInfo->email = $hospitalProfileInfoValue['email'];
            $hospitalInfo->country = $hospitalProfileInfoValue['country'];
            $hospitalInfo->state = $hospitalProfileInfoValue['state'];
            $hospitalInfo->city = $hospitalProfileInfoValue['city'];
            $hospitalInfo->area = $hospitalProfileInfoValue['area'];
            $hospitalInfo->pincode = $hospitalAreaInfo['area_pincode'];
            $hospitalInfo->updated_by = "Admin";
            $hospitalInfo->updated_at = date("Y-m-d H:i:s");
            $hospitalInfo->save();


            //$status = HospitalServiceFacade::registerNewHospital($hospitalInfo);
        }
        catch(HospitalException $hospitalExc)
        {
            //dd($hospitalExc);
            $errorMsg = $hospitalExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($hospitalExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            //dd($exc);
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }


        return redirect('admin/hospital');
        //return view('portal.customer-update-profile',compact('patientInfo','countryInfo','stateInfo','cityInfo','areaInfo'));
    }

}
