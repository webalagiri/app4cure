<?php
/**
 * Created by PhpStorm.
 * User: adm
 * Date: 9/29/2016
 * Time: 10:07 PM
 */

namespace App\prescription\repositories\repoimpl;

use App\Http\ViewModels\BloodBankViewModel;
use App\prescription\model\entities\BloodBank;
use App\prescription\model\entities\BloodBankCart;
use App\prescription\model\entities\BloodBankService;
use App\prescription\model\entities\LabTestLink;
use App\prescription\repositories\repointerface\BloodBankInterface;
use App\prescription\utilities\Exception\BloodBankException;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\User;

use App\prescription\utilities\ErrorEnum\ErrorEnum;
use Exception;

use Auth;
use Session;

class BloodBankImpl implements BloodBankInterface
{

    /*
    public function getProfile($labId)
    {
        $labProfile = null;

        try
        {
            $query = DB::table('lab as l')->join('cities as c', 'c.id', '=', 'l.city');
            $query->join('countries as co', 'co.id', '=', 'l.country');
            $query->where('l.lab_id', '=', $labId);
            $query->select('l.id', 'l.lab_id', 'l.name as lab_name', 'l.address', 'c.id as city_id', 'c.city_name',
                        'co.id as country_id', 'co.name as country', 'l.pincode', 'l.lid', 'l.telephone', 'l.email');

            //dd($query->toSql());
            $labProfile = $query->get();
        }
        catch(QueryException $queryEx)
        {
            throw new LabException(null, ErrorEnum::LAB_PROFILE_VIEW_ERROR, $queryEx);
        }
        catch(Exception $exc)
        {
            throw new LabException(null, ErrorEnum::LAB_PROFILE_VIEW_ERROR, $exc);
        }

        return $labProfile;
    }

    public function getPatientListForLab($labId, $hospitalId)
    {
        $patients = null;

        try
        {
            $query = DB::table('patient as p')->join('patient_labtest as pl', 'pl.patient_id', '=', 'p.patient_id');
            $query->join('hospital_lab as hl', 'hl.hospital_id', '=', 'pl.hospital_id');
            $query->where('hl.hospital_id', '=', $hospitalId);
            $query->where('hl.lab_id', '=', $labId);
            $query->distinct()->select('p.id', 'p.patient_id', 'p.name', 'p.pid', 'p.telephone','p.age', 'p.gender');

            //dd($query->toSql());
            $patients = $query->get();
            //dd($patients);
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

        return $patients;
    }

    public function getTestsForLab($labId, $hospitalId)
    {
        $labTests = null;

        try
        {

            $query = DB::table('patient as p')->join('patient_labtest as pl', 'pl.patient_id', '=', 'p.patient_id');
            $query->join('hospital_lab as hl', 'hl.hospital_id', '=', 'pl.hospital_id');
            $query->where('hl.hospital_id', '=', $hospitalId);
            $query->where('hl.lab_id', '=', $labId);
            $query->select('p.id', 'p.patient_id', 'p.name', 'p.pid', 'pl.id as labtest_id', 'pl.unique_id as plid', 'pl.labtest_date');

            $labTests = $query->get();
            //dd($prescriptions);
        }
        catch(QueryException $queryEx)
        {
            throw new LabException(null, ErrorEnum::LAB_TESTS_LIST_ERROR, $queryEx);
        }
        catch(Exception $exc)
        {
            throw new LabException(null, ErrorEnum::LAB_TESTS_LIST_ERROR, $exc);
        }

        return $labTests;
    }

    public function getLabTestsByLid($lid)
    {
        $labTests = null;

        try
        {
            $query = DB::table('patient as p')->join('patient_labtest as pl', 'pl.patient_id', '=', 'p.patient_id');
            $query->where('pl.unique_id', '=', $lid);
            $query->select('p.id', 'p.patient_id', 'p.name', 'p.pid', 'pl.id as labtest_id',
                'pl.unique_id as plid', 'pl.labtest_date');

            //dd($query->toSql());
            $labTests = $query->get();
        }
        catch(QueryException $queryEx)
        {
            throw new LabException(null, ErrorEnum::LAB_LIST_LID_ERROR, $queryEx);
        }
        catch(Exception $exc)
        {
            throw new LabException(null, ErrorEnum::LAB_LIST_LID_ERROR, $exc);
        }

        return $labTests;
    }

    public function editLab(LabViewModel $labVM)
    {
        $status = true;
        $lab = null;

        try
        {
            $user = User::find($labVM->getLabId());

            if(!is_null($user))
            {
                $lab = Lab::where('lab_id', '=', $labVM->getLabId())->first();
                //dd($lab);

                if(!is_null($lab))
                {
                    $lab->name = $labVM->getName();
                    $lab->address = $labVM->getAddress();
                    $lab->city = $labVM->getCity();
                    $lab->country = $labVM->getCountry();
                    $lab->pincode = $labVM->getPincode();
                    //$lab->lid = "LA".$labVM->getLabId().time();
                    $lab->telephone = $labVM->getTelephone();
                    //$lab->email = $labVM->getEmail();
                    //$lab->lab_photo = $labVM->getLabPhoto();
                    $lab->created_by = $labVM->getCreatedBy();
                    $lab->updated_by = $labVM->getUpdatedBy();
                    $lab->created_at = $labVM->getCreatedAt();
                    $lab->updated_at = $labVM->getUpdatedAt();

                    $user->lab()->save($lab);
                }


            }
        }
        catch(QueryException $queryEx)
        {
            dd($queryEx);
            $status = false;
            throw new LabException(null, ErrorEnum::LAB_SAVE_ERROR, $queryEx);
        }
        catch(Exception $exc)
        {
            dd($exc);
            $status = false;
            throw new LabException(null, ErrorEnum::LAB_SAVE_ERROR, $exc);
        }

        return $status;
    }
    */
    public function bloodBankList()
    {
        $bloodBankList = null;

        try
        {
            $query = DB::table('bloodbank as b')->join('users as u', 'u.id', '=', 'b.bloodbank_id');
            $query->join('bloodbank_type as bt', 'bt.id', '=', 'b.bloodbank_type_id');
            $query->join('countries as bc', 'bc.id', '=', 'b.country');
            $query->join('states as bs', 'bs.id', '=', 'b.state');
            $query->join('cities as bct', 'bct.id', '=', 'b.city');
            $query->join('areas as ba', 'ba.id', '=', 'b.area');
            $query->select('b.*', 'bt.name as bloodbank_type',
                'ba.area_name as bloodbank_area','bct.city_name as bloodbank_city',
                'bs.name as bloodbank_state','bc.name as bloodbank_country',
                'u.name as user_name', 'u.email as user_email');

            //dd($query->toSql());
            $bloodBankList = $query->get();
            //dd($bloodBankList);

        }
        catch(QueryException $queryExc)
        {
            //dd($queryExc);
            throw new BloodBankException(null, ErrorEnum::LAB_PATIENT_LIST_ERROR, $queryExc);
        }
        catch(Exception $exc)
        {
            throw new BloodBankException(null, ErrorEnum::LAB_PATIENT_LIST_ERROR, $exc);
        }

        return $bloodBankList;
    }

    public function bloodBankAddToCart($laboratoryCartInfo)
    {
        $status = true;

        try
        {
            //dd($laboratoryCartInfo);



            //dd(count($laboratoryCartInfo['laboratory_tests']));

            //dd($laboratoryCartInfo['laboratory_tests']);
            foreach($laboratoryCartInfo['laboratory_tests'] as $laboratoryCartInfo_laboratory_tests_id)
            {
                //print_r($laboratoryCartInfo_laboratory_tests_id);
                $LabTestLinkInfo = LabTestLink::find($laboratoryCartInfo_laboratory_tests_id);
                //print_r($LabTestLinkInfo);
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
//dd('HI');
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


    public function bloodBankCart()
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



    public function bloodBankConfirm()
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

}