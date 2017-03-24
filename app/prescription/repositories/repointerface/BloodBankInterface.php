<?php
/**
 * Created by PhpStorm.
 * User: adm
 * Date: 9/29/2016
 * Time: 10:05 PM
 */

namespace App\prescription\repositories\repointerface;


use App\Http\ViewModels\BloodBankViewModel;

interface BloodBankInterface
{
    //public function getProfile($labId);
    //public function getPatientListForLab($labId, $hospitalId);
    //public function getTestsForLab($labId, $hospitalId);
    //public function getLabTestsByLid($lid);
    //public function editLab(BloodBankViewModel $labVM);
    public function bloodBankList();
    public function bloodBankAddToCart($laboratoryCartInfo);

    public function bloodBankCart();
    public function bloodBankConfirm();
}