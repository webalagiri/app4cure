<?php
/**
 * Created by PhpStorm.
 * User: adm
 * Date: 9/29/2016
 * Time: 10:07 PM
 */

namespace App\prescription\repositories\repoimpl;

use App\Http\ViewModels\LabViewModel;
use App\prescription\model\entities\Doctor;
use App\prescription\model\entities\DoctorSpecialty;

use App\prescription\model\entities\Hospital;

use App\prescription\repositories\repointerface\DoctorInterface;
use App\prescription\utilities\Exception\DoctorException;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\User;

use App\prescription\utilities\ErrorEnum\ErrorEnum;
use Exception;

use Auth;
use Session;

class DoctorImpl implements DoctorInterface
{


    public function doctorList()
    {
        $doctorList = null;

        try
        {
            $query = DB::table('doctor as d')->join('users as u', 'u.id', '=', 'd.doctor_id');
            $query->join('doctor_specialty as dst', 'dst.id', '=', 'd.doctor_specialty_id');
            $query->join('countries as dc', 'dc.id', '=', 'd.country');
            $query->join('states as ds', 'ds.id', '=', 'd.state');
            $query->join('cities as dct', 'dct.id', '=', 'd.city');
            $query->join('areas as da', 'da.id', '=', 'd.area');
            $query->select('d.*', 'dst.name as doctor_speciality_type',
                'da.area_name as doctor_area','dct.city_name as doctor_city',
                'ds.name as doctor_state','dc.name as doctor_country',
                'u.name as user_name', 'u.email as user_email');

            //dd($query->toSql());
            $doctorList = $query->get();
            //dd($doctorList);
/*
            $ltl_query = DB::table('laboratory_tests_link as ltl')->join('users as u', 'u.id', '=', 'ltl.laboratory_id');
            $laboratoryTestList = $ltl_query->get();
dd($laboratoryTestList);
*/
        }
        catch(QueryException $queryExc)
        {
            //dd($queryExc);
            throw new DoctorException(null, ErrorEnum::LAB_PATIENT_LIST_ERROR, $queryExc);
        }
        catch(Exception $exc)
        {
            throw new DoctorException(null, ErrorEnum::LAB_PATIENT_LIST_ERROR, $exc);
        }

        return $doctorList;
    }
/*
    public function laboratoryAddToCart($laboratoryCartInfo)
    {
        $status = true;

        try
        {
            //dd($laboratoryCartInfo);



            //dd(count($laboratoryCartInfo['laboratory_tests']));

            //dd($laboratoryCartInfo['laboratory_tests']);
            foreach($laboratoryCartInfo['laboratory_tests'] as $laboratoryCartInfo_laboratory_tests_id)
            {
                $LabTestLinkInfo = LabTestLink::find($laboratoryCartInfo_laboratory_tests_id);

                //$LabTestLinkInfo = LabTestLink::where($laboratoryCartInfo_laboratory_tests_id);
                //dd($LabTestLinkInfo['laboratory_tests_price']);

                $newLabCart = new LabCart();
                $newLabCart->customer_id = Auth::user()->id;
                $newLabCart->laboratory_id = $laboratoryCartInfo['laboratory_id'];
                $newLabCart->laboratory_tests_id = $laboratoryCartInfo_laboratory_tests_id;
                $newLabCart->laboratory_tests_price = $LabTestLinkInfo['laboratory_tests_price'];
                $newLabCart->laboratory_tests_number = "1";
                $newLabCart->laboratory_tests_total = $laboratoryCartInfo['laboratory_tests_cost'];
                $newLabCart->laboratory_tests_datetime = $laboratoryCartInfo['laboratory_tests_date'];
                $newLabCart->laboratory_tests_notes = $laboratoryCartInfo['laboratory_tests_notes'];
                $newLabCart->created_by = strval(100);
                $newLabCart->updated_by = strval(100);
                $newLabCart->created_at = date("Y-m-d H:i:s");
                $newLabCart->updated_at = date("Y-m-d H:i:s");
                $newLabCart->save();

            }

            //dd($newLabCart);
        }
        catch (QueryException $queryEx)
        {

            $status = false;
            dd($queryEx);
            throw new HospitalException(null, ErrorEnum::NEW_PATIENT_REGISTRATION_ERROR, $queryEx);
        }
        catch (Exception $ex)
        {
            $status = false;
            dd($ex);
            throw new HospitalException(null, ErrorEnum::NEW_PATIENT_REGISTRATION_ERROR, $ex);
        }

        return $status;
    }


    public function laboratoryCart()
    {
        $laboratoryList = null;
        $userId = Session::get('LoginUserId');
        //dd($userId);
        try
        {
            $query = DB::table('laboratory as l')->join('users as u', 'u.id', '=', 'l.laboratory_id');
            $query->join('laboratory_type as lt', 'lt.id', '=', 'l.laboratory_type_id');
            $query->join('countries as lc', 'lc.id', '=', 'l.country');
            $query->join('states as ls', 'ls.id', '=', 'l.state');
            $query->join('cities as lct', 'lct.id', '=', 'l.city');
            $query->join('areas as la', 'la.id', '=', 'l.area');
            $query->join('laboratory_cart as lbct', 'lbct.laboratory_id', '=', 'l.laboratory_id');
            $query->join('laboratory_tests as lbti', 'lbti.id', '=', 'lbct.laboratory_tests_id');
            $query->where('lbct.customer_id', '=', $userId);
            $query->select('l.*','lbct.*','lbti.*', 'lt.name as lab_type',
                'la.area_name as lab_area','lct.city_name as lab_city',
                'ls.name as lab_state','lc.name as lab_country',
                'u.name as user_name', 'u.email as user_email');

            //dd($query->toSql());
            $laboratoryList = $query->get();
            //dd($laboratoryList);
        }
        catch(QueryException $queryExc)
        {
            //dd($queryExc);
            throw new LabException(null, ErrorEnum::LAB_PATIENT_LIST_ERROR, $queryExc);
        }
        catch(Exception $exc)
        {
            throw new LabException(null, ErrorEnum::LAB_PATIENT_LIST_ERROR, $exc);
        }

        return $laboratoryList;
    }



    public function laboratoryConfirm()
    {
        $status = true;
        $laboratoryCartList = null;
        $userId = Session::get('LoginUserId');

        try
        {
            $query = DB::table('laboratory as l')->join('users as u', 'u.id', '=', 'l.laboratory_id');
            $query->join('laboratory_type as lt', 'lt.id', '=', 'l.laboratory_type_id');
            $query->join('countries as lc', 'lc.id', '=', 'l.country');
            $query->join('states as ls', 'ls.id', '=', 'l.state');
            $query->join('cities as lct', 'lct.id', '=', 'l.city');
            $query->join('areas as la', 'la.id', '=', 'l.area');
            $query->join('laboratory_cart as lbct', 'lbct.laboratory_id', '=', 'l.laboratory_id');
            $query->join('laboratory_tests as lbti', 'lbti.id', '=', 'lbct.laboratory_tests_id');
            $query->where('lbct.customer_id', '=', $userId);
            $query->select('l.*','lbct.*','lbti.*', 'lt.name as lab_type',
                'la.area_name as lab_area','lct.city_name as lab_city',
                'ls.name as lab_state','lc.name as lab_country',
                'u.name as user_name', 'u.email as user_email');

            //dd($query->toSql());
            $laboratoryCartList = $query->get();
            //dd($laboratoryCartInfo);



            //dd(count($laboratoryCartInfo['laboratory_tests']));

            //dd($laboratoryCartInfo['laboratory_tests']);
            foreach($laboratoryCartList as $laboratoryCartListValue)
            {

                //$LabTestLinkInfo = LabTestLink::find($laboratoryCartInfo_laboratory_tests_id);
                //$LabTestLinkInfo = LabTestLink::where($laboratoryCartInfo_laboratory_tests_id);
                //dd($LabTestLinkInfo['laboratory_tests_price']);

                $newLabCart = new LabCart();
                $newLabCart->customer_id = Auth::user()->id;
                $newLabCart->laboratory_id = $laboratoryCartListValue['laboratory_id'];
                $newLabCart->laboratory_tests_id = $laboratoryCartListValue['laboratory_tests_id'];
                $newLabCart->laboratory_tests_price = $laboratoryCartListValue['laboratory_tests_price'];
                $newLabCart->laboratory_tests_number = "1";
                $newLabCart->laboratory_tests_total = $laboratoryCartListValue['laboratory_tests_cost'];
                $newLabCart->laboratory_tests_datetime = $laboratoryCartListValue['laboratory_tests_date'];
                $newLabCart->laboratory_tests_notes = $laboratoryCartListValue['laboratory_tests_notes'];
                $newLabCart->created_by = strval(100);
                $newLabCart->updated_by = strval(100);
                $newLabCart->created_at = date("Y-m-d H:i:s");
                $newLabCart->updated_at = date("Y-m-d H:i:s");
                $newLabCart->save();

            }

            //dd($newLabCart);
        }
        catch (QueryException $queryEx)
        {

            $status = false;
            dd($queryEx);
            throw new HospitalException(null, ErrorEnum::NEW_PATIENT_REGISTRATION_ERROR, $queryEx);
        }
        catch (Exception $ex)
        {
            $status = false;
            dd($ex);
            throw new HospitalException(null, ErrorEnum::NEW_PATIENT_REGISTRATION_ERROR, $ex);
        }

        return $status;
    }
*/

}