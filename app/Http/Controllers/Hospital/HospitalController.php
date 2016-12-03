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
use App\prescription\model\entities\DoctorHospital;
use App\prescription\model\entities\DoctorSchedule;


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

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;


use Auth;
use Session;
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

  //ADMIN
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



    //DOCTOR


    public function hospitalListDoctor()
    {

        $hospitalInfo = null;

        try
        {
            //$hospitalInfo = $this->hospitalService->hospitalList();

            $doctorId = Auth::user()->id;
            $query = DB::table('hospital as h')->join('users as u', 'u.id', '=', 'h.hospital_id');
            $query->join('hospital_type as ht', 'ht.id', '=', 'h.hospital_type_id');
            $query->join('countries as hc', 'hc.id', '=', 'h.country');
            $query->join('states as hs', 'hs.id', '=', 'h.state');
            $query->join('cities as hct', 'hct.id', '=', 'h.city');
            $query->join('areas as ha', 'ha.id', '=', 'h.area');
            $query->join('doctor_hospital_link as dhl', 'dhl.hospital_id', '=', 'h.hospital_id');
            $query->where('dhl.doctor_id', '=', $doctorId);
            $query->select('h.*', 'ht.name as hospital_type',
                'ha.area_name as hospital_area','hct.city_name as hospital_city',
                'hs.name as hospital_state','hc.name as hospital_country',
                'u.name as user_name', 'u.email as user_email');

            //dd($query->toSql());
            $hospitalInfo = $query->get();

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

        return view('doctor.portal.hospital',compact('hospitalInfo','countryInfo','stateInfo','cityInfo','areaInfo'));

    }

    public function hospitalAddDoctor()
    {

        $countryInfo = null;
        $stateInfo = null;
        $cityInfo = null;
        $areaInfo = null;
        $hospitalTypeInfo = null;

        try
        {

            $hospitalInfo = $this->hospitalService->hospitalList();


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

        return view('doctor.portal.hospital-add',compact('countryInfo','stateInfo','cityInfo','areaInfo','hospitalTypeInfo','hospitalInfo'));

    }


    public function hospitalSaveDoctor(Request $hospitalRequest)
    {
        $doctorId = Auth::user()->id;
        $hospitalInfo = $hospitalRequest->get('hospital');
        //dd($hospitalInfo);

        try
        {

            foreach($hospitalInfo as $hospitalId)
            {

                $DoctorHospitalLink = DoctorHospital::where('doctor_id','=',$doctorId)->where('hospital_id','=',$hospitalId)->first();
                if(is_null($DoctorHospitalLink))
                {
                    $DoctorHospitalLink = new DoctorHospital();
                    $DoctorHospitalLink->doctor_id = $doctorId;
                    $DoctorHospitalLink->hospital_id = $hospitalId;
                    $DoctorHospitalLink->status = "1";
                    $DoctorHospitalLink->save();
                }

            }

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

        $msg="Hospital Added Successfully";
        return redirect('doctor/hospital')->with('message',$msg);

    }

    public function hospitalRemoveDoctor($hospitalId)
    {
        $status =  true;
        $doctorId = Auth::user()->id;

        try
        {

            $DoctorHospitalLink = DoctorHospital::where('doctor_id','=',$doctorId)->where('hospital_id','=',$hospitalId)->delete();

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


        $msg="Hospital Removed Successfully";
        return redirect('doctor/hospital')->with('message',$msg);

    }


    //DOCTOR SCHEDULE


    public function scheduleListDoctor()
    {

        $hospitalInfo = null;

        try
        {
            //$hospitalInfo = $this->hospitalService->hospitalList();

            $doctorId = Auth::user()->id;
            $query = DB::table('hospital as h')->join('users as u', 'u.id', '=', 'h.hospital_id');
            $query->join('hospital_type as ht', 'ht.id', '=', 'h.hospital_type_id');
            $query->join('countries as hc', 'hc.id', '=', 'h.country');
            $query->join('states as hs', 'hs.id', '=', 'h.state');
            $query->join('cities as hct', 'hct.id', '=', 'h.city');
            $query->join('areas as ha', 'ha.id', '=', 'h.area');
            $query->join('doctor_schedule as dhs', 'dhs.hospital_id', '=', 'h.hospital_id');
            $query->where('dhs.doctor_id', '=', $doctorId);
            $query->select('h.*', 'ht.name as hospital_type',
                'ha.area_name as hospital_area','hct.city_name as hospital_city',
                'hs.name as hospital_state','hc.name as hospital_country',
                'u.name as user_name', 'u.email as user_email',
                'dhs.id as schedule_id','dhs.schedule_date','dhs.schedule_from_time','dhs.schedule_to_time');




            //dd($query->toSql());
            $hospitalInfo = $query->get();

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

        return view('doctor.portal.schedule',compact('hospitalInfo','countryInfo','stateInfo','cityInfo','areaInfo'));

    }

    public function scheduleAddDoctor()
    {

        $countryInfo = null;
        $stateInfo = null;
        $cityInfo = null;
        $areaInfo = null;
        $hospitalTypeInfo = null;

        try
        {

            $hospitalInfo = $this->hospitalService->hospitalList();


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

        return view('doctor.portal.schedule-add',compact('countryInfo','stateInfo','cityInfo','areaInfo','hospitalTypeInfo','hospitalInfo'));

    }


    public function scheduleSaveDoctor(Request $hospitalRequest)
    {
        $doctorId = Auth::user()->id;
        $hospitalInfo = $hospitalRequest->all();
        //$hospitalInfo = $hospitalRequest->get('hospital');
        //dd($hospitalInfo['hospital']);

        try
        {

            $DoctorHospitalSchedule = new DoctorSchedule();
            $DoctorHospitalSchedule->doctor_id = $doctorId;
            $DoctorHospitalSchedule->hospital_id = $hospitalInfo['hospital'];
            $DoctorHospitalSchedule->schedule_date = $hospitalInfo['schedule_date'];
            $DoctorHospitalSchedule->schedule_from_time = $hospitalInfo['schedule_from_time'];
            $DoctorHospitalSchedule->schedule_to_time = $hospitalInfo['schedule_to_time'];
            $DoctorHospitalSchedule->schedule_count = "100";
            $DoctorHospitalSchedule->schedule_status = "1";
            $DoctorHospitalSchedule->save();

            //$status = HospitalServiceFacade::registerNewHospital($hospitalInfo);
        }
        catch(HospitalException $hospitalExc)
        {
            dd($hospitalExc);
            $errorMsg = $hospitalExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($hospitalExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            dd($exc);
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

        $msg="Schedule Added Successfully";
        return redirect('doctor/schedule')->with('message',$msg);

    }

    public function scheduleRemoveDoctor($scheduleId)
    {
        $status =  true;
        $doctorId = Auth::user()->id;

        try
        {

            $DoctorHospitalSchedule = DoctorSchedule::where('doctor_id','=',$doctorId)->where('id','=',$scheduleId)->delete();

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


        $msg="Schedule Removed Successfully";
        return redirect('doctor/schedule')->with('message',$msg);

    }

}
