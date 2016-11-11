<?php

namespace App\Http\Controllers\Common;

use App\prescription\model\entities\Patient;
use App\prescription\model\entities\Countries;
use App\prescription\model\entities\States;
use App\prescription\model\entities\Cities;
use App\prescription\model\entities\Areas;



use App\prescription\services\HelperService;
use App\prescription\services\HospitalService;
use App\prescription\facades\HospitalServiceFacade;
use App\prescription\utilities\Exception\HelperException;
use App\prescription\utilities\Exception\HospitalException;
use App\prescription\utilities\Exception\AppendMessage;
use App\prescription\common\ResponseJson;
use App\prescription\utilities\ErrorEnum\ErrorEnum;
use App\User;

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
//use Illuminate\Mail;
//use Illuminate\Contracts\Mail;
use Illuminate\Support\Facades\URL;

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


    //VIMAL

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


    public function registerFormPatient()
    {
        return view('portal.customer-register');
    }

    public function registerNewPatient(Request $patientRequest)
    {


        $status =  true;
        $patientInfo = $patientRequest->all();
        //dd($patientInfo);

        /*
        $email  = $patientInfo['email'];
        $userInfo = User::where('email','=',$email)->first();
        dd($userInfo['id']);
        */
        try
        {
            //$status =  true;
            // $patientInfo = $patientRequest->all();


            $status = HospitalServiceFacade::registerNewPatient($patientInfo);
            if($status)
            {



                $email  = $patientInfo['email'];
                $name  = $patientInfo['name'];
                $password  = $patientInfo['password'];

                $userInfo = User::where('email','=',$email)->first();
                //dd($userInfo['id']);
                $userId = $userInfo['id'];
                $url  = URL::to('/').'/common/activation/'.$userId.'/'.md5($email);
                $link  = '<a href="'.$url.'">'.$url.'</a>';

                // recipients
                $to  = $patientInfo['email'];
                // subject
                $subject = 'App4Cure - New Account Email Verification';
                // message
                $message = '<html>
                            <head>
                              <title>App4Cure - New Account Email Verification</title>
                            </head>
                            <body>
                              <p>App4Cure - New Account Email Verification</p>
                              <table>
                                <tr>
                                  <th>Dear '.$name.'</th>
                                </tr>
                                <tr>
                                  <td>Thanks for register with us. Please verify your email account with below link</td>
                                </tr>
                                <tr>
                                  <td>Click :: '.$link.'</td>
                                </tr>
                                <tr>
                                  <td>Thanks, <br/> App4Cure Team</td>
                                </tr>
                              </table>
                            </body>
                            </html>';

                // To send HTML mail, the Content-type header must be set
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                // Additional headers
                $headers .= 'To: '.$patientInfo['name'].'<'.$patientInfo['email'].'>' . "\r\n";
                $headers .= 'From: App4Cure <noreply@app4cure.co.in>' . "\r\n";

                //echo $sucmsg="Registration Done Successfully! We send Activation Mail. Please Check your Email.";
                //echo "<h1>Email Server Issues</h1>";
                //echo $message;
                //exit;

                /*
                Mail::send('emails.welcome',array('name'=>$name,'email'=>$email,'password'=>$password,'url'=>$link), function($message) use($email,$name,$subject) {
                    $message->from('noreply@app4cure.co.in', 'App4Cure');
                    $message->to( $email, $name)->subject($subject);
                });
                */
                // Mail it
                if(mail($to, $subject, $message, $headers))
                {

                    $sucmsg="Registration Done Successfully! We send Activation Mail. Please Check your Email.";
                    return redirect('customer-login')->with('success',$sucmsg);
                }
                else
                {
                    echo $sucmsg="Registration Done Successfully! We send Activation Mail. Please Check your Email.";
                    echo "<h1>Email Server Issues</h1>";
                    echo $message;
                    exit;
                }

                // dd("Saved successfully");
                $sucmsg="Registration Done Successfully! We send Activation Mail. Please Check your Email.";
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

    public function activationNewPatient($id, $code)
    {
        $status =  true;
        $patientInfo[] = $id;
        $patientInfo[] = $code;
        //dd($patientInfo);

        try
        {

            $userInfo = User::find($id);
            if($code==md5($userInfo['email']))
            {
                //dd($userInfo);
                $userInfo->id = $userInfo['id'];
                $userInfo->verification = "1";
                $userInfo->save();

                //dd($userInfo);
                $sucmsg="Email Verification Successfully! Please Check your Email.";
                return redirect('customer-login')->with('success',$sucmsg);


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


                if(Auth::user()->verification==0)
                {
                    //dd(Auth::user());
                    Auth::logout();
                    Session::flush();
                    $msg="Email Verification Pending! Try Again.";
                    return redirect('customer-login')->with('message',$msg);
                }


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


                    $patientInfo = Patient::where('customer_id','=',Auth::user()->id)->first();
                    if($patientInfo->pincode=="")
                    {
                        $msg="Please Enter Contact Details to Complete Registration";
                        return redirect('patient/'.Auth::user()->id.'/updateprofile')->with('message',$msg);;
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
                else if(Auth::user()->hasRole('admin'))
                {
                    //dd(Auth::user());
                    $LoginUserId=Session::put('LoginUserId', Auth::user()->id);
                    $LoginUserType=Session::put('LoginUserType', 'patient');
                    $DisplayName=Session::put('DisplayName', ucfirst(Auth::user()->name));
                    $AuthDisplayName=Session::put('AuthDisplayName', ucfirst(Auth::user()->name));
                    $AuthDisplayPhoto=Session::put('AuthDisplayPhoto', "no-image.jpg");
                    // dd(Auth::user()->name);
                    return redirect('admin/dashboard');
                    //return redirect('admin/'.Auth::user()->id.'/dashboard');
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

    public function updatePatient()
    {
        $patientId=Auth::user()->id;
        $patientInfo = HospitalServiceFacade::getPatientUpdateInfo($patientId);
        $countryInfo = CommonController::getCountry();
        $stateInfo = CommonController::getState();
        $cityInfo = CommonController::getCity();
        $areaInfo = CommonController::getArea();
        //dd($areaInfo);

        return view('portal.customer-update-profile',compact('patientInfo','countryInfo','stateInfo','cityInfo','areaInfo'));
    }

    public function updateSavePatient(Request $patientProfileInfo)
    {
        $status =  true;
        $patientProfileInfoValue = $patientProfileInfo->all();
        //dd($patientProfileInfoValue);


        $patientAreaInfo = Areas::find($patientProfileInfoValue['area']);
        //dd($patientAreaInfo['area_pincode']);
        $patientId=Auth::user()->id;

        $patientInfo = Patient::where('customer_id','=',$patientId)->first();

        $patientInfo->customer_name = $patientProfileInfoValue['customer_name'];
        $patientInfo->telephone = $patientProfileInfoValue['telephone'];
        $patientInfo->address = $patientProfileInfoValue['address'];
        $patientInfo->country = $patientProfileInfoValue['country'];
        $patientInfo->state = $patientProfileInfoValue['state'];
        $patientInfo->city = $patientProfileInfoValue['city'];
        $patientInfo->area = $patientProfileInfoValue['area'];
        $patientInfo->pincode = $patientAreaInfo['area_pincode'];
        $patientInfo->updated_by = $patientProfileInfoValue['customer_name'];
        $patientInfo->updated_at = date("Y-m-d H:i:s");
        $patientInfo->save();


        return redirect('patient/'.Auth::user()->id.'/dashboard');
        //return view('portal.customer-update-profile',compact('patientInfo','countryInfo','stateInfo','cityInfo','areaInfo'));
    }

    public function editPatient()
    {
        $patientId=Auth::user()->id;
        $patientInfo = HospitalServiceFacade::getPatientInfo($patientId);
        $countryInfo = CommonController::getCountry();
        $stateInfo = CommonController::getState();
        $cityInfo = CommonController::getCity();
        $areaInfo = CommonController::getArea();

        return view('portal.customer-edit-profile',compact('patientInfo','countryInfo','stateInfo','cityInfo','areaInfo'));
    }

    public function editSavePatient(Request $patientProfileInfo)
    {
        $status =  true;
        $patientProfileInfoValue = $patientProfileInfo->all();
        //dd($patientProfileInfoValue);


        $patientAreaInfo = Areas::find($patientProfileInfoValue['area']);
        //dd($patientAreaInfo['area_pincode']);
        $patientId=Auth::user()->id;

        $patientInfo = Patient::where('customer_id','=',$patientId)->first();

        $patientInfo->customer_name = $patientProfileInfoValue['customer_name'];
        $patientInfo->telephone = $patientProfileInfoValue['telephone'];
        $patientInfo->address = $patientProfileInfoValue['address'];
        $patientInfo->country = $patientProfileInfoValue['country'];
        $patientInfo->state = $patientProfileInfoValue['state'];
        $patientInfo->city = $patientProfileInfoValue['city'];
        $patientInfo->area = $patientProfileInfoValue['area'];
        $patientInfo->pincode = $patientAreaInfo['area_pincode'];
        $patientInfo->updated_by = $patientProfileInfoValue['customer_name'];
        $patientInfo->updated_at = date("Y-m-d H:i:s");
        $patientInfo->save();


        return redirect('patient/'.Auth::user()->id.'/dashboard');
        //return view('portal.customer-update-profile',compact('patientInfo','countryInfo','stateInfo','cityInfo','areaInfo'));
    }

    public function savePatient()
    {
        return view('portal.customer-dashboard');
    }

    public function changePasswordPatient()
    {
        return view('portal.customer-edit-password');
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



    public function loginAdmin()
    {
        return view('portal.admin-login');
    }

    public function logoutAdmin()
    {
        Auth::logout();
        Session::flush();
        $msg="Login Successfully! Thanks.";
        return redirect('admin/login')->with('message',$msg);
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


    public function UserListAdmin()
    {

        $patientInfo = HospitalServiceFacade::getPatientList();
        //dd($patientInfo);
        $countryInfo = CommonController::getCountry();
        $stateInfo = CommonController::getState();
        $cityInfo = CommonController::getCity();
        $areaInfo = CommonController::getArea();

        //return view('portal.customer-view-profile',compact('patientInfo'));
        return view('admi.portal.customer',compact('patientInfo','countryInfo','stateInfo','cityInfo','areaInfo'));
    }

}
