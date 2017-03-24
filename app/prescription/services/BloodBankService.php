<?php
/**
 * Created by PhpStorm.
 * User: adm
 * Date: 9/29/2016
 * Time: 10:19 PM
 */

namespace App\prescription\services;

use App\prescription\repositories\repointerface\BloodBankInterface;
use App\prescription\utilities\Exception\BloodBankException;
use App\prescription\utilities\ErrorEnum\ErrorEnum;

use Illuminate\Support\Facades\DB;
use Exception;

class BloodBankService
{
    protected $bloodBankRepo;

    public function __construct(BloodBankInterface $bloodBankRepo)
    {
        $this->bloodBankRepo = $bloodBankRepo;
    }

    /*

    public function getProfile($labId)
    {
        $labProfile = null;

        try
        {
            $labProfile = $this->labRepo->getProfile($labId);
        }
        catch(LabException $profileExc)
        {
            throw $profileExc;
        }
        catch(Exception $exc)
        {
            throw new Exception(null, ErrorEnum::LAB_PROFILE_VIEW_ERROR, $exc);
        }

        return $labProfile;
    }


    public function getPatientListForLab($labId, $hospitalId)
    {
        $patients = null;

        try
        {
            $patients = $this->labRepo->getPatientListForLab($labId, $hospitalId);
        }
        catch(LabException $profileExc)
        {
            throw $profileExc;
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
            $labTests = $this->labRepo->getTestsForLab($labId, $hospitalId);
            //dd($prescriptions);
        }
        catch(LabException $profileExc)
        {
            throw $profileExc;
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
            $labTests = $this->labRepo->getLabTestsByLid($lid);
        }
        catch(LabException $profileExc)
        {
            throw $profileExc;
        }
        catch(Exception $exc)
        {
            throw new LabException(null, ErrorEnum::LAB_LIST_LID_ERROR, $exc);
        }

        return $labTests;
    }


    public function editLab($labVM)
    {
        $status = true;

        try
        {
            //dd('Inside edit lab in service');
            DB::transaction(function() use ($labVM, &$status)
            {
                $status = $this->labRepo->editLab($labVM);
            });

        }
        catch(LabException $profileExc)
        {
            $status = false;
            throw $profileExc;
        }
        catch (Exception $ex) {

            $status = false;
            throw new LabException(null, ErrorEnum::LAB_SAVE_ERROR, $ex);
        }

        return $status;
    }
*/

    public function bloodBankList()
    {
        $bloodBankList = null;

        try
        {
            $bloodBankList = $this->bloodBankRepo->bloodBankList();
            //dd($bloodBankList);
        }
        catch(BloodBankException $profileExc)
        {
            throw $profileExc;
        }
        catch(Exception $exc)
        {
            throw new BloodBankException(null, ErrorEnum::LAB_TESTS_LIST_ERROR, $exc);
        }

        return $bloodBankList;
    }

    public function laboratoryAddToCart($laboratoryCartInfo)
    {
        $status = null;

        try
        {
            $status = $this->labRepo->laboratoryAddToCart($laboratoryCartInfo);
            //dd($laboratoryList);
        }
        catch(LabException $profileExc)
        {
            throw $profileExc;
        }
        catch(Exception $exc)
        {
            throw new LabException(null, ErrorEnum::LAB_TESTS_LIST_ERROR, $exc);
        }

        return $status;
    }

    public function laboratoryCart()
    {
        $laboratoryList = null;

        try
        {
            $laboratoryList = $this->labRepo->laboratoryCart();
            //dd($laboratoryList);
        }
        catch(LabException $profileExc)
        {
            throw $profileExc;
        }
        catch(Exception $exc)
        {
            throw new LabException(null, ErrorEnum::LAB_TESTS_LIST_ERROR, $exc);
        }

        return $laboratoryList;
    }


    public function laboratoryConfirm()
    {
        $laboratoryList = null;

        try
        {
            $laboratoryList = $this->labRepo->laboratoryConfirm();
            //dd($laboratoryList);
        }
        catch(LabException $profileExc)
        {
            throw $profileExc;
        }
        catch(Exception $exc)
        {
            throw new LabException(null, ErrorEnum::LAB_TESTS_LIST_ERROR, $exc);
        }

        return $laboratoryList;
    }

}