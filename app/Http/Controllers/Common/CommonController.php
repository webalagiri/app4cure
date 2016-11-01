<?php

namespace App\Http\Controllers\Common;

use App\prescription\services\HelperService;
use App\prescription\services\HospitalService;
use App\prescription\facades\HospitalServiceFacade;
use App\prescription\utilities\Exception\HelperException;
use App\prescription\utilities\Exception\HospitalException;
use App\prescription\utilities\Exception\AppendMessage;
use App\prescription\common\ResponseJson;
use App\prescription\utilities\ErrorEnum\ErrorEnum;

use Illuminate\Http\Request;
use App\Http\Requests\NewPatientRequest;
use App\Http\Requests\PatientRegisterRequest;
use App\Http\Requests\PatientLoginRequest;
use App\Http\Requests\ForgotLoginRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Log;
use Exception;

class CommonController extends Controller
{
    protected $hospitalService;

    public function __construct(HospitalService $hospitalService)
    {
        $this->hospitalService = $hospitalService;
    }

    /**
     * Get list of hospitals by keyword
     * @param $keyword
     * @throws $hospitalException
     * @return array | null
     * @author Baskar
     */

    public function getHospitalByKeyword($keyword = null)
    {
        $hospitals = null;
        $hospitalsList = null;

        try
        {
            //dd('Inside doctor');
            //$hospitals = HospitalServiceFacade::getHospitals();
            $hospitals = $this->hospitalService->getHospitals();
            $hospitalsList = new ResponseJson(ErrorEnum::SUCCESS, trans('messages.'.ErrorEnum::HOSPITAL_LIST_SUCCESS));
            $hospitalsList->setObj($hospitals);
            //return $prescriptionResult;
            //dd($prescriptionResult);
        }
        catch(HospitalException $hospitalExc)
        {
            //dd($hospitalExc);
            $prescriptionResult = new ResponseJson(ErrorEnum::FAILURE, trans('messages.'.ErrorEnum::HOSPITAL_LIST_ERROR));
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

        return $hospitalsList;
    }

    /**
     * Get profile of patient
     * @param $patientId
     * @throws $hospitalException
     * @return array | null
     * @author Baskar
     */

    public function getPatientProfile($patientId)
    {
        $patientProfile = null;

        try
        {
            $patientProfile = $this->hospitalService->getPatientProfile($patientId);
            //dd($patientProfile);
        }
        catch(HospitalException $hospitalExc)
        {
            //dd($hospitalExc);
            $prescriptionResult = new ResponseJson(ErrorEnum::FAILURE, trans('messages.'.ErrorEnum::HOSPITAL_LIST_ERROR));
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

        return $patientProfile;
    }

    /**
     * Get profile of patient
     * @param $patientId
     * @throws $hospitalException
     * @return array | null
     * @author Baskar
     */

    public function searchPatientByPid(Request $patientPidRequest)
    {
        $patient = null;
        $pid = $patientPidRequest->get('pid');
        //return $pid;

        try
        {
            $patient = $this->hospitalService->searchPatientByPid($pid);
        }
        catch(HospitalException $hospitalExc)
        {
            //$jsonResponse = new ResponseJson(ErrorEnum::FAILURE, trans('messages.'.ErrorEnum::PATIENT_LIST_ERROR));
            $errorMsg = $hospitalExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($hospitalExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            //dd($exc);
            //$jsonResponse = new ResponseJson(ErrorEnum::FAILURE, trans('messages.'.ErrorEnum::PATIENT_LIST_ERROR));
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }


        return $patient;
    }

    /* Get all the cities
     * @params none
     * @throws HelperException
     * @return array | null
     * @author Baskar
     */

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


    public function registerFormPatient()
    {
        return view('portal.customer-register');
    }

    public function registerNewPatient(PatientRegisterRequest $patientRequest)
    {

        $status =  true;
        $patientInfo = $patientRequest->all();
        //dd($patientInfo);

        try
        {
            //$status =  true;
            // $patientInfo = $patientRequest->all();

            $status = HospitalServiceFacade::registerNewPatient($patientInfo);
            if($status)
            {
                // dd("Saved successfully");
                $sucmsg="Registration Done Successfully! Now you can login.";
                return redirect('user/login')->with('success',$sucmsg);
                /*$msg = trans('messages.'.ErrorEnum::NEW_PATIENT_ADD_SUCCESS);
                $savesuccess = Config::get('toastr.savesuccess');
                Toastr::success($msg, $title = 'PROFILE', $savesuccess);*/
            }
            $msg="Register Details Invalid! Try Again.";
            return redirect('user/login')->with('message',$msg);

        }
        catch (HospitalException $userExc) {
            $errorMsg = $userExc->getMessageForCode();
            //$msg = AppendMessage::appendMessage($userExc);
            //Log::error($msg);
            $msg="Register Details Invalid! Try Again.";
            return redirect('user/login')->with('message',$msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
            /*return Response::json(array(
                        'success' => false,
                        'data' => $errorMsg), '200'
            );*/
        } catch (Exception $ex) {
            //throw $ex;
            //$msg = AppendMessage::appendGeneralException($ex);
            $msg="Register Details Invalid! Try Again.";
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
    }
}
