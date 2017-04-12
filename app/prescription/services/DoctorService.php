<?php
/**
 * Created by PhpStorm.
 * User: adm
 * Date: 9/29/2016
 * Time: 10:19 PM
 */

namespace App\prescription\services;

use App\prescription\repositories\repointerface\DoctorInterface;
use App\prescription\utilities\Exception\DoctorException;
use App\prescription\utilities\ErrorEnum\ErrorEnum;

use Illuminate\Support\Facades\DB;
use Exception;

class DoctorService
{
    protected $doctorRepo;

    public function __construct(DoctorInterface $doctorRepo)
    {
        $this->doctorRepo = $doctorRepo;
    }

    public function doctorList($requestValue)
    {
        $doctorList = null;

        try
        {
            $doctorList = $this->doctorRepo->doctorList($requestValue);
            //dd($doctorList);
        }
        catch(DoctorException $profileExc)
        {
            throw $profileExc;
        }
        catch(Exception $exc)
        {
            throw new DoctorException(null, ErrorEnum::LAB_TESTS_LIST_ERROR, $exc);
        }

        return $doctorList;
    }

/*
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
*/
}