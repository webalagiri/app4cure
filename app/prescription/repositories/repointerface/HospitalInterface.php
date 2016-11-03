<?php namespace App\prescription\repositories\repointerface;
/**
 * Created by PhpStorm.
 * User: adm
 * Date: 8/8/2016
 * Time: 5:07 PM
 */

use App\Http\ViewModels\PatientLabTestViewModel;
use App\Http\ViewModels\PatientPrescriptionViewModel;

interface HospitalInterface {
    public function getHospitals();
    public function getHospitalByKeyword($keyword = null);
    public function getHospitalId($userTypeId, $userId);

    //Get Appointment details
    public function getAppointmentsByHospitalAndDoctor($hospitalId, $doctorId);

    //Get Patient List
    //public function getPatientsByHospital($hospitalId, $keyword);
    public function getPatientsByHospital($hospitalId);
    public function getPatientDetailsById($patientId);
    public function getPatientProfile($patientId);

    //Get Prescription List
    public function getPrescriptions($hospitalId, $doctorId);
    public function getPrescriptionByPatient($patientId);
    public function getPrescriptionDetails($prescriptionId);
    public function savePatientPrescription(PatientPrescriptionViewModel $patientPrescriptionVM);

    //Search Patient
    public function searchPatientByName($keyword);
    public function searchPatientByPid($pid);

    //Drug list
    public function getBrandNames($keyword);

    //Lab Tests
    public function getLabTests();
    public function getLabTestsForPatient($hospitalId, $doctorId);
    public function getLabTestsByPatient($patientId);
    public function getLabTestDetails($labTestId);
    public function savePatientLabTests(PatientLabTestViewModel $patientLabTestVM);


    public function registerNewPatient($patientInfo);
    public function getPatientInfo($patientId);

}