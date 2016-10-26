<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/2/2016
 * Time: 7:39 PM
 */

namespace App\hotel\mapper;


use App\Http\ViewModels\CustomerModel;
use Illuminate\Http\Request;

//use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomerMapper
{

    public static function setLabDetails($customerRequest)
    {
        $labVM = new LabViewModel();
        $userName = Session::get('DisplayName');

        $labVM->setLabId(Auth::user()->id);
        $labVM->setName($customerRequest['customer_name']);
        $labVM->setAddress($customerRequest['address']);
        $labVM->setCity($customerRequest['city']);
        $labVM->setCountry($customerRequest['country']);
        $labVM->setPincode($customerRequest['pincode']);
        $labVM->setTelephone($customerRequest['telephone']);
        $labVM->setEmail($customerRequest['email']);
        $labVM->setCustomerPhoto($customerRequest['customerphoto']);
        $labVM->setCreatedBy($userName);
        $labVM->setUpdatedBy($userName);
        $labVM->setCreatedAt(date("Y-m-d H:i:s"));
        $labVM->setUpdatedAt(date("Y-m-d H:i:s"));

        return $labVM;
    }
}