<?php

/**
 * Created by Baskaran Subbaraman.
 * User: adm
 * Date: 10/15/2015
 * Time: 5:49 PM
 */

namespace App\Http\Controllers\Hospitals;
use App\Treatin\Mapper\ConversationMapper;
use App\Treatin\Model\Entities\MedicalDocumentsVault;
use App\Http\ViewModels\EnquiryDetailsViewModel;
use App\Http\ViewModels\FeedbackReviewViewModel;
use App\Http\ViewModels\HospitalDetailsViewModel;
use App\Treatin\Facades\DoctorServiceFacade;
use App\Treatin\Mapper\ReviewFeedbackMapper;
use App\Treatin\Utilities\ErrorEnum\ErrorEnum;
use App\Treatin\Utilities\Exception\HospitalProfileException;
use App\Treatin\Utilities\Exception\PatientUserException;
use App\Treatin\Utilities\Exception\SubscriptionException;
use App\Treatin\Utilities\UserType;
use Illuminate\Http\RedirectResponse;
use App\User;
use Illuminate\Support\Facades\DB;
use URL;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Treatin\Utilities\Exception\AppendMessage;
use App\Treatin\Utilities\Exception\HospitalUserException;
//use App\Treatin\Services\UserService;
use App\Treatin\Facades\UserServiceFacade;
use App\Treatin\Facades\HospitalServiceFacade;
use App\Treatin\Facades\PatientServiceFacade;
use App\Treatin\Facades\HelperServiceFacade;
use App\Treatin\Facades\HcfServiceFacade;
use App\Treatin\Facades\InterpreterServiceFacade;

use App\Treatin\Services\UserService;
use App\Http\ViewModels\HospitalSearchViewModel;
use App\Http\ViewModels\DoctorSavedListViewModel;
use App\Http\ViewModels\HcfDetailsViewModel;
use App\Http\ViewModels\InterpreterDetailsViewModel;
use App\Http\Requests\NewPatientRequest;
use App\Http\Requests\PatientRegisterRequest;
use App\Http\Requests\PatientLoginRequest;
use App\Http\Requests\ForgotLoginRequest;
use App\Http\Requests\SubscriptionRequest;
use App\Http\Requests\GeneralEnquiryRequest;

use App\Treatin\Mapper\HospitalInfoMapper;
use App\Treatin\Mapper\PatientMapper;
use App\Treatin\Model\Entities\TreatmentEnquiry;
use App\Treatin\Model\Entities\TreatmentConversations;
use App\Treatin\Model\Entities\TreatmentConversationAttachments;

use App\Http\ViewModels\HospitalSavedListViewModel;
use App\Http\ViewModels\DoctorDetailsViewModel;
use App\Http\ViewModels\SaveContactHospitalEnquiryViewModel;
use App\Treatin\Mapper\PatientEnquiryMapper;
use App\Http\Requests\HospitalEnquiryRequest;
use App\Http\Requests\AddNewPatientRequest;
use App\Http\Requests\EditPatientProfileRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ReviewFeedbackRequest;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use Mail;
use App\Treatin\Model\Entities\Post;


use Exception;
use Log;
use Input;
use File;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Config;
use Toastr;


class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Dynamic Database Test (Test function)
     * @param
     * @return true
     * @author saritha
     */

    public function dynamicDatabaseTest() {

        $status = UserServiceFacade::dynamicDatabaseTest();

    }

    /**Getting Post a Query Process status (Test function)
     * @param hospitalId
     * @return true
     * @author saritha
     */
    public function sendPostQueryNotification(){
        $hospitalId = 1;
        $status = UserServiceFacade::sendPostQueryNotification($hospitalId);
        //dd($status);
    }

    public function showPosts()
    {
        $posts = DB::table('posts')->paginate(2);
        return view('blog', array('posts' => $posts));
    }


    public function myAccountPatient()
    {
        return view('portal.myaccount-patient');
    }

    public function myProfilePatient($patientId)
    {

        $patientInfo = UserServiceFacade::getPatientInfo($patientId);
        //dd($patientInfo);
        return view('portal.myprofile-patient');
    }

    public function mySettingPatient()
    {
        return view('portal.mysetting-patient');
    }

    public function myDoctorPatient()
    {
        return view('portal.mydoctor-patient');
    }




    public function myHospitalPatient()
    {
        return view('portal.myhospital-patient');
    }


    public function myMedicalProfilePatient()
    {
        return view('portal.mymedicalprofile-patient');
}

public function myMedicalDocumentPatient()
{
    return view('portal.mymedicaldocument-patient');
}

    public function myMedicalEnquiryPatient()
    {
        return view('portal.mymedicalenquiry-patient');
    }


    public function contactHospital($hid)
    {
        try
        {
            //$userId = Auth::user()->id;
            $roleId = UserType::USERTYPE_PATIENT;

            $user = Auth::user();
            //dd($user);

            $HospitalID = $hid;
            $hospitalIds[0]=$HospitalID;
            $hospOtherInfo = HospitalServiceFacade::getAllHospInfoByHospitalIds($hospitalIds, null);
            $creatorId= Auth::user()->id;
            //dd($creatorId);
            $CountryList=HelperServiceFacade::getCountryList($creatorId);
            //$PatientList=UserServiceFacade::getPatientListForCreator($creatorId);
            $PatientList=UserServiceFacade::getPatientListForCreator($creatorId);
            $CategoryList = UserServiceFacade::getDocumentCategories($roleId);
            $treatmentList = HospitalServiceFacade::getTreatmentList();
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        }
        catch(HospitalProfileException $profileExc)
        {
            $errorMsg = $profileExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($profileExc);
            Log::error($msg);
        }
        catch(HospitalUserException $hospUserExc)
        {
            $errorMsg = $hospUserExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($hospUserExc);
            Log::error($msg);
        }
        catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }

       // dd($treatmentList);
        return view('portal.contact-hospital-form',compact('CountryList','PatientList','CategoryList','HospitalID','hospOtherInfo','treatmentList'));
    }





    public function createpatient($userid)
    {
        try
        {
            //$userId = Auth::user()->id;
            $roleId = UserType::USERTYPE_PATIENT;
            //$HospitalID = $hid;
            $creatorId= Auth::user()->id;
            //dd($creatorId);
            $PatientList = UserServiceFacade::getPatientListForCreator($creatorId);
            $CountryList = HelperServiceFacade::getCountryList($creatorId);
            $CategoryList = UserServiceFacade::getDocumentCategories($roleId);
            $treatmentList = HospitalServiceFacade::getTreatmentList();
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        }
        catch(HospitalProfileException $profileExc)
        {
            $errorMsg = $profileExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($profileExc);
            Log::error($msg);
        }
        catch(HospitalUserException $hospUserExc)
        {
            $errorMsg = $hospUserExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($hospUserExc);
            Log::error($msg);
        }
        catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }

        // dd($treatmentList);
        return view('portal.create-patient',compact('CountryList','PatientList','CategoryList','HospitalID','treatmentList'));
    }

//edit patient
    public function editPatient($userid, $pid)
    {
        try
        {
            $PatientList=UserServiceFacade::getPatientListForEditPatient($pid);

            $CountryList=HelperServiceFacade::getCountryList($userid);
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        }
        catch(HospitalProfileException $profileExc)
        {
            $errorMsg = $profileExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($profileExc);
            Log::error($msg);
        }
        catch(HospitalUserException $hospUserExc)
        {
            $errorMsg = $hospUserExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($hospUserExc);
            Log::error($msg);
        }
        catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }

        // dd($treatmentList);
        return view('portal.edit-patient',compact('CountryList','PatientList', 'code'));
    }


    //update patient
    public function updatePatient(EditPatientProfileRequest $request)
    {
        $status = true;
        $saveContactEnquiry = null;

        try
        {
            //$doc=$hospitalEnquiryRequest['medical_new_document'];
            //$file = $hospitalEnquiryRequest->file('medical_new_document');
            $saveContactEnquiry = PatientMapper::setEditPatientDetails($request);
            //dd($saveContactEnquiry);
            $status = UserServiceFacade::saveEditPatient($saveContactEnquiry);
//dd($status);
            if($status)
            {
                $msg="Patient added successfully.";
                $creatorId= Auth::user()->id;
                return redirect('patient/'.$creatorId.'/mypatients')->with('message',$msg);
            }
        }
        catch(PatientUserException $userExc)
        {
            //dd($userExc);
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            //dd($exc);
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

    }

    public function editProfile($userid)
    {
        try
        {
            //dd($userid);

            $creatorId= Auth::user()->id;
            //dd($creatorId);
            $PatientList=UserServiceFacade::getPatientListForEditProfile($userid);
            //dd($PatientList);
            $CountryList=HelperServiceFacade::getCountryList($userid);
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        }
        catch(HospitalProfileException $profileExc)
        {
            $errorMsg = $profileExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($profileExc);
            Log::error($msg);
        }
        catch(HospitalUserException $hospUserExc)
        {
            $errorMsg = $hospUserExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($hospUserExc);
            Log::error($msg);
        }
        catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }

        // dd($treatmentList);
        return view('portal.edit-patient-profile',compact('CountryList','PatientList'));
    }

    public function savePassword(ChangePasswordRequest $request)
    {
        $status =  false;
        $userid = Auth::user()->id;
        $pwd = $request->all();

        try
        {
            $status = UserServiceFacade::savePassword($pwd);

            if($status)
            {
                $msg="Password Changed Successfully. Now you can login";
                return redirect('user/login')->with('message',$msg);
            }
            $msg="Old Password Invalid! Try Again.";
            return redirect('patient/' .$userid.'/changepassword')->with('message',$msg);

        }
        catch (PatientUserException $userExc) {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            $msg="Old Password Invalid! Try Again.";
            return redirect('patient/' .$userid.'/changepassword')->with('message',$msg);
        } catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
    }




    public function saveToFavourites($hospitalId)
    {
        $status = true;
        //dd($hospitalId);

        //Patient Id is hard coded. This should be retrieved from the logged in user.
        //Hospital Id should be removed
        //$hospitalId = 591;
        //$patientId = 9749;
        $patientId = Auth::user()->id;
        try{
            //$userService->addToFavourites($hospitalId, $patientId);
            $status = UserServiceFacade::addToFavourites($hospitalId, $patientId);
            //dd($status[0]);
            if($status[0]==true) { $status_return = 0; } else { $status_return = 1;  }
        }
        catch(HospitalUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        }
        catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
        return $status_return;
    }

    /* Delete hospital from saved list
     * @params $patientId, $hospitalId
     * @throws HospitalUserException
     * @return true|false
     * @author Baskar
     */

    public function deleteSavedHospital($hospitalId)
    {
        $status = true;
        $patientId = Auth::user()->id;

        try
        {
            $status = UserServiceFacade::deleteSavedHospital($patientId, $hospitalId);
            //dd($status);
        }
        catch(HospitalUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        }
        catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
        return $status;
    }

    public function getHospitalSavedListForPatient()
    {
        $hospOtherInfo = null;
        $hospReviews = null;
        $hospRatings = null;
        $hospitalIds = null;
        //Patient Id is hard coded. This should be retrieved from the logged in user.
        $patientId = Auth::user()->id;
        $hospitalSavedListVM = null;
        //dd($patientId);
        try
        {
            //$hospitalList = UserServiceFacade::getSavedHospitalIdsForPatient($patientId);
            $hospitalIds = UserServiceFacade::getSavedHospitalIdsForPatient($patientId);
            $hospOtherInfo = HospitalServiceFacade::getAllHospInfoByHospitalIds($hospitalIds, null);
            //dd($hospOtherInfo);
            $searchView = new HospitalSearchViewModel();
            $searchView->hospitalOtherInfo = (isset($hospOtherInfo)) ? $hospOtherInfo : null;//Using for listing all hospital Info
            //dd($searchView->getHospitalOtherInfo());
//dd($searchView);
            return view('portal.myhospitalprofile-hospital', $searchView);

            //return view('portal.myhospitalprofile-hospital', compact('hospOtherInfo'));
           // return view('portal.myhospitalprofile-hospital', compact('hospOtherInfo'));
            //dd($hospOtherInfo);

            /*$hospitalSavedListVM = new HospitalSavedListViewModel();

            $hospitalSavedListVM->setHospitalInfo($hospOtherInfo);
            //$hospSpecialtyList = HospitalInfoMapper::setSpecialitiesMapper($hospOtherInfo);
            $hospitalSavedListVM->setHospitalSpecialtyList(HospitalInfoMapper::setSpecialitiesMapper($hospOtherInfo));
            dd($hospitalSavedListVM->getHospitalSpecialtyList());
            //$hospitalSavedListVM->setHospitalSpecialtyList($hospSpecialtyList);

            //$hospitalLocationList = HospitalInfoMapper::setHospitalLocation($hospOtherInfo);
            $hospitalSavedListVM->setHospitalLocationList(HospitalInfoMapper::setHospitalLocation($hospOtherInfo));
            $hospitalSavedListVM->setHospitalMedicalFacilitiesList(HospitalInfoMapper::setHospitalMedicalFacilities($hospOtherInfo));
            $hospitalSavedListVM->setHospitalOtherFacilitiesList(HospitalInfoMapper::setHospitalOtherFacilities($hospOtherInfo));
            $hospitalSavedListVM->setHospitalTreatments(HospitalInfoMapper::setHospitalTreatments($hospOtherInfo));
            $hospitalSavedListVM->setHospitalResources(HospitalInfoMapper::setHospitalResources($hospOtherInfo));
            $hospitalSavedListVM->setHospitalBranches(HospitalInfoMapper::setHospitalBranches($hospOtherInfo));*/

            //dd($hospitalSavedListVM->getHospitalBranches());
            //$hospitalFacilityList = HospitalInfoMapper::setHospitalFacilities($hospOtherInfo);

            //dd($hospitalFacilityList);


            //dd($hospitalIds);

           /*$certifications  = HospitalServiceFacade::getCertificationList();
            $medFacilities   = HospitalServiceFacade::getMedicalFacilityList();
            $otherFacilities = HospitalServiceFacade::getOtherFacilityList();
            $reviewQuestions = HospitalServiceFacade::getReviewQuestionList();

            $hospOtherInfo = HospitalServiceFacade::getAllHospInfoByHospitalIds($hospitalIds, null);
            $hospReviews = HospitalServiceFacade::getReviewsByHospitalIds($hospitalIds, null);
            $hospRatings = HospitalServiceFacade::getRatingsByHospitalIds($hospitalIds, null);

            $hospitalSavedList = new HospitalSearchViewModel();

            $hospitalSavedList->certifications = (isset($certifications)) ? $certifications : null;
            $hospitalSavedList->medFacilities = (isset($medFacilities)) ? $medFacilities : null;
            $hospitalSavedList->otherFacilities = (isset($otherFacilities)) ? $otherFacilities : null;
            $hospitalSavedList->reviewQuestions = (isset($reviewQuestions)) ? $reviewQuestions : null;

            //$hospitalSavedList->hospitalInfo = (isset($hospInfoList)) ? $hospInfoList : null;

            $hospitalSavedList->hospitalOtherInfo = (isset($hospOtherInfo)) ? $hospOtherInfo : null;
            $hospitalSavedList->hospReviews = (isset($hospReviews)) ? $hospReviews : null;
            $hospitalSavedList->hospRatings = (isset($hospRatings)) ? $hospRatings : null;

            dd($hospitalSavedList);*/
            //return view('portal.hospital-search-results', $searchView);

        }
        catch(HospitalUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        }
        catch (Exception $ex) {
            //dd($ex);
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
    }

    /* Add doctor to favourite list
     * @params doctorId, patientId
     * @throws HospitalUserException
     * @return true|false
     * @author Baskar
     */
    public function addDoctorsToFavourites($doctorId)
    {
        $patientId = Auth::user()->id;

        try
        {
            $status = UserServiceFacade::addDoctorsToFavourites($doctorId, $patientId);
            //dd($status[1]);
        }
        catch(HospitalUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        }
        catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
    }

    /* Delete hospital from saved list
     * @params $patientId, $hospitalId
     * @throws HospitalUserException
     * @return true|false
     * @author Baskar
     */

    public function deleteSavedDoctor($doctorId)
    {
        $status = true;
        $patientId = Auth::user()->id;
        try
        {
            $status = UserServiceFacade::deleteSavedDoctor($patientId, $doctorId);
        }
        catch(HospitalUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        }
        catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
        return $status;
    }


    public function MyDoctorsImage(Request $request)
    {
        $file_data=$request->file;
        $file=Crypt::decrypt($file_data);
        //dd($file);
        $image = Image::make($file)
            ->resize(218, 200);
        $img = $image->response();
        return $img;
    }

    public function MyHospitalsImage(Request $request)
    {
        //dd($request->file);
        $file_data=$request->file;
        $file=Crypt::decrypt($file_data);
        $image = Image::make($file)
            ->resize(218, 200);
        $img = $image->response();
        return $img;
    }
    /* Get favourite doctor list for the patient
     * @params patientId
     * @throws HospitalUserException
     * @return doctor Ids
     * @author Baskar
     */



    public function getSavedDoctorsForPatient()
    {
        $doctorInfo = null;
        $doctorIds = null;
        //Patient Id is hard coded. This should be retrieved from the logged in user.
       // $patientId = 9749;
        $hospitalSavedListVM = null;
        $patientId = Auth::user()->id;
        try
        {
            //dd('Inside Controller');
            $doctorIds = UserServiceFacade::getSavedDoctorsForPatient($patientId);
            //dd($doctorIds);
            $doctorInformation = DoctorServiceFacade::getDoctorsInfoByDoctorId($doctorIds);
            //dd($doctorInfo);
            $doctorDetails = new DoctorSavedListViewModel();
            $doctorDetails->doctorsInfo = (isset($doctorInformation)) ? $doctorInformation : null;
            //dd($doctorDetails->getDoctorInfo());
            //dd($doctorDetails);
            //dd($doctorDetails->getAwardInfo());
            return view('portal.mydoctorprofile-doctor', $doctorDetails);
            //dd($doctorDetails);
            //dd($doctorDetails->getDoctorInfo());
            //return view('portal.mydoctorprofile-doctor',compact('doctorInfo'));
           // dd($doctorInfo);
            //return view('portal.mydoctorprofile-doctor', compact('doctorInfo'));

            //dd()

        }
        catch(HospitalUserException $userExc)
        {
            //dd($userExc);
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        }
        catch (Exception $ex) {
            //dd($ex);
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }


    }

    /* Get Medical documents for patient
     * @params $patientId
     * @throws PatientUserException
     * @return array|null
     * @author Baskar
     */

    public function getMedicalDocumentsForPatient($patientId)
    {
        $medicalDocuments = null;
        try
        {
            $medicalDocuments = UserServiceFacade::getMedicalDocumentsForPatient($patientId);
            //DD($medicalDocuments);
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }
    }

    /* Create TalkToHospital Form
     * @params patientId, hospitalId
     * @return view
     * @author saritha
     */
    public function createTalkToHospital($patientId, $hospitalId)
    {
        $patientInfo = PatientServiceFacade::getPatientInfo($patientId);
        $specialityList = HospitalServiceFacade::getSpecialtyListForHospital($hospitalId);
        return view('portal.hospital-talk',compact('specialityList','patientInfo'));
    }

    /* Download patient document
     * @params patientId, documentId
     * @return response
     * @author saritha
     */
    public function download($patientId, $documentId)
    {

/*      $entry = Fileentry::where('filename', '=', $filename)->firstOrFail();
        $file = Storage::disk('local')->get($entry->filename);
        return (new Response($file, 200))
            ->header('Content-Type', $entry->mime);*/

        $file = Storage::get($patientId.'_'.$documentId.'.pdf');
        $contents = Crypt::decrypt($file);
        return (new Response($contents, 200))
            ->header('Content-Type', 'application/pdf');
    }

    /* Saving TalkToHospital
     * @params request
     * @return true|false
     * @author saritha
     */
    //public function saveTalkToHospital(TalkToHospitalRequest $talkHospRequest)
    public function saveTalkToHospital(Request $request)
    {
        $status =  true;
        try {

           //$query = $talkHospRequest->all();
           //$hospitalId = intval($talkHospRequest->segments()[1]);
           //$patientId = intval($talkHospRequest->segments()[2]);

            $hospitalId = 668;
            $query = array(
                'name' =>'saritha','email'=>'test62@email.com',
                'password'=>'123456','first_name'=>'saritha',
                'last_name'=>'prem','dob'=>'12-04-1981','age'=>'34',
                'gender'=>1,'place_of_birth'=>'place_of_birth','nationality'=>'nationality','married'=>1,'photo'=>'photo',
                'address'=>'address','city'=>'city','state'=>'state','country'=>'country','pincode'=>'pincode',
                'mobile'=>'mobile','email'=>'test62@email.com',
                'save_vault' => 1,
                'document_category_id' => 1 , 'document_name'=>'document_name', 'document_description'=>'document_description',
                'document_upload_path'=>'document_upload_path','document_upload_date'=>'11-12-2015',
                'speciality_id'=>1,
                'description'=>'description','request_quote'=>1,'request_appointment'=>1,'request_visa_invitation'=>1,'request_translator'=>1,'request_accommodation'=>1,
                'date'=>'11-12-2015'
            );

            //Saving Patient Info
            if(!isset($patientId)) {
                $patient_user = PatientServiceFacade::putPatientInfo($query);
                if (isset($patient_user->id)) {
                    $patientId = $patient_user->id;
                    $query['patient_id'] = $patientId;
                    $patient_info = PatientServiceFacade::putProfileInfo($patientId, $query);
                }
            }
            //Saving Documents
            if(isset($query['save_vault'])) {
                $document = UserServiceFacade::saveDocumentsToVault($query);
                if (isset($document->id)) {
                    $documentId = $document->id;
                    $query['document_id'] = $documentId;
                    if ($request->hasFile('document')) {
                        if($request->file('document')->isValid()){
                            $document = $request->file('document');
                            $fileContent = File::get($document);
                            $encryptedFile = Crypt::encrypt($fileContent);
                            $fileName = $patientId.'_'.$documentId . '.' . $document->getClientOriginalExtension();
                            Storage::put($fileName,$encryptedFile);
                        }
                    }
                }
            }
            //Saving Talk to Hospital Query
            $queryStatus = UserServiceFacade::saveTalkToHospital($hospitalId, $patientId, $query);
            dd($queryStatus);

        } catch (HospitalUserException $userExc) {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        } catch (Exception $ex) {
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
    }
    /* Saving Post Query
     * @params request
     * @return true|false
     * @author Baskar
     */

    //public function savePostQuery()
    public function savePostQuery(PostQueryRequest $postQueryRequest)
    {
        $status =  true;
        $savePostQuery = null;
        //$savePostQuery = PatientEnquiryMapper::setPatientDetails($hospitalEnquiryRequest);
        //dd($saveContactEnquiry);
        //$status = UserServiceFacade::saveContactHospitalEnquiry($saveContactEnquiry);

        try {

            $savePostQuery = PostQueryMapper::setPostQueryMapper($postQueryRequest);
            /*$hospitalId = 668;
            $query = array(
                'first_name'=>'saritha', 'last_name'=>'prem',
                'location'=>'location','city'=>'city','state'=>'state','country'=>'country',
                'mobile'=>'mobile','email'=>'test@email.com', 'speciality_id'=>1,
                'description'=>'description','date'=>'11-12-2015'
            );*/
            //$queryStatus = UserServiceFacade::savePostQuery($hospitalId, $query);
            //dd($queryStatus);

        } catch (HospitalUserException $userExc) {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        } catch (Exception $ex) {
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
    }

    /* Get Menus by Role Id
     * @params
     * @return array|null
     * @author saritha
     */
    public function getMenu()
    {

        try {
            //$userId = Auth::user()->id;
            $roleId = 1;
            $menu = UserServiceFacade::getMenuByRoleId($roleId);
            dd($menu);
            //return view('portal.hospital-search-results', $searchView);

        }
        catch(HospitalUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        }
        catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
    }

    /* Get Patient List by Creator Id
     * @params creatorId
     * @return array|null
     * @author Baskar
     */
    public function getPatientListForCreator($creatorId)
    {

        //$id = Auth::user()->id;
        $patientList = null;

        try
        {
            //dd($creatorId);
            $patientList = UserServiceFacade::getPatientListForCreator($creatorId);
            //dd($patientList);
            //dd($patientList);
            return view('portal.mypatientprofile-patient',compact('patientList'));
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        }
        catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
    }

    //raji
    //search by patient id
    public function getPatientByPatientId($creatorId, Request $request)
    {

        $pid= $request['q'];
        //dd($pid);
        //$id = Auth::user()->id;
        $patientList = null;

        try
        {
            //dd($creatorId);
            $patientList = UserServiceFacade::getPatientListForPid($creatorId, $pid);
            //dd($patientList);
            //dd($patientList);
            return view('portal.mypatientprofile-patient',compact('patientList'));
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        }
        catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
    }

    //raji
    //search by patient id
    public function getEnquiryByPatientId($creatorId, Request $request)
    {

        $pid= $request['q'];
        //dd($pid);
        //$id = Auth::user()->id;
        $patientList = null;

        try
        {
            //dd($creatorId);
            $patientList = UserServiceFacade::getPatientListForPid($creatorId, $pid);
            //dd($patientList);
            //dd($patientList);
            return view('portal.mypatientprofile-patient',compact('patientList'));
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        }
        catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
    }



    public function getPatientDetails($patientId, $memberId, $pid)
    {
        //dd($memberId);
        $creatorId = Auth::user()->id;
        $patientList = UserServiceFacade::getPatientListForPatientId($memberId);
        //dd($patientList);
        $usermedicalDocuments = UserServiceFacade::getMedicalDocumentsForPatient($memberId);
        //dd($usermedicalDocuments);
        $myEnquiries = UserServiceFacade::myAllEnquiriesforPatientId($creatorId, $pid);
        //dd($myEnquiries);
        $medicalProfile = UserServiceFacade::getMedicalProfileDetailsByPatient($memberId);
        //$patientList = UserServiceFacade::getPatientListForPatientId($patientId);
        //$usermedicalDocuments = UserServiceFacade::getMedicalDocumentsForPatient($patientId);
        //$myEnquiries = UserServiceFacade::myAllEnquiries($creatorId);
        //$medicalProfile = UserServiceFacade::getMedicalProfileDetailsByPatient($patientId);
        //dd($medicalProfile);
        return view('portal.patient-details',compact('memberId','pid','patientList','usermedicalDocuments','myEnquiries','medicalProfile'));
    }

    //raji---for attaching medical docu alone
    public function getPatientDetailsforAttachDocument($patientId, $memberId, $pid)
    {
        //dd($memberId);
        $roleId = UserType::USERTYPE_PATIENT;
        $creatorId = Auth::user()->id;

        $patientList = UserServiceFacade::getPatientListForPatientId($memberId);

        //$usermedicalDocuments = UserServiceFacade::getMedicalDocumentsForPatient($memberId);
        $CategoryList = UserServiceFacade::getDocumentCategories($roleId);

        return view('portal.treatments-document-attachment',compact('memberId', 'pid','patientList','CategoryList'));
    }

    public function getAjaxPatientDetails($patientId)
    {

        $patientList = UserServiceFacade::getPatientListForPatientId($patientId);
        //dd($patientList);
        //$usermedicalDocuments = UserServiceFacade::getMedicalDocumentsForPatient($patientId);
        return view('portal.partials.ajax.patient-profile-details',compact('patientList'));
    }


    public function getAjaxMedicalPatientDetails($profileId)
    {

        $medicalProfile = null;
        //dd($profileId);
        //dd($profileId);

        try
        {
            $medicalProfile = UserServiceFacade::getMedicalProfileDetailsByPatient($profileId);
           // dd($medicalProfile);

        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

        //$patientList = UserServiceFacade::getPatientListForPatientId($patientId);
        //dd($medicalProfile);
        //$usermedicalDocuments = UserServiceFacade::getMedicalDocumentsForPatient($patientId);
        return view('portal.partials.ajax.patient-medical-details',compact('medicalProfile'));
    }

    /* Get Medical document details
     * @params $documentId
     * @throws PatientUserException
     * @return array|null
     * @author Baskar
     */

    public function getMedicalProfileDocumentByDocId($documentId)
    {
        $medicalDocumentDetails = null;

        try
        {
            $medicalDocumentDetails = UserServiceFacade::getMedicalProfileDocumentByDocId($documentId);
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }
    }

    /* Get Medical profiles for creator
     * @params $creatorId
     * @throws PatientUserException
     * @return array|null
     * @author Baskar
     */

    public function getAllMedicalProfilesByCreator($creatorId)
    {
        $creatorId= Auth::user()->id;
        $medicalProfiles = null;

        try
        {
            $medicalProfiles = UserServiceFacade::getAllMedicalProfilesByCreator($creatorId);
            //dd($medicalProfiles);
            return view('portal.all-medicalProfile',compact('medicalProfiles'))  ;

        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }
    }


    public function getAllMedicalProfilesDelete($userid,$profileid)
    {
       $creatorId= Auth::user()->id;

        //dd($creatorId);
      $status = null;
        try
        {
            $status = UserServiceFacade::getAllMedicalProfilesDelete($userid,$profileid);
            // dd($myEnquiries);
            return Redirect::route('patient/'.$userid.'/mypatients');
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }
    }



    public function getAllMedicalEnquiryDelete($userid,$enquiryid)
    {
        $status = null;
        try {
            $status = UserServiceFacade::getAllMedicalEnquiryDelete($enquiryid);
            // dd($myEnquiries);
            return Redirect::route('patient/' . $userid . '/mypatients');
        } catch (PatientUserException $userExc) {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        } catch (Exception $exc) {
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

    }



    public function getAllMedicalDocumentsDelete($userid,$medicalid)

    {

        $status = null;
        try
        {
            $status = UserServiceFacade::getAllMedicalDocumentsDelete($medicalid);
            // dd($myEnquiries);
            return Redirect::route('patient/'.$userid.'/mypatients');
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }


    }

/* Get Medical documents for creator
     * @params $creatorId
     * @throws PatientUserException
     * @return array|null
     * @author Baskar
     */

    public function getAllMedicalDocumentsByCreator($creatorId)
    {
        $creatorId= Auth::user()->id;
        $medicalDocuments = null;

        try
        {
            $medicalDocuments = UserServiceFacade::getAllMedicalDocumentsByCreator($creatorId);
            //dd($medicalDocuments);

            return view('portal.mymedicaldocument-patient',compact('medicalDocuments'));
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }
    }

    /* Get all enquiry details for enquiry id
     * @params $enquiryId
     * @throws PatientUserException
     * @return array|null
     * @author Baskar
     */


    public function getAllEnquiryDetails($userId, $enquiryId)
    {
        $enquiryDetails = null;

        try
        {
            $enquiryDetails = UserServiceFacade::getAllEnquiryDetails($enquiryId);
            //dd($enquiryDetails);
            //dd($enquiryDetails[0]->patient_id);

            $roleId = UserType::USERTYPE_PATIENT;
            $CategoryList = UserServiceFacade::getDocumentCategories($roleId);
            $patientId=$enquiryDetails[0]->patient_id;
            $medicalDocuments = UserServiceFacade::getMedicalDocumentsForPatient($patientId);


            $enquiryViewModel = new EnquiryDetailsViewModel();
            //$searchView->hospitalOtherInfo = (isset($hospOtherInfo)) ? $hospOtherInfo : null;
            $enquiryViewModel->enquiryInfo = (isset($enquiryDetails)) ? $enquiryDetails : null;
            $enquiryViewModel->categoryList = (isset($CategoryList)) ? $CategoryList : null;
            $enquiryViewModel->medicalDocuments = (isset($medicalDocuments)) ? $medicalDocuments : null;
            //dd($enquiryViewModel -> enquiryInfo);

            //dd($enquiryViewModel);
            //dd($enquiryViewModel->enquiryInfo);
            //$xx = $enquiryViewModel->getEnquiryInfo();
            //dd($xx);
            //dd($enquiryViewModel->enquiryInfo);
            //return view('portal.talktohospital-patient-message',compact('enquiryDetails'));
            return view('portal.talktohospital-patient-message', $enquiryViewModel);
        }
        catch(PatientUserException $userExc)
        {
            //dd($userExc);
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            //dd($exc);
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }
        //dd($enquiryDetails);


    }

    /* Get all conversations enquiry id
     * @params $enquiryId
     * @throws PatientUserException
     * @return array|null
     * @author Baskar
     */
    public function getAllConversationsForEnquiry($hospitalId, $enquiryId)
    {
        $enquiryConversations = null;
        //dd($enquiryId);

        try
        {
            $enquiryConversations = UserServiceFacade::getAllConversationsForEnquiry($enquiryId);
            //return $enquiryConversations;
            return view('portal.partials.ajax.talktohospital-patient-view-message-list',compact('enquiryConversations'));

            /*
            $enquiryViewModel = new EnquiryDetailsViewModel();
            //$searchView->hospitalOtherInfo = (isset($hospOtherInfo)) ? $hospOtherInfo : null;
            $enquiryViewModel->enquiryInfo = (isset($enquiryConversations)) ? $enquiryConversations : null;
            */
        }
        catch(PatientUserException $userExc)
        {
            //dd($userExc);
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            //dd($exc);
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }
    }


    public function postConversationsForEnquiry($hospitalId, $enquiryId)
    {
        //$enquiryConversations = null;
        //dd($enquiryId);

        try
        {
            //$enquiryConversations = UserServiceFacade::getAllConversationsForEnquiry($enquiryId);
            //return $enquiryConversations;
            $roleId = UserType::USERTYPE_PATIENT;

            $HospitalID = $hospitalId;
            $creatorId= Auth::user()->id;
            //dd($creatorId);
            $PatientList=UserServiceFacade::getPatientListForCreator($creatorId);

            $CategoryList = UserServiceFacade::getDocumentCategories($roleId);

            return view('portal.partials.ajax.talktohospital-patient-post-message',compact('hospitalId','enquiryId','CategoryList'));

            /*
            $enquiryViewModel = new EnquiryDetailsViewModel();
            //$searchView->hospitalOtherInfo = (isset($hospOtherInfo)) ? $hospOtherInfo : null;
            $enquiryViewModel->enquiryInfo = (isset($enquiryConversations)) ? $enquiryConversations : null;
            */
        }
        catch(PatientUserException $userExc)
        {
            //dd($userExc);
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            //dd($exc);
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }
    }

    /* Get All Enquiries for the patient
     * @params $creatorId
     * @throws PatientUserException
     * @return array|null
     * @author Baskar
     */
    private function saveConversationAttachments($treatmentConversation,  $medicalDocument)
    {

            try
            {
                $enquiryid=$treatmentConversation->treatment_enquiry_id;

                $coversation_id=$treatmentConversation->id;
                $conversationAttachments = null;
                if(!is_null($treatmentConversation)) {
                    //dd('Inside conversation attachments');
                    //$medicalDocs = $treatmentConversation->medicalDocument;
                    // dd($medicalDocs);


                    foreach ($medicalDocument as $document) {
                        $conversationAttachment = new TreatmentConversationAttachments();
                        $conversationAttachment->conversation_id = $coversation_id;
                        $conversationAttachment->attachment_id = $document;
                        $conversationAttachment->attachment_status = 1;
                        //$conversationAttachment->created_by = $patientInfo->getCreatedBy();
                        //$conversationAttachment->updated_by = $patientInfo->getModifiedBy();
                        //$conversationAttachment->created_at = $patientInfo->getCreatedAt();
                        //$conversationAttachment->updated_at = $patientInfo->getUpdatedAt();
                        $treatmentConversation->conversationattachments()->save($conversationAttachment);

                    }

                }
            }
            catch(PatientUserException $userExc)
            {
                //dd($userExc);
                //dd($errorMsg = $userExc->getMessageForCode());
                $msg = AppendMessage::appendMessage($userExc);
                Log::error($msg);
            }
            catch(Exception $exc)
            {
                //dd($exc);
                //dd($msg = AppendMessage::appendGeneralException($exc));
                $msg = AppendMessage::appendGeneralException($exc);
                Log::error($msg);
            }


    }

    public function myPatientEnquiries($patientId)
    {
        $myPatientEnquiries = null;

        try
        {
            $myPatientEnquiries = UserServiceFacade::myPatientEnquiries($patientId);
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }
    }


    public function registerFormPatient()
    {
        $CountryList=HelperServiceFacade::getCountryList();
        return view('portal.patientregister', compact('CountryList'));
    }

    public function registerNewPatient(PatientRegisterRequest $patientRequest)
    {
        /*
        $status =  true;
        $patientInfo = null;
        $patientInfo = array('first_name'=>'Alagiri', 'last_name'=>'Vimal',
            'mobile'=>'875554444','email'=>'demo_'.time().'@email.com','password'=>'123456', 'age'=>25,
            'gender'=>1);
        dd($patientInfo);
        */

        $status =  true;
        $patientInfo = $patientRequest->all();
        //dd($patientInfo);

        try
        {
            //$status =  true;
           // $patientInfo = $patientRequest->all();

            $status = UserServiceFacade::registerNewPatient($patientInfo);
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
        catch (PatientUserException $userExc) {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            $msg="Register Details Invalid! Try Again.";
            return redirect('user/login')->with('message',$msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
            /*return Response::json(array(
                        'success' => false,
                        'data' => $errorMsg), '200'
            );*/
        } catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
    }

    //Feedback questions

    /* Get feedback questions
     * @params none
     * @throws PatientUserException
     * @return array|null
     * @author Baskar
     */

    public function getFeedbackQuestions($hospitalid)
    {
        $feedbackQuestions = null;
        $patientid = null;


       // dd($hospitalid);
        try
        {


            if(Auth::user()) {
                $patientid=Auth::user()->id;
            }
            else
            {
                $msg="Login User Can Review! Please Login.";
                return redirect('user/login')->with('message',$msg);
            }

            $feedbackQuestions = UserServiceFacade::getFeedbackQuestions();
           // print_r($feedbackQuestions);
            $hospitalIds[0]=$hospitalid;
            $hospOtherInfo = HospitalServiceFacade::getAllHospInfoByHospitalIds($hospitalIds, null);
           // dd($hospOtherInfo);
            return view('portal.review-hospital',compact('patientid','hospitalid','hospOtherInfo','feedbackQuestions'));
        }
        catch (PatientUserException $userExc) {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
            /*return Response::json(array(
                        'success' => false,
                        'data' => $errorMsg), '200'
            );*/
        } catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
    }

    /* Save feedback reviews
     * @params $hospitalId, $patientId, feedbackreview view model
     * @throws PatientUserException
     * @return trye or false
     * @author Baskar
     */

    //public function saveFeedbackReviews(ReviewFeedbackRequest $feedbackRequest)
    public function saveFeedbackReviews(Request $request)
    {
        $reviews = $request->all();
        //dd($reviews);
        $status = true;
        $hospital_id=$reviews['hospital_id'];
        //dd($reviews['feedback_questions']);
        /*
        $reviews = array(

            'hospital_id'=>'591',
            'patient_id'=>'9749',
            'review_title' => 'good',
            'review_description' => 'good',
            'feedback_questions' => array( array('question_id'=>'1','question_rating'=>'5'),
            array('question_id'=>'2','question_rating'=>'5'),
            array('question_id'=>'3','question_rating'=>'5'),
            array('question_id'=>'4','question_rating'=>'5'))
        );
        */
        try
        {
            //$feedbackVM = ReviewFeedbackMapper::setReviewFeedback($feedbackRequest);
            //$status = UserServiceFacade::saveFeedbackReviews($hospitalId, $patientId, $feedbackVM);
            $feedbackVM = ReviewFeedbackMapper::setReviewFeedback($reviews);
            $status = UserServiceFacade::saveFeedbackReviews($feedbackVM);
    //dd($status);

            return redirect('hospital/'.$hospital_id.'/userreviews');

            /*if($status)
                dd('Saved successfully');*/
        }
        catch (PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
            /*return Response::json(array(
                        'success' => false,
                        'data' => $errorMsg), '200'
            );*/
        } catch (Exception $ex)
        {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
    }

    /* Get feedback reviews
     * @params $hospitalId
     * @throws PatientUserException
     * @return true or false
     * @author Baskar
     */

    public function getFeedbackReviews($hospitalid)
    {
        $feedbackReviews = null;

        try
        {
            if(Auth::user()) {
                $patientid=Auth::user()->id;
            }
            else
            {
                $msg="Login User Can View Review! Please Login.";
                return redirect('user/login')->with('message',$msg);
            }
            //dd($hospitalId);
            $feedbackReviews = UserServiceFacade::getFeedbackReviews($hospitalid);
            $hospitalIds[0]=$hospitalid;
            $hospOtherInfo = HospitalServiceFacade::getAllHospInfoByHospitalIds($hospitalIds, null);

            if(count($feedbackReviews)>0) {
                return view('portal.review-hospital-view',compact('patientid','hospitalid','hospOtherInfo','feedbackReviews'));
            }
            else
            {
                return redirect('hospital/'.$hospitalid.'/feedback/questions');
            }

        }
        catch (PatientUserException $userExc)
        {
            //dd($userExc);
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        } catch (Exception $ex)
        {
            //dd($ex);
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
    }




    /* Get feedback reviews for review id
     * @params $reviewId
     * @throws PatientUserException
     * @return $feedbackReviews
     * @author Baskar
     */
    public function getFeedbackDetailsByReviewId($hospitalId, $reviewId)
    {
        $feedbackReviews = null;
        //dd($reviewId);

        try
        {
            $feedbackReviews = UserServiceFacade::getFeedbackDetailsByReviewId($reviewId);
           // dd($feedbackReviews);
            return view('portal.partials.ajax.hospital-review-details',compact('feedbackReviews'));
        }
        catch (PatientUserException $userExc)
        {
            //dd($userExc);
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch (Exception $ex)
        {
            //dd($ex);
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
    }


    public function registerCompletePatient()
    {
        return view('portal.patientregister-complete');
    }

    public function loginFormPatient()
    {
        return view('portal.patientlogin');
    }

    public function loginInfoPatient(PatientLoginRequest $patientRequest)
    {
       // dd($patientRequest);
        $status =  true;
        $patientInfo = $patientRequest->all();
        //dd($patientInfo);

        //dd($patientRequest);
        //$intendUrl = Session::get('previousurl');
        //dd($intendUrl);

        try
        {
            //$patientInfo = null;
            //$patientInfo = array('email'=>'demo_1457516486@email.com','password'=>'123456');
           // dd($patientInfo);
            if (Auth::attempt(['email' => $patientInfo['email'], 'password' => $patientInfo['password']])) {
                // Authentication passed...
                //dd(Auth::user());
                if(Auth::user()->hasRole('patient'))
                {
                    $LoginUserId=Session::put('LoginUserId', Auth::user()->id);
                    $LoginUserType=Session::put('LoginUserType', 'patient');
                    $DisplayName=Session::put('DisplayName', ucfirst(Auth::user()->name));
                    $AuthDisplayName=Session::put('AuthDisplayName', ucfirst(Auth::user()->name));

                    $id = Auth::user()->id;
                    $photo = DB::table('patient_info') -> select('photo') -> where('patient_id',$id)->get();
                    if(!empty($photo[0] -> photo)){
                        $img = str_replace('../public','public', $photo[0] -> photo);
                        $AuthDisplayPhoto=Session::put('AuthDisplayPhoto', str_replace('public',$img, URL::to('/')));
                    }

                    $intendUrl = Session::get('previousurl');
                    if(!is_null($intendUrl))
                    {
                        return redirect($intendUrl);
                    }
                    else{
                        //9762/myallenquiries
                        return redirect('patient/'.Auth::user()->id.'/myallenquiries');
                    }

                    //return back();
                }
                else if(Auth::user()->hasRole('hospital'))
                {
                    Auth::logout();
                    Session::flush();
                    $msg="Login Details Incorrect! Try Again.";
                    return redirect('user/login')->with('message',$msg);
                }
                else if(Auth::user()->hasRole('doctor'))
                {
                    Auth::logout();
                    Session::flush();
                    $msg="Login Details Incorrect! Try Again.";
                    return redirect('user/login')->with('message',$msg);
                }
                else if(Auth::user()->hasRole('adm'))
                {
                    $LoginUserId=Session::put('LoginUserId', Auth::user()->id);
                    $LoginUserType=Session::put('LoginUserType', 'patient');
                    $DisplayName=Session::put('DisplayName', ucfirst(Auth::user()->name));
                    $AuthDisplayName=Session::put('AuthDisplayName', ucfirst(Auth::user()->name));
                    $AuthDisplayPhoto=Session::put('AuthDisplayPhoto', "no-image.jpg");
                   // dd(Auth::user()->name);
                    return redirect('adm/'.Auth::user()->id.'/dashboard');
                }
            }
            else
            {
                Auth::logout();
                Session::flush();
                $msg="Login Details Incorrect! Try Again.";
                return redirect('user/login')->with('message',$msg);
            }

        }
        catch (PatientUserException $userExc) {
            //dd($userExc);
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
            /*return Response::json(array(
                        'success' => false,
                        'data' => $errorMsg), '200'
            );*/
        } catch (Exception $ex) {
            //dd($ex);
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
    }


    public function modalLoginInfoPatient(PatientLoginRequest $patientRequest)
    {
        //dd($patientRequest -> redirectUrl);
        $status =  true;
        $patientInfo = $patientRequest->all();
        //dd($patientInfo);



        try
        {

            //$patientInfo = null;
            //$patientInfo = array('email'=>'demo_1457516486@email.com','password'=>'123456');
            // dd($patientInfo);
            if (Auth::attempt(['email' => $patientInfo['email'], 'password' => $patientInfo['password']])) {
                // Authentication passed...
                //dd(Auth::user());
                if(Auth::user()->hasRole('patient'))
                {
                    $LoginUserId=Session::put('LoginUserId', Auth::user()->id);
                    $LoginUserType=Session::put('LoginUserType', 'patient');
                    $DisplayName=Session::put('DisplayName', ucfirst(Auth::user()->name));
                    $AuthDisplayName=Session::put('AuthDisplayName', ucfirst(Auth::user()->name));
                    $AuthDisplayPhoto=Session::put('AuthDisplayPhoto', "no-image.jpg");
                    //$intendUrl = Session::get('previousurl');
                    $intendUrl = $patientRequest -> redirectUrl;
                    //dd($intendUrl);
                    if(!empty($intendUrl))
                    {
                        //dd($intendUrl);
                        return redirect($intendUrl);
                    }
                    else{
                       // dd("Hi");
                        //9762/myallenquiries
                        return redirect('patient/'.Auth::user()->id.'/myallenquiries');
                    }

                    //return back();
                }
                else if(Auth::user()->hasRole('hospital'))
                {
                    Auth::logout();
                    Session::flush();
                    $msg="Only Patients have this permission";
                    return redirect('user/login')->with('message',$msg);
                }
                else if(Auth::user()->hasRole('doctor'))
                {
                    Auth::logout();
                    Session::flush();
                    $msg="Only Patients have this permission.";
                    return redirect('user/login')->with('message',$msg);
                }
            }
            else
            {
                Auth::logout();
                Session::flush();
                $msg="Login Details Incorrect! Try Again.";
                return redirect('user/login')->with('message',$msg);
            }

        }
        catch (PatientUserException $userExc) {
            dd($userExc);
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
            /*return Response::json(array(
                        'success' => false,
                        'data' => $errorMsg), '200'
            );*/
        } catch (Exception $ex) {
            dd($ex);
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
    }

    public function forgotlogin()
    {
        return view('portal.forgot-password');
    }


    public function ForgotdoLogin(ForgotLoginRequest $reglogin)
    {
        $login = $reglogin->all();
        //dd($login);
        $name="Member";
        $email=$reglogin->get('email');

        $password=$this->generateRandomString();
        $login['password']= $password;
        try
        {

            if (UserServiceFacade::ForgotdoLogin($login)) {

                $url = 'http://www.healthvistaz.com/';
                $subject = 'Forgot Login - Healthvistaz';

              Mail::send('emails.welcomemail',array('name'=>$name,'email'=>$email,'password'=>$password,'url'=>$url), function($message) use($email,$name,$subject) {
                  $message->from('hello@app.com', 'Your Application');
                  $message->to( $email, $name)->subject($subject);
               });

                //Session::put('LastInsertedUser', $hospital_user->id);
                $msg="Please Check Email For Login Details.";
                return redirect('user/forgotlogin')->with('success',$msg);
            } else {
                $msg="Login Details Incorrect! Try Again.";
                return redirect('user/forgotlogin')->with('message',$msg);
            }

        }
        catch (HospitalUserException $userExc) {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
            /*return Response::json(array(
                        'success' => false,
                        'data' => $errorMsg), '200'
            );*/
        } catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            return redirect('user/forgotlogin')->with('message',trans('messages.SupportTeam'));
        }    }



    private function generateRandomString($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function ajaxMedicalProfileByPatient($patientId)
    {
        //dd($patientId);
        $medicalProfile = null;

        try
        {
            $medicalProfile = UserServiceFacade::getMedicalProfileByPatient($patientId);
            //dd($medicalProfile);
            return $medicalProfile;
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }
    }

    public function ajaxMedicalDocumentsForPatient($patientId)
    {
        $medicalDocuments = null;

        try
        {
            $medicalDocuments = UserServiceFacade::getMedicalDocumentsForPatient($patientId);
           // dd($medicalDocuments);
            return $medicalDocuments;
        }
        catch(PatientUserException $userExc)
        {
            //dd($userExc);
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            //dd($exc);
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }
    }


    /* Add New Patient
     * @params request
     * @throws PatientUserException
     * @return array|null
     * @author Baskar
     */

    //public function addNewPatient(NewPatientRequest $patientRequest)
    public function addNewPatient()
    {
        $status =  true;
        //$patient_info_id = 0; //Get the id from the request
        /*$patientInfo = null;

        $patientInfo = array('first_name'=>'Baskaran', 'last_name'=>'Subbaraman',
                'mobile'=>'875554444','email'=>'test@email.com', 'age'=>25,
                'gender'=>1);*/


        try
        {
            $saveContactEnquiry = new SaveContactHospitalEnquiryViewModel();
            $saveContactEnquiry = PatientEnquiryMapper::setPatientDetails($saveContactEnquiry);
            $status = UserServiceFacade::addNewPatient($saveContactEnquiry);

            /*if($patient_info_id == 0)
            {
                $saveContactEnquiry = new SaveContactHospitalEnquiryViewModel();
                $saveContactEnquiry = PatientEnquiryMapper::setPatientDetails($saveContactEnquiry);
                $status = UserServiceFacade::addNewPatient($saveContactEnquiry);
            }*/

            if($status)
            {
                //dd("Saved successfully");
                /*$msg = trans('messages.'.ErrorEnum::NEW_PATIENT_ADD_SUCCESS);
                $savesuccess = Config::get('toastr.savesuccess');

                Toastr::success($msg, $title = 'PROFILE', $savesuccess);*/
            }
        }
        catch (PatientUserException $userExc) {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
            /*return Response::json(array(
                        'success' => false,
                        'data' => $errorMsg), '200'
            );*/
        } catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
    }

    /* Get Medical Profile
     * @params creatorId
     * @throws PatientUserException
     * @return array|null
     * @author Baskar
     */

    public function getMedicalProfileByPatient($patientId)
    {
        $medicalProfile = null;

        try
        {
            $medicalProfile = UserServiceFacade::getMedicalProfileByPatient($patientId);
            //dd($medicalProfile);
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }
    }

    /* Get Patient Information
     * @params $patientId
     * @throws PatientUserException
     * @return array|null
     * @author Baskar
     */

    public function getPatientInfo($patientId)
    {
        $patientInfo = null;

        try
        {
            $patientInfo = UserServiceFacade::getPatientInfo($patientId);
            //dd($patientInfo);
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }
    }

    /* Get Medical profile list
     * @params $patientId
     * @throws PatientUserException
     * @return array|null
     * @author Baskar
     */

    public function getMedicalProfileListForPatient($patientId)
    {
        $medicalProfiles = null;

        try
        {
            $medicalProfiles = UserServiceFacade::getMedicalProfileListForPatient($patientId);
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }
    }

    /* Save Contact Form
     * @params $hospitalId, contact hospital view model
     * @throws PatientUserException
     * @return array|null
     * @author Baskar
     */

    //public function saveContactHospitalEnquiry($hospitalId, $contactHospitalVM)
    //public function saveContactHospitalEnquiry(HospitalEnquiryRequest $hospitalEnquiryRequest)
    //public function saveContactHospitalEnquiry()

    public function saveContactHospitalEnquiry(HospitalEnquiryRequest $hospitalEnquiryRequest)
    {
        //dd($hospitalEnquiryRequest);
        //dd($contactEnquiryRequest->all());
        //dd($hospitalEnquiryRequest->hospital_id);
        $status = true;
        $hospitalId = $hospitalEnquiryRequest->hospital_id;
        $saveContactEnquiry = null;

        try
        {
            $saveContactEnquiry = PatientEnquiryMapper::setPatientDetails($hospitalEnquiryRequest);

            $hospitalIds[0]=$hospitalId;
            $hospOtherInfo = HospitalServiceFacade::getAllHospInfoByHospitalIds($hospitalIds, null);

            //dd($saveContactEnquiry);
            $status = UserServiceFacade::saveContactHospitalEnquiry($saveContactEnquiry);

            if($status)
            {
                $msg = trans('messages.'.ErrorEnum::PATIENT_CONTACT_FORM_SAVE_SUCCESS);
                $creatorId= Auth::user()->id;
                $savesuccess = Config::get('toastr.savesuccess');
                Toastr::success($msg, $title = 'PATIENT ENQUIRY FORM', $savesuccess);
                //return redirect('patient/'.$creatorId.'/myallenquiries')->with('message',$msg);
                return view('portal.talktohospital-patient-complete', compact('hospOtherInfo'));
            }
        }
        catch(PatientUserException $userExc)
        {
            //dd($userExc);
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            //dd($exc);
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

    }

    /* Save Patient Conversations
     * @params Request
     * @throws PatientUserException
     * @return true | false
     * @author Baskar
     */

    public function savePatientConversations(Request $conversationRequest)
    {
        //dd($conversationRequest);
        $saveConversationsVM = null;
        $patientId = null;
        //dd($conversationRequest);
        $conversationRequestValue = array();
        try
        {
            $saveConversationsVM = ConversationMapper::setConversationDetails($conversationRequest);
            //dd($saveConversationsVM);
            $status = UserServiceFacade::savePatientConversations($saveConversationsVM);

            //dd($status);
            //savePatientConversations
            //dd($conversationRequest['medical_new_document']);

            if($status)
            {
                $msg="Message sent successfully.";
                $creatorId= Auth::user()->id;
                if(Auth::user()->hasRole('hospital'))
                {
                    return redirect('hospital/'.$creatorId.'/myallenquiries')->with('message',$msg);
                }
                if(Auth::user()->hasRole('patient'))
                {
                    return redirect('patient/'.$creatorId.'/myallenquiries')->with('message',$msg);
                }
            }

        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            dd($exc);
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }
    }

    public function savePatientConversation(Request $request)
    {
        $req=$request->all();
        //dd($request['medical_old_document']);
        //dd($req);
        // dd($medicalDocuments);
        // $content = File::get($doc_upload);
        $medicalDocumentArray=array();

        $countold=count($request['medical_old_document']);

        if($countold>0) {
            $medical_old_document=$request['medical_old_document'];
            //dd($medical_old_document['medical_document_id']);
            foreach($medical_old_document['medical_document_id'] as $medical_old_document_value)
            {
                //dd($medical_old_document_value);
                $medicalDocumentArray[] = intval($medical_old_document_value);
            }
        }

        $count=count($request['medical_new_document']);

        for($x = 0; $x<$count; $x++)
        {
            //dd($request['medical_new_document'][$x]['document_upload_path']);
            $doc_upload = $request['medical_new_document'][$x]['document_upload_path'];
            if(!is_null($doc_upload)) {
                $filename = $doc_upload->getClientOriginalName();
                $extension = $doc_upload->getClientOriginalExtension();
                $documentPath = 'medical_document/' . 'patient_document_' . $request->get('patientid') . '/' . 'patient_document_' . $request->get('patientid') . '_' . time() . '.' . $extension;
                Storage::put($documentPath, $doc_upload);
                Storage::put($documentPath, Crypt::encrypt($filename));


                $medicalDocument = new MedicalDocumentsVault();

                $medicalDocument->document_category_id = $req['medical_new_document'][$x]['document_category_id'];
                $medicalDocument->document_name = $req['medical_new_document'][$x]['document_name'];
                $medicalDocument->patient_id = $request['patientid'];
                $medicalDocument->document_upload_path = $documentPath;
                $medicalDocument->document_file_name = $filename;
                $medicalDocument->document_extension = $extension;
                $medicalDocument->document_upload_status = 1;

                //$medicalDocument->created_by = $patientInfo->getCreatedBy();
                //$medicalDocument->updated_by = $patientInfo->getModifiedBy();
                //$medicalDocument->created_by = (strval(100));
                //$medicalDocument->updated_by = (strval(100));
                $medicalDocument->created_at = (date("Y-m-d H:i:s"));
                $medicalDocument->updated_at = (date("Y-m-d H:i:s"));
                $medicalDocument->save();
                //dd($medicalDocument->id);
                $medicalDocumentArray[] = $medicalDocument->id;
            }
        }

        //dd($medicalDocumentArray);
        //$newPatient->medicaldocuments()->save($medicalDocument);

        $treatmentConversation = null;
        // dd($req['conversation_desc']);

        if(!is_null($req))
        {
            $treatmentConversation = new TreatmentConversations();
            $treatmentConversation->conversation_from_user_id = $request['hospitalId'];
            $treatmentConversation->conversation_to_user_id =$request['patientid'];
            $treatmentConversation->treatment_enquiry_id=$request['enquiryId'];
            $treatmentConversation->conversation_title=$req['conversation_title'];
            $treatmentConversation->conversation_description=$req['conversation_desc'];
            //dd($treatmentConversation->conversation_description);
            /*$treatmentConversation->conversation_from_user_id = $patientInfo->getHospitalId();
            $treatmentConversation->conversation_to_user_id = $treatmentEnquiry->patient_id;*/
            //$treatmentConversation->conversation_date = $request->getCreatedAt();
            $treatmentConversation->conversation_status = 1;
            //$treatmentConversation->created_by = $request->getCreatedBy();
            //$treatmentConversation->updated_by = $request->getModifiedBy();
            //$treatmentConversation->created_at = $request->getCreatedAt();
            //$treatmentConversation->updated_at = $request->getUpdatedAt();
            //dd($treatmentConversation);
            $treatmentConversation->save();
            // $treatmentEnquiry->enquiryconversations()->save($treatmentConversation);
        }



        $this->saveConversationAttachments($treatmentConversation, $medicalDocumentArray);

        /*
        $treatmentEnquiry = TreatmentEnquiry::find($request['enquiryId']);
        //dd($treatmentEnquiry);
        if(!is_null($treatmentEnquiry))
        {
            $treatmentEnquiry->treatment_conversion_hospital_read_status = 1;
            $treatmentEnquiry->save();
        }
        */

    }



    //raji------for saving attached medical document alone
    public function saveMedicalDocument(Request $request)
    {
        //dd($hospitalEnquiryRequest);
        //dd($contactEnquiryRequest->all());
        //dd($hospitalEnquiryRequest->hospital_id);
        $status = true;
        //$patient_info_id = 46; //Get the id from the request
        $memberId = $request->patientId;
        $pid = $request -> pid;
        //dd($request);

        $saveContactEnquiry = null;
        try
        {

             $saveContactEnquiry = PatientEnquiryMapper::setPatientMedicalDocumentDetails($request);
            //dd($saveContactEnquiry);
            $status = UserServiceFacade::saveMedicalDocument($memberId, $saveContactEnquiry);

            if($status)
            {
                $msg="Document uploaded successfully.";
                $creatorId= Auth::user()->id;
                if(Auth::user()->hasRole('hospital'))
                {
                    return redirect('hospital/'.$creatorId.'/member/'. $memberId. '/details/'. $pid)->with('message',$msg);
                }
                if(Auth::user()->hasRole('patient'))
                {
                    return redirect('patient/'.$creatorId.'/member/'. $memberId. '/details/'. $pid)->with('message',$msg);
                }

            }
        }
        catch(PatientUserException $userExc)
        {
            dd($userExc);
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            dd($exc);
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

    }

    public function savepatient(AddNewPatientRequest $patientRequest)
    {
        $status = true;
        $saveContactEnquiry = null;

        try
        {
            //$doc=$hospitalEnquiryRequest['medical_new_document'];
            //$file = $hospitalEnquiryRequest->file('medical_new_document');
            $saveContactEnquiry = PatientMapper::addNewPatientDetails($patientRequest);
            //dd($saveContactEnquiry);
           $status = UserServiceFacade::saveCreatePatient($saveContactEnquiry);

            if($status)
            {
                $msg="Patient added successfully.";
                $creatorId= Auth::user()->id;
                return redirect('patient/'.$creatorId.'/mypatients')->with('message',$msg);
            }
        }
        catch(PatientUserException $userExc)
        {
            //dd($userExc);
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            //dd($exc);
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

    }



    /* Get enquiries for the creator
     * @params $creatorId
     * @throws PatientUserException
     * @return array||null
     * @author Baskar
     */

    public function getMyPatientEnquiries($creatorId)
    {
        $myPatientEnquiries = null;

        try
        {
            $myPatientEnquiries = UserServiceFacade::getMyPatientEnquiries($creatorId);
            //dd($myPatientEnquiries);
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }
    }

    /* Get All Enquiries
     * @params $creatorId
     * @throws PatientUserException
     * @return array|null
     * @author Baskar
     */
    public function myAllEnquiries($creatorId)
    {

        $creatorId= Auth::user()->id;
        //dd($creatorId);
        $myEnquiries = null;
        try
        {
            $myEnquiries = UserServiceFacade::myAllEnquiries($creatorId);
            //dd($myEnquiries);
            return view('portal.treatment-enquiry',compact('myEnquiries'));
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }
    }

    public function myAllEnquiriesForPatientId($creatorId, REQUEST $request)
    {
        $pid= $request['q1'];
        $creatorId= Auth::user()->id;
        //dd($creatorId);
        $myEnquiries = null;
        try
        {
            $myEnquiries = UserServiceFacade::myAllEnquiriesForPatientId($creatorId, $pid);
            //dd($myEnquiries);
            return view('portal.treatment-enquiry-by-id',compact('myEnquiries'));
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }
    }

    public function myAllEnquiriesForEnquiryId($creatorId, REQUEST $request)
    {
        $enq_id= $request['q'];
        $creatorId= Auth::user()->id;
        //dd($creatorId);
        $myEnquiries = null;
        try
        {
            $myEnquiries = UserServiceFacade::myAllEnquiriesForEnquiryId($creatorId, $enq_id);
            dd($myEnquiries);
            return view('portal.treatment-enquiry-by-id',compact('myEnquiries'));
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }
    }


    public function myAllEnquiriesDelete($creatorId)
    {
        $creatorId= Auth::user()->id;
        dd($creatorId);
        //$creatorId="1";
        $status = null;
        try
        {
            $status = UserServiceFacade::myAllEnquiriesDelete($creatorId);
            // dd($myEnquiries);
            return Redirect::to('patient/{id}/myallenquiries');
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }
    }


    private function addMedicalDocuments($medicalDocumentsArray)
    {
        $medicalDocuments = array();

        //dd($medicalDocumentsArray);
       foreach($medicalDocumentsArray as $document)
        {
            //dd($document);
            $medicalDocuments[] = $medicalDocumentsArray;
            dd($medicalDocuments);
        }

        /*foreach($medicalDocumentsArray as $key => $value)
        {
            //dd($value);
            $id = $value['document_name'];
            dd($id);
        }*/


        return $medicalDocuments;
    }

    //Listing page functionalities

    /* Get Top specialists for the hospital
     * @params hospitalId, specialty Id if passed in the Search
     * @throws PatientUserException
     * @return array|null
     * @author Baskar
     */
    public function getTopSpecialists($hospitalId)
    {
        //$hospitalId = 668;
        $topSpecialists = null;

        try
        {
            //dd($hospitalId);
            //dd($specialtyId);
            $topSpecialists = UserServiceFacade::getTopSpecialists($hospitalId);
            //$topSpecialists=array();
            foreach($topSpecialists as $key=>$value) {
                if($value->imagePath!=""){
                    $topSpecialists[$key]->imageUrl = Config::get('constants.DOCTOR_EMPANEL_URL').str_replace('/public/', '/', $value->imagePath) ;
                }
                else
                {
                    $topSpecialists[$key]->imageUrl = asset(Config::get('constants.DOCTOR_NO_IMAGE_PATH'));
                }

            }

            //$imageUrl = Config::get('constants.DOCTOR_EMPANEL_URL').str_replace('/public/', '/', $topSpecialists['$imagePath']);
            //dd($topSpecialists);
            //$image = Config::get('constants.DOCTOR_EMPANEL_URL').str_replace('/public/', '/', $value['image_path']) ;
            //return $topSpecialists;
            return view('portal.partials.ajax.hospital-list-doctor',compact('topSpecialists'));
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        }
        catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
    }

    public function getTopSpecialistsBySpeciality($hospitalId, $specialtyId)
    {
        //$hospitalId = 668;
        $topSpecialists = null;

        try
        {
            //dd($hospitalId);
            //dd($specialtyId);
            $topSpecialists = UserServiceFacade::getSpecialistsForHospitalAndSpecialty($hospitalId, $specialtyId);
            //dd($topSpecialists);

            foreach($topSpecialists as $key=>$value) {
                $topSpecialists[$key]->imageUrl = Config::get('constants.DOCTOR_EMPANEL_URL').str_replace('/public/', '/', $value->imagePath) ;
            }

            return view('portal.partials.ajax.hospital-speciality-list-doctor',compact('topSpecialists'));
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        }
        catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
    }


    public function getTopSpecialistsBySpecialityApi($hospitalId, $specialtyId)
    {
        //$hospitalId = 668;
        $topSpecialists = null;
        try
        {
            //dd($hospitalId);
            //dd($specialtyId);
            $topSpecialists = UserServiceFacade::getSpecialistsForHospitalAndSpecialty($hospitalId, $specialtyId);
            //dd($topSpecialists);
            foreach($topSpecialists as $key=>$value) {
                $topSpecialists[$key]->imageUrl = Config::get('constants.DOCTOR_EMPANEL_URL').str_replace('/public/', '/', $value->imagePath) ;
            }

            return view('portal.partials.ajax.hospital-new-speciality-list-doctor',compact('topSpecialists'));
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        }
        catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
    }








    public function getConditionsByHospitalSpecialty($hospitalId, $specialtyId)
    {
        $conditions = null;
        //dd($hospitalId);

        try
        {
            //dd($hospitalId);
            //dd($specialtyId);
            //$treatments = HospitalServiceFacade::getTreatmentsByHospitalSpecialty($hospitalId, $specialtyId);
            //dd($treatments);
            return view('portal.partials.ajax.hospital-speciality-list-condition',compact('conditions'));
        }
        catch(HospitalProfileException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        }
        catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
    }

    /* Get all specialists for the hospital and speciality
     * @params hospitalId, specialty Id
     * @throws PatientUserException
     * @return array|null
     * @author Baskar
     */

    public function getSpecialistsForHospitalAndSpecialty($hospitalId, $specialtyId)
    {
        $specialists = null;

        try
        {
            $topSpecialists = UserServiceFacade::getSpecialistsForHospitalAndSpecialty($hospitalId, $specialtyId);
            return view('portal.partials.ajax.hospital-speciality-list-doctor',compact('topSpecialists'));
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        }
        catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
    }


    /**
     * Get Treatments by Hospital and Specialty
     * @param String $hospitalIds, $specialty
     * @throws HospitalProfileException
     * @return array|null
     * @author Baskar
     */

    public function getTreatmentsByHospitalSpecialty($hospitalId, $specialtyId)
    {
        $treatments = null;
        //dd($hospitalId);

        try
        {
            //dd($hospitalId);
            //dd($specialtyId);
            $treatments = HospitalServiceFacade::getTreatmentsByHospitalSpecialty($hospitalId, $specialtyId);
            //dd($treatments);
            return view('portal.partials.ajax.hospital-speciality-list-treatment',compact('treatments'));
        }
        catch(HospitalProfileException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        }
        catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
    }




    public function getTreatmentsDetailsByHospitalSpecialty($hospitalId, $specialtyId)
    {
        $treatments = null;
        //dd($hospitalId);

        try
        {
            //dd($hospitalId);
            //dd($specialtyId);
            $treatments = HospitalServiceFacade::getTreatmentsByHospitalSpecialty($hospitalId, $specialtyId);
            //dd($treatments);
            return view('portal.partials.ajax.hospital-speciality-list-treatment',compact('treatments'));
        }
        catch(HospitalProfileException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        }
        catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
    }

    /* Get all the support services
     * @params none
     * @throws PatientUserException
     * @return array||null
     * @author Baskar
     */

    public function getAllSupportServices()
    {
        $supportServices = null;

        try
        {
            $supportServices = UserServiceFacade::getAllSupportServices();
            dd($supportServices);
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        }
        catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
    }

    public function addHcfToFavourites($hcfId)
    {
        $status = true;
        //dd($hcfId);

        //Patient Id is hard coded. This should be retrieved from the logged in user.
        //Hospital Id should be removed
        //$hospitalId = 591;
        //$patientId = 9749;
        $patientId = Auth::user()->id;
       // dd($patientId);
        try{
            //$userService->addToFavourites($hospitalId, $patientId);
            $status = UserServiceFacade::addHcfToFavourites($hcfId, $patientId);
            //dd($status[0]);
            if($status[0]==true) { $status_return = 0; } else { $status_return = 1;  }
        }
        catch(HcfUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        }
        catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
        return $status_return;
    }

    public function contactHcf($hid)
    {
        try
        {
            //$userId = Auth::user()->id;
            $roleId = UserType::USERTYPE_PATIENT;

            $hcfId = $hid;
            $hcfIds[0]=$hcfId;
            $creatorId= Auth::user()->id;

            $hcfInfo = HcfServiceFacade::getAllHcfInfoByHcfIds($hcfIds, null);
            if (!empty($hcfInfo)) {
                //View Model
                $detailsView = new HcfDetailsViewModel();
                $detailsView->hcfInfo = (isset($hcfInfo)) ? $hcfInfo : null;//Using for listing hcf Info
            }
//dd($detailsView);
            $CountryList=HelperServiceFacade::getCountryList($creatorId);
            $PatientList=UserServiceFacade::getPatientListForCreator($creatorId);
            //dd($PatientList);
            $CategoryList = UserServiceFacade::getDocumentCategories($roleId);
            $treatmentList = HospitalServiceFacade::getTreatmentList();
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        }
        catch(HcfProfileException $profileExc)
        {
            $errorMsg = $profileExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($profileExc);
            Log::error($msg);
        }
        catch(HcfUserException $hospUserExc)
        {
            $errorMsg = $hospUserExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($hospUserExc);
            Log::error($msg);
        }
        catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }

        //dd($treatmentList);
        return view('portal.contact-hcf-form',$detailsView, compact('CountryList','PatientList','CategoryList','hcfId','treatmentList'));
    }

    public function contactInterpreter($interid)
    {
        try
        {
            //$userId = Auth::user()->id;
            $roleId = UserType::USERTYPE_PATIENT;

            $interpreterId = $interid;
            $interpreterIds[0]=$interpreterId;
            $creatorId= Auth::user()->id;

            $interpreterInfo = InterpreterServiceFacade::getAllInterpreterInfoByInterpreterIds($interpreterIds, null);
            if (!empty($interpreterInfo)) {
                //View Model
                $detailsView = new InterpreterDetailsViewModel();
                $detailsView->interpreterInfo = (isset($interpreterInfo)) ? $interpreterInfo : null;//Using for listing hcf Info
            }
//dd($detailsView);
            $CountryList=HelperServiceFacade::getCountryList($creatorId);
            $PatientList=UserServiceFacade::getPatientListForCreator($creatorId);
            //dd($PatientList);
            $CategoryList = UserServiceFacade::getDocumentCategories($roleId);
            $treatmentList = HospitalServiceFacade::getTreatmentList();
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        }
        catch(InterpreterProfileException $profileExc)
        {
            $errorMsg = $profileExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($profileExc);
            Log::error($msg);
        }
        catch(HcfUserException $hospUserExc)
        {
            $errorMsg = $hospUserExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($hospUserExc);
            Log::error($msg);
        }
        catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }

        //dd($treatmentList);
        return view('portal.contact-interpreter-form',$detailsView, compact('CountryList','PatientList','CategoryList','interpreterId','treatmentList'));
    }

    public function emailSubscription(SubscriptionRequest $request)
    {
        //dd($request);
        $status = true;

        try{
            //dd($request);
            $email = $request['email'];
            //dd($email);
            $status = UserServiceFacade::emailSubscription($email);
            //dd($status);
            if($status == true) {
                return redirect()-> back() ->with('status1', 'Thank You for Subscribing.');
            }
            else {
                return redirect()-> back() ->with('status2', 'Sorry. You have already subscribed.');
            }
        }
        catch(SubscriptionException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        }
        catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
        return $status;
    }

    public function getEnquiryForm()
    {
        try
        {
            $roleId = UserType::USERTYPE_PATIENT;
            $creatorId= Auth::user()->id;
            //dd($creatorId);
            $patientInfo = UserServiceFacade::getPatientProfile($creatorId);
            $countryId = $patientInfo[0] -> country;
            //dd($countryId);
            $cityList=HospitalServiceFacade::getCitiesForFilter($countryId);
            //dd($cityList);
            $CategoryList = UserServiceFacade::getDocumentCategories($roleId);
            $treatmentList = HospitalServiceFacade::getTreatmentList();
            //dd($treatmentList);
        }
        catch(PatientUserException $userExc)
        {
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
            //return redirect('exception')->with('message',$errorMsg." ".trans('messages.SupportTeam'));
        }
        catch (Exception $ex) {
            //throw $ex;
            $msg = AppendMessage::appendGeneralException($ex);
            Log::error($msg);
            //return redirect('exception')->with('message',trans('messages.SupportTeam'));
        }
        // dd($treatmentList);
       return view('portal.enquiry-form',compact('patientInfo','CategoryList','treatmentList', 'cityList'));
    }

    public function saveContactGeneralEnquiry(GeneralEnquiryRequest $request)
    {
        $status = true;
        $saveContactEnquiry = NULL;
        $creatorId=Auth::user()->id;
        //dd($request);
        try
        {
            $city = $request -> city;
            $budget = $request -> budget;
            $accreditation = $request -> accreditation;
            $treatmentId = $request ->treatmentid;
            $patientInfo = UserServiceFacade::getPatientProfile($creatorId);
            //dd($city);
            //$hospitalByCities = HospitalServiceFacade::getHospitalsByCityID($city);
            //$hospitalByAccreditation = HospitalServiceFacade::getHospitalsByAccreditationID($accreditation);
            $hospitalLists = HospitalServiceFacade::getHospitalsByCityAndAccreditation($city,$accreditation,$treatmentId);
            //dd($hospitalLists);
            if($hospitalLists != NULL) {
                //dd("Hi");
                foreach ($hospitalLists as $hospital) {
                    //dd("Hi Inside loop");
                    $saveContactEnquiry = PatientEnquiryMapper::setPatientDetailsforPostEnquiry($request, $hospital, $patientInfo);
                    //dd($saveContactEnquiry);
                    $status = UserServiceFacade::saveContactHospitalEnquiry($saveContactEnquiry);
                    //dd($status);
                }
                if ($status) {
                    $msg = trans('messages.' . ErrorEnum::PATIENT_CONTACT_FORM_SAVE_SUCCESS);
                    $savesuccess = Config::get('toastr.savesuccess');
                    Toastr::success($msg, $title = 'PATIENT ENQUIRY FORM', $savesuccess);
                    return view('portal.talktohospital-post-query',compact('hospitalLists'));
                }
            }
            else{
                //dd("Hi else");
                $msg="Sorry no hospitals found for your search request.";
                $creatorId= Auth::user()->id;
                return redirect('patient/'.$creatorId.'/enquiryform')->with('message',$msg);
            }
        }
        catch(HospitalProfileException $userExc)
        {
            //dd($userExc);
            $errorMsg = $userExc->getMessageForCode();
            $msg = AppendMessage::appendMessage($userExc);
            Log::error($msg);
        }
        catch(Exception $exc)
        {
            //dd($exc);
            $msg = AppendMessage::appendGeneralException($exc);
            Log::error($msg);
        }

    }


}
