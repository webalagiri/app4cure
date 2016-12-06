<?php

namespace App\Http\Controllers\Doctor;


use App\prescription\model\entities\Hospital;
use App\prescription\model\entities\HospitalType;
use App\prescription\model\entities\Doctor;
use App\prescription\model\entities\DoctorSpecialty;
use App\prescription\model\entities\Patient;
use App\prescription\model\entities\Countries;
use App\prescription\model\entities\States;
use App\prescription\model\entities\Cities;
use App\prescription\model\entities\Areas;
use App\prescription\model\entities\DoctorAppointments;


use App\prescription\common\ResponseJson;
use App\prescription\common\UserSession;
use App\prescription\facades\HospitalServiceFacade;
use App\prescription\utilities\ErrorEnum\ErrorEnum;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\prescription\services\HospitalService;
use App\prescription\utilities\Exception\HospitalException;
use App\prescription\services\DoctorService;
use App\prescription\utilities\Exception\DoctorException;

use App\prescription\utilities\Exception\AppendMessage;
use App\prescription\utilities\UserType;
use App\prescription\mapper\PatientPrescriptionMapper;

use App\Http\Requests\DoctorRegisterRequest;
use App\Http\Requests\DoctorLoginRequest;

use Log;
use Input;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Http\ViewModels\PatientPrescriptionViewModel;

class DoctorController extends Controller
{
    protected $doctorService;

    public function __construct(DoctorService $doctorService) {
        $this->doctorService = $doctorService;
    }

    //App4Cure


    public function getCountry()
    {
        $country = null;

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
        $state = null;

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
        //dd($city);
        return $city;
    }


    public function getArea()
    {
        $area = null;

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
        //dd($area);
        return $area;
    }

    public function getHospital()
    {
        $hospital = null;

        try
        {
            $hospital = Hospital::get();
        }
        catch(HelperException $hospitalExc)
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

        return $hospital;
    }


    public function getDoctorSpecialty()
    {
        $doctorSpecialty = null;

        try
        {
            //$cities = $helperService->getCities();
            $doctorSpecialty = DoctorSpecialty::get();
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
        //dd($doctorSpecialty);
        return $doctorSpecialty;
    }

    public function doctorList()
    {

        $doctor = null;

        try
        {
            $doctor = $this->doctorService->doctorList();
            $specialityInfo = $this->getDoctorSpecialty();
            $hospitalInfo = $this->getHospital();
            //dd($doctor);
        }
        catch(DoctorException $profileExc)
        {
            //dd($hospitalExc);
            $errorMsg = $profileExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($profileExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            //dd($exc);
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

        return view('portal.doctor',compact('doctor','specialityInfo','hospitalInfo'));

    }


    public function doctorAddToCart(Request $doctorCart)
    {
        $status =  true;
        //dd($doctorCart->all());
        $doctorCartInfo = $doctorCart->all();
        //return view('portal.laboratory',compact('laboratory'));

        try
        {

        $customerId = Auth::user()->id;

        $DoctorAppointments = new DoctorAppointments;

        $DoctorAppointments->doctor_id = $doctorCartInfo['schedule_doctor_id'];
        $DoctorAppointments->hospital_id = $doctorCartInfo['schedule_hospital_id'];
        $DoctorAppointments->customer_id = $customerId;
        $DoctorAppointments->schedule_id = $doctorCartInfo['schedule_id'];
        $DoctorAppointments->appointment_date_time = $doctorCartInfo['doctor_tests_date'];
        $DoctorAppointments->appointment_note = $doctorCartInfo['doctor_tests_notes'];
        $DoctorAppointments->appointment_cost = $doctorCartInfo['doctor_appointment_cost'];
        $DoctorAppointments->appointment_status = "1";
        $DoctorAppointments->created_by = "Admin";
        $DoctorAppointments->updated_by = "Admin";
        $DoctorAppointments->created_at = date("Y-m-d H:i:s");
        $DoctorAppointments->updated_at = date("Y-m-d H:i:s");
        $DoctorAppointments->save();

            $appointmentId = $DoctorAppointments->id;

            if($appointmentId>0)
            {
                $msg="Appointment Added Successfully";
                return redirect('doctor/appointment/'.$appointmentId)->with('message',$msg);
            }


            //dd($DoctorAppointments->id);
            /*
            $status = $this->labService->laboratoryAddToCart($doctorCartInfo);
            if($status)
            {
                $laboratory = $this->labService->laboratoryList();

                $msg="Tests Added to Cart";
                return redirect('laboratory/cart')->with('message',$msg);

                //return view('portal.laboratory',compact('laboratory'));
            }*/
            //dd($laboratory);
        }
        catch(LabException $profileExc)
        {
            //dd($hospitalExc);
            $errorMsg = $profileExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($profileExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            //dd($exc);
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

        //return view('portal.doctor',compact('laboratory'));

        //return $patients;
    }


    public function doctorAppointmentConfirm($appointmentId)
    {
        //dd($appointmentId);
        $doctorAppointmentInfo = DoctorAppointments::where('id','=',$appointmentId)->first();
        //dd($doctorAppointmentInfo);
        return view('portal.doctor-cart',compact('doctorAppointmentInfo'));
    }


/*
    public function laboratoryCart()
    {


        $laboratory = null;
        //return view('portal.laboratory',compact('laboratory'));

        try
        {
            $laboratory = $this->labService->laboratoryCart();
            //dd($laboratory);
        }
        catch(LabException $profileExc)
        {
            //dd($hospitalExc);
            $errorMsg = $profileExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($profileExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            //dd($exc);
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

        return view('portal.laboratory-cart',compact('laboratory'));

        //return $patients;
    }


    public function laboratoryConfirm()
    {


        $laboratory = null;
        //return view('portal.laboratory',compact('laboratory'));

        try
        {
            $laboratory = $this->labService->laboratoryConfirm();
            dd($laboratory);
        }
        catch(LabException $profileExc)
        {
            //dd($hospitalExc);
            $errorMsg = $profileExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($profileExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            //dd($exc);
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

        return view('portal.laboratory-cart',compact('laboratory'));

        //return $patients;
    }
*/

    public function doctorListAdmin()
    {

        $doctorInfo = null;

        try
        {
            $doctorInfo = $this->doctorService->doctorList();
            $specialityInfo = $this->getDoctorSpecialty();
            $countryInfo = $this->getCountry();
            $stateInfo = $this->getState();
            $cityInfo = $this->getCity();
            $areaInfo = $this->getArea();
        }
        catch(DoctorException $profileExc)
        {
            //dd($profileExc);
            $errorMsg = $profileExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($profileExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            //dd($exc);
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }
        //dd($doctorInfo);
        //dd($specialityInfo);
        return view('admi.portal.doctor',compact('doctorInfo','specialityInfo','countryInfo','stateInfo','cityInfo','areaInfo'));

    }

    public function doctorAddAdmin()
    {

        $countryInfo = null;
        $stateInfo = null;
        $cityInfo = null;
        $areaInfo = null;
        $doctorSpecialtyInfo = null;

        try
        {

            $countryInfo = $this->getCountry();
            $stateInfo = $this->getState();
            $cityInfo = $this->getCity();
            $areaInfo = $this->getArea();
            $doctorSpecialtyInfo = $this->getDoctorSpecialty();



            //dd($laboratory);
        }
        catch(LabException $profileExc)
        {
            //dd($hospitalExc);
            $errorMsg = $profileExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($profileExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            //dd($exc);
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

        //dd($areaInfo);
        //dd($doctorSpecialtyInfo);
        return view('admi.portal.doctor-add',compact('countryInfo','stateInfo','cityInfo','areaInfo','doctorSpecialtyInfo'));

        //return $patients;
    }


    public function doctorSaveAdmin(DoctorRegisterRequest $doctorRequest)
    {
        $doctorInfo = $doctorRequest->all();
        //dd($doctorRequest->all());

        try
        {
            $status = HospitalServiceFacade::registerNewDoctor($doctorInfo);


        }
        catch(DoctorException $profileExc)
        {
            //dd($hospitalExc);
            $errorMsg = $profileExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($profileExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            //dd($exc);
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

        //dd($status);
        //return $status;

        $msg="Doctor Added Successfully";
        return redirect('admin/doctor/add')->with('message',$msg);

    }

    public function doctorUpdateAdmin(Request $doctorProfileInfo)
    {
        $status =  true;
        $doctorProfileInfoValue = $doctorProfileInfo->all();
        //dd($doctorProfileInfoValue);

        $doctorAreaInfo = Areas::find($doctorProfileInfoValue['area']);

        $laboratoryInfo = Lab::where('doctor_id','=',$doctorProfileInfoValue['doctor_id'])->first();

        $laboratoryInfo->doctor_name = $doctorProfileInfoValue['doctor_name'];
        $laboratoryInfo->telephone = $doctorProfileInfoValue['telephone'];
        $laboratoryInfo->email = $doctorProfileInfoValue['email'];
        $laboratoryInfo->country = $doctorProfileInfoValue['country'];
        $laboratoryInfo->state = $doctorProfileInfoValue['state'];
        $laboratoryInfo->city = $doctorProfileInfoValue['city'];
        $laboratoryInfo->area = $doctorProfileInfoValue['area'];
        $laboratoryInfo->pincode = $doctorAreaInfo['area_pincode'];
        $laboratoryInfo->updated_by = "Admin";
        $laboratoryInfo->updated_at = date("Y-m-d H:i:s");
        $laboratoryInfo->save();


        return redirect('admin/doctor');
        //return view('portal.customer-update-profile',compact('patientInfo','countryInfo','stateInfo','cityInfo','areaInfo'));
    }


    public function dashboard()
    {
        return view('doctor.portal.dashboard');
    }


}
