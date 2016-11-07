<?php

namespace App\Http\Controllers\Admin;

use App\prescription\model\entities\Admin;
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

class AdminController extends Controller
{
    protected $hospitalService;

    public function __construct(HospitalService $hospitalService)
    {
        $this->hospitalService = $hospitalService;
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


    public function dashboardAdmin()
    {
        return view('admi.portal.dashboard');
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
