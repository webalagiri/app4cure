<?php
/**
 * Created by PhpStorm.
 * User: adm
 * Date: 8/8/2016
 * Time: 5:12 PM
 */

namespace App\prescription\services;

use App\prescription\facades\HospitalServiceFacade;
use App\prescription\repositories\repointerface\HospitalInterface;
use App\prescription\utilities\Exception\HospitalException;
use App\prescription\utilities\ErrorEnum\ErrorEnum;
use Illuminate\Support\Facades\DB;

use Exception;


class HospitalService {

    protected $hospitalRepo;

    public function __construct(HospitalInterface $hospitalRepo)
    {
        //dd('Inside constructor');
        $this->hospitalRepo = $hospitalRepo;
    }

    /**
     * Get list of hospitals
     * @param none
     * @throws $hospitalException
     * @return array | null
     * @author Baskar
     */

    public function getHospitals()
    {
        $hospitals = null;

        try
        {
            $hospitals = $this->hospitalRepo->getHospitals();
        }
        catch(HospitalException $hospitalExc)
        {
            throw $hospitalExc;
        }
        catch(Exception $exc)
        {
            throw new HospitalException(null, ErrorEnum::HOSPITAL_LIST_ERROR, $exc);
        }

        return $hospitals;
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
        //dd('Inside service method');

        try
        {
            $hospitals = $this->hospitalRepo->getHospitalByKeyword($keyword);
        }
        catch(HospitalException $hospitalExc)
        {
            throw $hospitalExc;
        }
        catch(Exception $exc)
        {
            throw new HospitalException(null, ErrorEnum::HOSPITAL_LIST_ERROR, $exc);
        }

        return $hospitals;
    }

    //Get Appointment details

    /**
     * Get list of appointments for the hospital and the doctor
     * @param $hospitalId, $doctorId
     * @throws $hospitalException
     * @return array | null
     * @author Baskar
     */

    public function getAppointmentsByHospitalAndDoctor($hospitalId, $doctorId)
    {
        $appointments = null;

        try
        {
            $appointments = $this->hospitalRepo->getAppointmentsByHospitalAndDoctor($hospitalId, $doctorId);
        }
        catch(HospitalException $hospitalExc)
        {
            throw $hospitalExc;
        }
        catch(Exception $exc)
        {
            throw new HospitalException(null, ErrorEnum::APPOINTMENT_LIST_ERROR, $exc);
        }

        return $appointments;
    }

    //Get Patient List
    /**
     * Get list of patients for the hospital and patient name
     * @param $hospitalId, $keyword
     * @throws $hospitalException
     * @return array | null
     * @author Baskar
     */

    //public function getPatientsByHospital($hospitalId, $keyword)
    public function getPatientsByHospital($hospitalId)
    {
        $patients = null;

        try
        {
            $patients = $this->hospitalRepo->getPatientsByHospital($hospitalId);
        }
        catch(HospitalException $hospitalExc)
        {
            throw $hospitalExc;
        }
        catch(Exception $exc)
        {
            throw new HospitalException(null, ErrorEnum::PATIENT_LIST_ERROR, $exc);
        }

        return $patients;
    }

    /**
     * Get patient details by patient id
     * @param $patientId
     * @throws $hospitalException
     * @return array | null
     * @author Baskar
     */

    public function getPatientDetailsById($patientId)
    {
        $patientDetails = null;

        try
        {
            $patientDetails = $this->hospitalRepo->getPatientDetailsById($patientId);
        }
        catch(HospitalException $hospitalExc)
        {
            throw $hospitalExc;
        }
        catch(Exception $exc)
        {
            throw new HospitalException(null, ErrorEnum::PATIENT_LIST_ERROR, $exc);
        }

        return $patientDetails;
    }

    //Get Patient Profile
    /**
     * Get patient profile by patient id
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
            $patientProfile = $this->hospitalRepo->getPatientProfile($patientId);
        }
        catch(HospitalException $hospitalExc)
        {
            throw $hospitalExc;
        }
        catch(Exception $exc)
        {
            throw new HospitalException(null, ErrorEnum::PATIENT_PROFILE_ERROR, $exc);
        }

        return $patientProfile;
    }

    //Get Prescription List
    /**
     * Get list of prescriptions for the selected hospital and doctor
     * @param $hospitalId, $doctorId
     * @throws $hospitalException
     * @return array | null
     * @author Baskar
     */

    public function getPrescriptions($hospitalId, $doctorId)
    {
        $prescriptions = null;

        try
        {
            $prescriptions = $this->hospitalRepo->getPrescriptions($hospitalId, $doctorId);
        }
        catch(HospitalException $hospitalExc)
        {
            throw $hospitalExc;
        }
        catch(Exception $exc)
        {
            throw new HospitalException(null, ErrorEnum::PRESCRIPTION_LIST_ERROR, $exc);
        }

        return $prescriptions;
    }

    /**
     * Get list of prescriptions for the patient
     * @param $patientId
     * @throws $hospitalException
     * @return array | null
     * @author Baskar
     */

    public function getPrescriptionByPatient($patientId)
    {
        $prescriptions = null;

        try
        {
            $prescriptions = $this->hospitalRepo->getPrescriptionByPatient($patientId);
        }
        catch(HospitalException $hospitalExc)
        {
            throw $hospitalExc;
        }
        catch(Exception $exc)
        {
            throw new HospitalException(null, ErrorEnum::PRESCRIPTION_LIST_ERROR, $exc);
        }

        return $prescriptions;
    }

    /**
     * Get prescription details for the patient by prescription Id
     * @param $prescriptionId
     * @throws $hospitalException
     * @return array | null
     * @author Baskar
     */

    public function getPrescriptionDetails($prescriptionId)
    {
        $prescriptionDetails = null;

        try
        {
            $prescriptionDetails = $this->hospitalRepo->getPrescriptionDetails($prescriptionId);
        }
        catch(HospitalException $hospitalExc)
        {
            throw $hospitalExc;
        }
        catch(Exception $exc)
        {
            throw new HospitalException(null, ErrorEnum::PRESCRIPTION_DETAILS_ERROR, $exc);
        }

        return $prescriptionDetails;
    }

    /**
     * Save Prescription for the patient
     * @param
     * @throws $hospitalException
     * @return true | false
     * @author Baskar
     */

    public function savePatientPrescription($patientPrescriptionVM)
    {
        $status = true;

        try
        {
            DB::transaction(function() use ($patientPrescriptionVM, &$status)
            {
                $status = $this->hospitalRepo->savePatientPrescription($patientPrescriptionVM);
            });

        }
        catch(HospitalException $hospitalExc)
        {
            $status = false;
            throw $hospitalExc;
        }
        catch (Exception $ex) {

            $status = false;
            throw new HospitalException(null, ErrorEnum::PRESCRIPTION_DETAILS_SAVE_ERROR, $ex);
        }

        return $status;
    }

    //Search by Patient Name
    /**
     * Get patient names by keyword
     * @param $keyword
     * @throws $hospitalException
     * @return array | null
     * @author Baskar
     */

    public function searchPatientByName($keyword)
    {
        $patientNames = null;

        try
        {
            $patientNames = $this->hospitalRepo->searchPatientByName($keyword);
        }
        catch(HospitalException $hospitalExc)
        {
            throw $hospitalExc;
        }
        catch(Exception $exc)
        {
            throw new HospitalException(null, ErrorEnum::PATIENT_LIST_ERROR, $exc);
        }

        return $patientNames;
    }

    //Search by Patient Pid
    /**
     * Get patient details by PID
     * @param $pid
     * @throws $hospitalException
     * @return array | null
     * @author Baskar
     */

    public function searchPatientByPid($pid)
    {
        $patient = null;

        try
        {
            $patient = $this->hospitalRepo->searchPatientByPid($pid);
        }
        catch(HospitalException $hospitalExc)
        {
            throw $hospitalExc;
        }
        catch(Exception $exc)
        {
            throw new HospitalException(null, ErrorEnum::PATIENT_LIST_ERROR, $exc);
        }

        return $patient;
    }

    //Drugs
    /**
     * Get brand names by keyword
     * @param $keyword
     * @throws $hospitalException
     * @return array | null
     * @author Baskar
     */

    public function getBrandNames($keyword)
    {
        $brands = null;

        try
        {
            $brands = $this->hospitalRepo->getBrandNames($keyword);
        }
        catch(HospitalException $hospitalExc)
        {
            throw $hospitalExc;
        }
        catch(Exception $exc)
        {
            throw new HospitalException(null, ErrorEnum::BRAND_LIST_ERROR, $exc);
        }

        return $brands;
    }

    //Lab Tests
    /**
     * Get all lab tests
     * @param none
     * @throws $hospitalException
     * @return array | null
     * @author Baskar
     */

    public function getLabTests()
    {
        $labTests = null;

        try
        {
            $labTests = $this->hospitalRepo->getLabTests();
        }
        catch(HospitalException $hospitalExc)
        {
            throw $hospitalExc;
        }
        catch(Exception $exc)
        {
            throw new HospitalException(null, ErrorEnum::LAB_LIST_ERROR, $exc);
        }

        return $labTests;
    }

    /**
     * Get list of lab tests for the selected hospital and doctor
     * @param $hospitalId, $doctorId
     * @throws $hospitalException
     * @return array | null
     * @author Baskar
     */

    public function getLabTestsForPatient($hospitalId, $doctorId)
    {
        $patientLabTests = null;

        try
        {
            $patientLabTests = $this->hospitalRepo->getLabTestsForPatient($hospitalId, $doctorId);
        }
        catch(HospitalException $hospitalExc)
        {
            throw $hospitalExc;
        }
        catch(Exception $exc)
        {
            throw new HospitalException(null, ErrorEnum::LAB_LIST_ERROR, $exc);
        }

        return $patientLabTests;
    }

    /**
     * Get list of labtests for the patient
     * @param $patientId
     * @throws $hospitalException
     * @return array | null
     * @author Baskar
     */

    public function getLabTestsByPatient($patientId)
    {
        $patientLabTests = null;

        try
        {
            $patientLabTests = $this->hospitalRepo->getLabTestsByPatient($patientId);
        }
        catch(HospitalException $hospitalExc)
        {
            throw $hospitalExc;
        }
        catch(Exception $exc)
        {
            throw new HospitalException(null, ErrorEnum::LAB_LIST_ERROR, $exc);
        }

        return $patientLabTests;
    }

    /**
     * Get lab test details for the given lab test id
     * @param $labTestId
     * @throws $hospitalException
     * @return array | null
     * @author Baskar
     */

    public function getLabTestDetails($labTestId)
    {
        $labTestDetails = null;

        try
        {
            $labTestDetails = $this->hospitalRepo->getLabTestDetails($labTestId);
        }
        catch(HospitalException $hospitalExc)
        {
            throw $hospitalExc;
        }
        catch(Exception $exc)
        {
            throw new HospitalException(null, ErrorEnum::LAB_DETAILS_ERROR, $exc);
        }

        return $labTestDetails;
    }

    /**
     * Save labtests for the patient
     * @param $patientLabTestVM
     * @throws $hospitalException
     * @return true | false
     * @author Baskar
     */

    public function savePatientLabTests($patientLabTestVM)
    {
        $status = true;

        try
        {
            DB::transaction(function() use ($patientLabTestVM, &$status)
            {
                $status = $this->hospitalRepo->savePatientLabTests($patientLabTestVM);
            });

        }
        catch(HospitalException $hospitalExc)
        {
            $status = false;
            throw $hospitalExc;
        }
        catch (Exception $ex) {

            $status = false;
            throw new HospitalException(null, ErrorEnum::PRESCRIPTION_DETAILS_SAVE_ERROR, $ex);
        }

        return $status;
    }

    /**
     * Get the hospital id for the given pharmacy or lab id
     * @param $userTypeId, $userId
     * @throws $hospitalException
     * @return array | null
     * @author Baskar
     */

    public function getHospitalId($userTypeId, $userId)
    {
        $hospitalId = null;

        try
        {
            $hospitalId = $this->hospitalRepo->getHospitalId($userTypeId, $userId);
        }
        catch(HospitalException $hospitalExc)
        {
            throw $hospitalExc;
        }
        catch(Exception $exc)
        {
            throw new HospitalException(null, ErrorEnum::HOSPITAL_ID_ERROR, $exc);
        }

        return $hospitalId;
    }


    public function registerNewPatient($patientInfo)
    {
        $status = true;

        try
        {
            DB::transaction(function() use($patientInfo)
            {
                $status = $this->hospitalRepo->registerNewPatient($patientInfo);
            });
        }
        catch(HospitalException $userExc)
        {
            $status = false;
            throw $userExc;
        }
        catch (Exception $ex) {
            $status = false;
            throw new HospitalException(null, ErrorEnum::NEW_PATIENT_REGISTRATION_ERROR, $ex);
        }

        return $status;
    }

}