<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/31/2016
 * Time: 5:54 PM
 */

namespace App\Http\ViewModels;


class PatientPrescriptionViewModel{

    private $patientId;
    private $doctorId;
    private $hospitalId;
    private $drugDetails;
    private $prescriptionDate;
    private $createdBy;
    private $modifiedBy;

    /**
     * @return mixed
     */
    public function getPatientId()
    {
        return $this->patientId;
    }

    /**
     * @param mixed $patientId
     */
    public function setPatientId($patientId)
    {
        $this->patientId = $patientId;
    }

    /**
     * @return mixed
     */
    public function getDoctorId()
    {
        return $this->doctorId;
    }

    /**
     * @param mixed $doctorId
     */
    public function setDoctorId($doctorId)
    {
        $this->doctorId = $doctorId;
    }

    /**
     * @return mixed
     */
    public function getHospitalId()
    {
        return $this->hospitalId;
    }

    /**
     * @param mixed $hospitalId
     */
    public function setHospitalId($hospitalId)
    {
        $this->hospitalId = $hospitalId;
    }

    /**
     * @return mixed
     */
    public function getDrugDetails()
    {
        return $this->drugDetails;
    }

    /**
     * @param mixed $drugDetails
     */
    public function setDrugDetails($drugDetails)
    {
        $this->drugDetails = $drugDetails;
    }

    /**
     * @return mixed
     */
    public function getPrescriptionDate()
    {
        return $this->prescriptionDate;
    }

    /**
     * @param mixed $prescriptionDate
     */
    public function setPrescriptionDate($prescriptionDate)
    {
        $this->prescriptionDate = $prescriptionDate;
    }

    /**
     * @return mixed
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @param mixed $createdBy
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
    }

    /**
     * @return mixed
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    /**
     * @param mixed $modifiedBy
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
    }


    /*public function __toString()
    {
        return $this;
    }*/

}