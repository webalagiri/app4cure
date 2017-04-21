<?php

namespace App\Http\Controllers\Lab;

use App\prescription\model\entities\Lab;
use App\prescription\model\entities\LabTest;
use App\prescription\model\entities\LabTestLink;
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
use App\prescription\common\ResponseJson;
use App\prescription\utilities\ErrorEnum\ErrorEnum;
use App\prescription\utilities\Exception\LabException;
use App\prescription\utilities\Exception\AppendMessage;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

use App\Http\Requests;
use App\Http\Requests\LabRegisterRequest;

use App\Http\Controllers\Controller;

use Auth;
use Session;
use Exception;
use Log;

class LabController extends Controller
{
    protected $labService;

    public function __construct(LabService $labService)
    {
        $this->labService = $labService;
    }



    public function getCountry()
    {
        $cities = null;

        try
        {
            //$cities = $helperService->getCities();
            $country = Countries::get();

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

        return $country;
    }


    public function getState()
    {
        $cities = null;

        try
        {
            //$cities = $helperService->getCities();
            $state = States::get();
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

        return $state;
    }


    public function getCity()
    {
        $cities = null;

        try
        {
            //$cities = $helperService->getCities();
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
            //$cities = $helperService->getCities();
            $area = Areas::get();
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

        return $area;
    }


    public function getLabTest()
    {
        $labtest = null;

        try
        {
            //$cities = $helperService->getCities();
            $labtest = LabTest::get();

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

        return $labtest;
    }


    public function mobilegetLabTest()
    {
        $labtest = null;

        try
        {
            //$cities = $helperService->getCities();
            $labtest = LabTest::get();

            $msg="Get Lab Test Success";
            $jsonResponse = new ResponseJson(ErrorEnum::SUCCESS, $msg);
            $jsonResponse->setObj($labtest);


        }
        catch(HelperException $cityExc)
        {
            $errorMsg = $cityExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($cityExc);
            Log::error($msg);
            $jsonResponse = new ResponseJson(ErrorEnum::FAILURE, $msg);
        }
        catch(Exception $exc)
        {
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
            $jsonResponse = new ResponseJson(ErrorEnum::FAILURE, $msg);
        }

        return $jsonResponse;
    }

    /**
     * Get the profile of the lab
     * @param $labId
     * @throws $labException
     * @return array | null
     * @author Baskar
     */

    public function getProfile($labId)
    {
        $labProfile = null;
        //dd('Inside get profile function in lab controller');

        try
        {
            $labProfile = $this->labService->getProfile($labId);
            //dd($labProfile);
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

        return view('portal.lab-profile',compact('labProfile'));

        //return $labProfile;
    }

    /**
     * Get the profile of the lab
     * @param $labId
     * @throws $labException
     * @return array | null
     * @author Vimal
     */

    public function editProfile($labId, HelperService $helperService)
    {
        $labProfile = null;
        $cities = null;
        //dd('Inside get profile function in lab controller');

        try
        {
            $labProfile = $this->labService->getProfile($labId);
            $cities = $helperService->getCities();
            //dd($cities);
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

        return view('portal.lab-editprofile',compact('labProfile','cities'));

        //return $labProfile;
    }

    /**
     * Get the profile of the lab
     * @param $labId
     * @throws $labException
     * @return array | null
     * @author Vimal
     */

    public function editChangePassword($labId)
    {
        $labProfile = null;
        //dd('Inside get profile function in lab controller');

        try
        {
           // $labProfile = $this->labService->getProfile($labId);
            //dd($labProfile);
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

        return view('portal.lab-changepassword');

        //return $labProfile;
    }

    /**
     * Get the list of patients for the selected lab
     * @param $labId, $hospitalId
     * @throws $labException
     * @return array | null
     * @author Baskar
     */

    public function getPatientListForLab($labId, $hospitalId)
    {
        $patients = null;

        try
        {
            $patients = $this->labService->getPatientListForLab($labId, $hospitalId);
            //dd($patients);
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

        return view('portal.lab-patients',compact('patients'));

        //return $patients;
    }

    /**
     * Get the list of lab tests for the selected lab
     * @param $labId, $hospitalId
     * @throws $labException
     * @return array | null
     * @author Baskar
     */

    public function getTestsForLab($labId, $hospitalId)
    {
        $labTests = null;

        try
        {
            $labTests = $this->labService->getTestsForLab($labId, $hospitalId);
            //dd($labTests);
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

        return view('portal.lab-labtest',compact('labTests'));

        //return $labTests;

    }

    /**
     * Get lab tests by LID
     * @param $lid
     * @throws $labException
     * @return array | null
     * @author Baskar
     */

    public function getLabTestsByLid(Request $lidRequest)
    {
        $labTests = null;
        //dd('Inside labtests by lid');
        $lid = $lidRequest->get('lid');
        //dd($lid);
        try
        {
            $labTests = $this->labService->getLabTestsByLid($lid);
            //dd($labTests);

        }
        catch(LabException $labExc)
        {
            //$jsonResponse = new ResponseJson(ErrorEnum::FAILURE, trans('messages.'.ErrorEnum::PRESCRIPTION_DETAILS_ERROR));
            $errorMsg = $labExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($labExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            //dd($exc);
            //$jsonResponse = new ResponseJson(ErrorEnum::FAILURE, trans('messages.'.ErrorEnum::PRESCRIPTION_DETAILS_ERROR));
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

       // return $labTests;

        return view('portal.lab-labtest',compact('labTests'));

        //return $labTests;
    }

    /**
     * Get lab test details for the given lab test id
     * @param $labTestId
     * @throws $labException
     * @return array | null
     * @author Baskar
     */

    public function getLabTestDetails(HospitalService $hospitalService, $labTestId)
    {
        $labTestDetails = null;
        //dd('Inside prescription details');

        try
        {
            $labTestDetails = $hospitalService->getLabTestDetails($labTestId);
            //dd($labTestDetails);

        }
        catch(LabException $labExc)
        {
            //$jsonResponse = new ResponseJson(ErrorEnum::FAILURE, trans('messages.'.ErrorEnum::PRESCRIPTION_DETAILS_ERROR));
            $errorMsg = $labExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($labExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            //dd($exc);
            //$jsonResponse = new ResponseJson(ErrorEnum::FAILURE, trans('messages.'.ErrorEnum::PRESCRIPTION_DETAILS_ERROR));
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

        return view('portal.lab-labtest-details',compact('labTestDetails'));
    }

    /**
     * Edit Lab Details
     * @param $labRequest
     * @throws $labException
     * @return true | false
     * @author Baskar
     */

    public function editLab(Request $labRequest)
    {
        $labVM = null;
        $status = true;
        $message = null;
        //$string = ""

        try
        {
            //dd('Inside edit lab');
            /*
            $lab = array('lab_name' => 'Anderson Diagnostics', 'address' => 'test', 'city' => 15, 'country' => 99,
                'pincode' => '600005' , 'telephone' => '5464645654', 'email' => 'anderson@gmail.com');
            */
            //dd($labRequest);
            //$pharmacyVM = PharmacyMapper::setPhamarcyDetails($pharmacyRequest);
            $labVM = LabMapper::setLabDetails($labRequest);
            //dd($labVM);
            $status = $this->labService->editLab($labVM);
            //dd($status);

            /*if($status)
            {
                //$jsonResponse = new ResponseJson(ErrorEnum::SUCCESS, trans('messages.'.ErrorEnum::PRESCRIPTION_DETAILS_SAVE_SUCCESS));
            }*/

            if($status) {
                $labId=$labVM->getLabId();
                $labProfile = $this->labService->getProfile($labId);
                $message= "Profile Details Updated Successfully";
            }
        }
        catch(LabException $profileExc)
        {
            //dd($profileExc);
            //$jsonResponse = new ResponseJson(ErrorEnum::FAILURE, trans('messages.'.ErrorEnum::PRESCRIPTION_DETAILS_SAVE_ERROR));
            $errorMsg = $profileExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($profileExc);
            Log::error($msg);
            //return $jsonResponse;
        }
        catch(Exception $exc)
        {
            //dd($exc);
            //$jsonResponse = new ResponseJson(ErrorEnum::FAILURE, trans('messages.'.ErrorEnum::PRESCRIPTION_DETAILS_SAVE_ERROR));
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

        return view('portal.lab-profile',compact('labProfile','message'));

        //return $jsonResponse;
    }


    //VIMAL


    public function laboratoryList(Request $requestValue = null)
    {

        $laboratory = null;
        $labtestInfo = null;
        $laboratoryTest = null;
        //return view('portal.laboratory',compact('laboratory'));

        try
        {
            $laboratory = $this->labService->laboratoryList($requestValue);
            foreach($laboratory as $lab)
            {
                //dd($lab->laboratory_id);

                $labId = $lab->laboratory_id;
                $query = DB::table('laboratory_tests as lt');
                $query->join('laboratory_tests_link as ltl', 'ltl.laboratory_tests_id', '=', 'lt.id');
                $query->where('ltl.laboratory_id', '=', $labId);
                $query->select('lt.id as lab_test_name_id','lt.name as lab_test_name',
                    'ltl.laboratory_tests_price as lab_test_price','ltl.id as lab_test_id');

                //dd($query->toSql());
                $labtestInfo = $query->get();
                $laboratoryTest[$labId] = $labtestInfo;

            }
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

        return view('portal.laboratory',compact('laboratory','laboratoryTest'));

        //return $patients;
    }


    public function mobileLaboratoryList(Request $requestValue = null)
    {

        $laboratory = null;
        $labtestInfo = null;
        $laboratoryTest = null;
        //return view('portal.laboratory',compact('laboratory'));

        try
        {
            $laboratory = $this->labService->laboratoryList($requestValue);
            foreach($laboratory as $lab)
            {
                //dd($lab->laboratory_id);

                $labId = $lab->laboratory_id;
                $query = DB::table('laboratory_tests as lt');
                $query->join('laboratory_tests_link as ltl', 'ltl.laboratory_tests_id', '=', 'lt.id');
                $query->where('ltl.laboratory_id', '=', $labId);
                $query->select('lt.id as lab_test_name_id','lt.name as lab_test_name',
                    'ltl.laboratory_tests_price as lab_test_price','ltl.id as lab_test_id');

                //dd($query->toSql());
                $labtestInfo = $query->get();
                $laboratoryTest[$labId]['info'] = $lab;
                $laboratoryTest[$labId]['service'] = $labtestInfo;

            }

            $msg="Fetch Laboratory Lists Success";
            $jsonResponse = new ResponseJson(ErrorEnum::SUCCESS, $msg);
            $jsonResponse->setObj($laboratoryTest);

        }
        catch(LabException $profileExc)
        {
            //dd($hospitalExc);
            $errorMsg = $profileExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($profileExc);
            Log::error($msg);
            $jsonResponse = new ResponseJson(ErrorEnum::FAILURE, $msg);
        }
        catch(Exception $exc)
        {
            //dd($exc);
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
            $jsonResponse = new ResponseJson(ErrorEnum::FAILURE, $msg);
        }

        return $jsonResponse;
        //return view('portal.laboratory',compact('laboratory','laboratoryTest'));

        //return $patients;
    }

    public function laboratoryAddToCart(Request $laboratoryCart)
    {
        $status =  true;
        //dd($laboratoryCart->all());
        $laboratoryCartInfo = $laboratoryCart->all();
        //return view('portal.laboratory',compact('laboratory'));

        try
        {
            $status = $this->labService->laboratoryAddToCart($laboratoryCartInfo);
            if($status)
            {
                //$laboratory = $this->labService->laboratoryList();

                $msg="Tests Added to Cart";
                return redirect('laboratory/cart')->with('message',$msg);

                //return view('portal.laboratory',compact('laboratory'));
            }
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

        //return view('portal.laboratory',compact('laboratory'));

        //return $patients;
    }


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


    public function laboratoryListAdmin(Request $requestValue = null)
    {

        $laboratoryInfo = null;
        //return view('portal.laboratory',compact('laboratory'));

        try
        {
            $laboratoryInfo = $this->labService->laboratoryList($requestValue);

            $countryInfo = $this->getCountry();
            $stateInfo = $this->getState();
            $cityInfo = $this->getCity();
            $areaInfo = $this->getArea();


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

        return view('admi.portal.lab',compact('laboratoryInfo','countryInfo','stateInfo','cityInfo','areaInfo'));

        //return $patients;
    }

    public function laboratoryAddAdmin()
    {

        $countryInfo = null;
        $stateInfo = null;
        $cityInfo = null;
        $areaInfo = null;

        try
        {

            $countryInfo = $this->getCountry();
            $stateInfo = $this->getState();
            $cityInfo = $this->getCity();
            $areaInfo = $this->getArea();
            $labTestInfo = $this->getLabTest();



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

        return view('admi.portal.lab-add',compact('countryInfo','stateInfo','cityInfo','areaInfo','labTestInfo'));

        //return $patients;
    }


    public function laboratorySaveAdmin(LabRegisterRequest $labRequest)
    {
        $labInfo = $labRequest->all();
        //dd($labRequest->all());

        try
        {
            $status = HospitalServiceFacade::registerNewLab($labInfo);


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

        //dd($status);
        //return $status;

        $msg="Lab Added Successfully";
        return redirect('admin/laboratory/add')->with('message',$msg);
        //return view('admi.portal.lab-add',compact('countryInfo','stateInfo','cityInfo','areaInfo','labTestInfo'));

        //return $patients;
    }

    public function laboratoryUpdateAdmin(Request $laboratoryProfileInfo)
    {
        $status =  true;
        $laboratoryProfileInfoValue = $laboratoryProfileInfo->all();
        //dd($laboratoryProfileInfoValue);

        $laboratoryAreaInfo = Areas::find($laboratoryProfileInfoValue['area']);

        $laboratoryInfo = Lab::where('laboratory_id','=',$laboratoryProfileInfoValue['laboratory_id'])->first();

        $laboratoryInfo->laboratory_name = $laboratoryProfileInfoValue['laboratory_name'];
        $laboratoryInfo->telephone = $laboratoryProfileInfoValue['telephone'];
        $laboratoryInfo->email = $laboratoryProfileInfoValue['email'];
        $laboratoryInfo->country = $laboratoryProfileInfoValue['country'];
        $laboratoryInfo->state = $laboratoryProfileInfoValue['state'];
        $laboratoryInfo->city = $laboratoryProfileInfoValue['city'];
        $laboratoryInfo->area = $laboratoryProfileInfoValue['area'];
        $laboratoryInfo->pincode = $laboratoryAreaInfo['area_pincode'];
        $laboratoryInfo->updated_by = "Admin";
        $laboratoryInfo->updated_at = date("Y-m-d H:i:s");
        $laboratoryInfo->save();


        return redirect('admin/laboratory');
        //return view('portal.customer-update-profile',compact('patientInfo','countryInfo','stateInfo','cityInfo','areaInfo'));
    }

    public function dashboard()
    {
        return view('laboratory.portal.dashboard');
    }

    public function labtestListLab()
    {

        $labInfo = null;

        try
        {
            $labId = Auth::user()->id;
            $query = DB::table('laboratory_tests as lt');
            $query->join('laboratory_tests_link as ltl', 'ltl.laboratory_tests_id', '=', 'lt.id');
            $query->where('ltl.laboratory_id', '=', $labId);
            $query->select('lt.name as lab_test_name',
                'ltl.laboratory_tests_price as lab_test_price','ltl.id as lab_test_id');

            //dd($query->toSql());
            $labInfo = $query->get();


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

        return view('laboratory.portal.labtest',compact('labInfo'));

    }


    public function labtestAddLab()
    {

        $labInfoAdded = null;
        $labInfoAddedArray = array();
        $labInfo = null;

        try
        {
            $labId = Auth::user()->id;
            $query = DB::table('laboratory_tests as lt');
            $query->join('laboratory_tests_link as ltl', 'ltl.laboratory_tests_id', '=', 'lt.id');
            $query->where('ltl.laboratory_id', '=', $labId);
            $query->select('lt.id as lab_test_added_id');

            //dd($query->toSql());
            $labInfoAdded = $query->get();

            //dd($labInfoAdded);

            if(count($labInfoAdded)>0)
            {
                foreach($labInfoAdded as $labInfoAddedValue)
                {
                    $labInfoAddedArray[] = $labInfoAddedValue->lab_test_added_id;
                }
            }

            //dd($labInfoAddedArray);

            $query = DB::table('laboratory_tests as lt');
            $query->whereNotIn('lt.id', $labInfoAddedArray);
            $query->select('lt.name as lab_test_name','lt.id as lab_test_id');

            //dd($query->toSql());
            $labInfo = $query->get();

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

        return view('laboratory.portal.labtest-add',compact('labInfo'));

    }


    public function labtestSaveLab(Request $labRequest)
    {
        $labId = Auth::user()->id;
        $labInfo = $labRequest->all();
        //$hospitalInfo = $hospitalRequest->get('hospital');
        //dd($hospitalInfo['hospital']);

        try
        {

            $DoctorHospitalSchedule = new LabTestLink();
            $DoctorHospitalSchedule->laboratory_id = $labId;
            $DoctorHospitalSchedule->laboratory_tests_id = $labInfo['laboratory_tests_id'];
            $DoctorHospitalSchedule->laboratory_tests_price = $labInfo['laboratory_tests_price'];
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

        $msg="LabTest Added Successfully";
        return redirect('laboratory/labtest')->with('message',$msg);

    }

    public function labtestRemoveLab($labtestId)
    {
        $status =  true;
        $labId = Auth::user()->id;

        try
        {

            //$DoctorHospitalSchedule = DoctorSchedule::where('doctor_id','=',$doctorId)->where('id','=',$scheduleId)->delete();

            $Lablabtest = LabTestLink::where('laboratory_id','=',$labId)->where('id','=',$labtestId)->delete();

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


        $msg="LabTest Removed Successfully";
        return redirect('laboratory/labtest')->with('message',$msg);

    }

}
