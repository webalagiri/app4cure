<?php
/**
 * Created by PhpStorm.
 * User: adm
 * Date: 9/29/2016
 * Time: 10:05 PM
 */

namespace App\prescription\repositories\repointerface;


use App\Http\ViewModels\LabViewModel;

interface LabInterface
{
    public function getProfile($labId);
    public function getPatientListForLab($labId, $hospitalId);
    public function getTestsForLab($labId, $hospitalId);
    public function getLabTestsByLid($lid);
    public function editLab(LabViewModel $labVM);
    public function laboratoryList($requestValue);
    public function laboratoryAddToCart($laboratoryCartInfo);

    public function laboratoryCart();
    public function laboratoryConfirm();
}