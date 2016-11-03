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

use Auth;
use Session;

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
                return redirect('customer-login')->with('success',$sucmsg);
                /*$msg = trans('messages.'.ErrorEnum::NEW_PATIENT_ADD_SUCCESS);
                $savesuccess = Config::get('toastr.savesuccess');
                Toastr::success($msg, $title = 'PROFILE', $savesuccess);*/
            }
            $msg="Register Details Invalid! Try Again.";
            return redirect('customer-login')->with('message',$msg);

        }
        catch (HospitalException $userExc) {
            $errorMsg = $userExc->getMessageForCode();
            //$msg = AppendMessage::appendMessage($userExc);
            //Log::error($msg);
            $msg="Register Details Invalid! Try Again.";
            return redirect('customer-login')->with('message',$msg);
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


    public function loginFormPatient()
    {
        return view('portal.customer-login');
    }

    public function loginPatient(PatientLoginRequest $patientRequest)
    {
        $status =  true;
        $patientInfo = $patientRequest->all();
        //dd($patientInfo);

        try
        {

            if (Auth::attempt(['email' => $patientInfo['email'], 'password' => $patientInfo['password']])) {
                // Authentication passed...

                if(Auth::user()->hasRole('customer'))
                {
                    $LoginUserId=Session::put('LoginUserId', Auth::user()->id);
                    $LoginUserType=Session::put('LoginUserType', 'patient');
                    $DisplayName=Session::put('DisplayName', ucfirst(Auth::user()->name));
                    $AuthDisplayName=Session::put('AuthDisplayName', ucfirst(Auth::user()->name));

                    $id = Auth::user()->id;
                    //$photo = DB::table('patient_info') -> select('photo') -> where('patient_id',$id)->get();
                    $photo = "";
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
                        return redirect('patient/'.Auth::user()->id.'/dashboard');
                    }

                    //return back();
                }
                else if(Auth::user()->hasRole('hospital'))
                {
                    Auth::logout();
                    Session::flush();
                    $msg="Login Details Incorrect! Try Again.";
                    return redirect('customer-login')->with('message',$msg);
                }
                else if(Auth::user()->hasRole('doctor'))
                {
                    Auth::logout();
                    Session::flush();
                    $msg="Login Details Incorrect! Try Again.";
                    return redirect('customer-login')->with('message',$msg);
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
                return redirect('customer-login')->with('message',$msg);
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


    public function dashboardPatient()
    {
        return view('portal.customer-dashboard');
    }

    public function viewPatient()
    {
        $patientId=Auth::user()->id;
        $patientInfo = HospitalServiceFacade::getPatientInfo($patientId);
        //dd($patientInfo);

        return view('portal.customer-view-profile',compact('patientInfo'));
    }

    public function editPatient()
    {
        return view('portal.customer-dashboard');
    }

    public function savePatient()
    {
        return view('portal.customer-dashboard');
    }

    public function changePasswordPatient()
    {
        return view('portal.customer-dashboard');
    }

    public function savePasswordPatient()
    {
        return view('portal.customer-dashboard');
    }





    public function modalLoginPatient(PatientLoginRequest $patientRequest)
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
                        return redirect('patient/'.Auth::user()->id.'/dashboard');
                    }

                    //return back();
                }
                else if(Auth::user()->hasRole('hospital'))
                {
                    Auth::logout();
                    Session::flush();
                    $msg="Only Patients have this permission";
                    return redirect('customer-login')->with('message',$msg);
                }
                else if(Auth::user()->hasRole('doctor'))
                {
                    Auth::logout();
                    Session::flush();
                    $msg="Only Patients have this permission.";
                    return redirect('customer-login')->with('message',$msg);
                }
            }
            else
            {
                Auth::logout();
                Session::flush();
                $msg="Login Details Incorrect! Try Again.";
                return redirect('customer-login')->with('message',$msg);
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


    public function logoutPatient()
    {
        Auth::logout();
        Session::flush();
        $msg="Login Successfully! Thanks.";
        return redirect('customer-login')->with('message',$msg);
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

                $url = 'http://www.app4cure.co.in/';
                $subject = 'Forgot Login - App4Cure';

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
        }
    }
}
