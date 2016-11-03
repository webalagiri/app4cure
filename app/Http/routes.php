<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/





Route::get('/', function () {
    return view('portal.index');
});

Route::get('/about', function () {
    return view('portal.about');
});

Route::get('/medical-services', function () {
    return view('portal.medical-services');
});

Route::get('/shop', function () {
    return view('portal.shop');
});

Route::get('/contact', function () {
    return view('portal.contact');
});


Route::group(['namespace' => 'Common'], function()
{

    Route::get('/customer-register', array('as' => 'customer.register', 'uses' => 'CommonController@registerFormPatient'));
    Route::any('/do-customer-register', array('as' => 'customer.doregister', 'uses' => 'CommonController@registerNewPatient'));

    Route::any('/customer-login', array('as' => 'customer.login', 'uses' => 'CommonController@loginFormPatient'));
    Route::any('/do-customer-login', array('as' => 'customer.dologin', 'uses' => 'CommonController@loginPatient'));

    Route::any('/patient/{id}/dashboard', array('as' => 'customer.dashboard', 'uses' => 'CommonController@dashboardPatient'));
    Route::any('/patient/{id}/viewprofile', array('as' => 'customer.dashboard', 'uses' => 'CommonController@viewPatient'));

    Route::any('/logout', array('as' => 'customer.login', 'uses' => 'CommonController@logoutPatient'));
});

Route::group(['prefix' => 'laboratory'], function()
{
    Route::group(['namespace' => 'Lab'], function()
    {
        Route::any('/', array('as' => 'laboratory.list', 'uses' => 'LabController@laboratoryList'));
    });
});




/* ADMIN */

Route::get('/adm', function () {
    return view('adm.portal.login');
});

Route::get('/login', function () {
    return view('adm.portal.login');
});

Route::post('/dologin', array('as' => 'user.dologin', 'uses' => 'Doctor\DoctorController@userlogin'));

Route::get('/dashboard', function () {
    return view('adm.portal.index');
});


Route::get('/logout', function()
{
    Auth::logout();
    Session::flush();
    return Redirect::to('/');
});

/*Route::group(array('prefix' => 'hospital', 'namespace' => 'Common'), function()
{
   Route::get('rest/api/get/hospitals', array('as' => 'common.hospitals', 'uses' => 'CommonController@getHospitalByKeyword'));
   Route::get('rest/api/{patientId}/profile', array('as' => 'patient.profile', 'uses' => 'CommonController@getPatientProfile'));
});*/

Route::group(['prefix' => 'hospital'], function()
{
   Route::group(['namespace' => 'Common'], function()
   {
       Route::get('rest/api/get/hospitals', array('as' => 'common.hospitals', 'uses' => 'CommonController@getHospitalByKeyword'));
       Route::get('rest/api/{patientId}/profile', array('as' => 'patient.profile', 'uses' => 'CommonController@getPatientProfile'));
   });

});

Route::group(array('prefix' => 'patientx', 'namespace' => 'Common'), function()
{
    Route::get('{id}/dashboard', function () {
        return view('portal.patient-dashboard');
    });
    //Route::get('rest/api/get/hospitals', array('as' => 'common.hospitals', 'uses' => 'CommonController@getHospitalByKeyword'));
    Route::get('rest/api/{patientId}/profile', array('as' => 'patient.profile', 'uses' => 'CommonController@getPatientProfile'));
    Route::get('rest/api/details', array('as' => 'patient.patient', 'uses' => 'CommonController@searchPatientByPid'));
});


Route::group(array('prefix' => 'hospital', 'namespace' => 'Doctor'), function()
{
    Route::get('{id}/dashboard', function () {
        return view('portal.hospital-dashboard');
    });

   Route::get('rest/api/hospitals', array('as' => 'doctor.hospitals', 'uses' => 'DoctorController@getHospitalByKeyword'));
   Route::post('rest/api/login', array('as' => 'doctor.login', 'uses' => 'DoctorController@login'));
   //Route::get('rest/api/login', array('as' => 'doctor.login', 'uses' => 'DoctorController@login'));
   Route::get('rest/api/{hospitalId}/{doctorId}/appointments', array('as' => 'doctor.appointments', 'uses' => 'DoctorController@getAppointmentsByHospitalAndDoctor'));
   Route::get('rest/api/{hospitalId}/patients', array('as' => 'hospital.patients', 'uses' => 'DoctorController@getPatientsByHospital'));
   Route::get('rest/api/{patientId}/details', array('as' => 'patient.details', 'uses' => 'DoctorController@getPatientDetailsById'));
   Route::get('rest/api/{patientId}/profile', array('as' => 'patient.profile', 'uses' => 'DoctorController@getPatientProfile'));
   Route::get('rest/api/{hospitalId}/doctor/{doctorId}/prescriptions', array('as' => 'hospital.prescriptions', 'uses' => 'DoctorController@getPrescriptions'));
   Route::get('rest/api/{patientId}/prescriptions', array('as' => 'patient.prescriptions', 'uses' => 'DoctorController@getPrescriptionByPatient'));
   Route::get('rest/api/prescriptions', array('as' => 'patient.allprescriptions', 'uses' => 'DoctorController@getAllPrescriptions'));
   Route::get('rest/api/prescription/{prescriptionId}', array('as' => 'patient.prescriptiondetails', 'uses' => 'DoctorController@getPrescriptionDetails'));
   Route::get('rest/api/patients', array('as' => 'patient.names', 'uses' => 'DoctorController@searchPatientByName'));
   Route::get('rest/api/patient', array('as' => 'patient.patient', 'uses' => 'DoctorController@searchPatientByPid'));
   Route::get('rest/api/labtests', array('as' => 'lab.labtests', 'uses' => 'DoctorController@getLabTests'));
   Route::get('rest/api/patient/{patientId}/labtests', array('as' => 'patient.labtests', 'uses' => 'DoctorController@getLabTestsByPatient'));
   Route::get('rest/api/{hospitalId}/doctor/{doctorId}/labtests', array('as' => 'hospital.labtests', 'uses' => 'DoctorController@getLabTestsForPatient'));
   Route::get('rest/api/labtests/{labTestId}', array('as' => 'patient.labtestdetails', 'uses' => 'DoctorController@getLabTestDetails'));
   Route::get('rest/api/brands', array('as' => 'drug.brands', 'uses' => 'DoctorController@getBrandNames'));
   //Route::post('rest/api/brands', array('as' => 'drug.brands', 'uses' => 'DoctorController@getBrandNames'));
   Route::post('rest/api/patient/prescription', array('as' => 'patient.saveprescription', 'uses' => 'DoctorController@savePatientPrescription'));
   Route::post('rest/api/patient/labtests', array('as' => 'patient.savelabtests', 'uses' => 'DoctorController@savePatientLabTests'));

});

Route::group(['prefix' => 'pharmacy'], function()
{
    Route::get('{id}/dashboard', function () {
        return view('portal.pharmacy-dashboard');
    });


    Route::group(['namespace' => 'Pharmacy'], function()
    {
        Route::get('rest/api/{pharmacyId}/profile', array('as' => 'pharmacy.viewprofile', 'uses' => 'PharmacyController@getProfile'));
        Route::get('rest/api/{pharmacyId}/hospital/{hospitalId}/patients', array('as' => 'pharmacy.patients', 'uses' => 'PharmacyController@getPatientListForPharmacy'));
        Route::get('rest/api/{pharmacyId}/hospital/{hospitalId}/prescriptions', array('as' => 'pharmacy.prescriptions', 'uses' => 'PharmacyController@getPrescriptionListForPharmacy'));
        Route::get('rest/api/prescription/{prescriptionId}', array('as' => 'pharmacy.prescriptiondetails', 'uses' => 'PharmacyController@getPrescriptionDetails'));
        Route::get('rest/api/prescription', array('as' => 'pharmacy.searchbyprid', 'uses' => 'PharmacyController@getPrescriptionByPrid'));

        Route::get('rest/api/{pharmacyId}/editprofile', array('as' => 'pharmacy.editprofile', 'uses' => 'PharmacyController@editProfile'));
        //Route::post('rest/api/pharmacy', array('as' => 'pharmacy.editpharmacy', 'uses' => 'PharmacyController@editPharmacy'));
        Route::post('rest/api/pharmacy', array('as' => 'pharmacy.editpharmacy', 'uses' => 'PharmacyController@editPharmacy'));

        //Route::get('rest/api/{labId}/changepassword', array('as' => 'lab.changepassword', 'uses' => 'PharmacyController@editChangePassword'));
        //Route::post('rest/api/pharmacy', array('as' => 'pharmacy.editpharmacy', 'uses' => 'PharmacyController@editPharmacy'));
        //Route::get('rest/api/lab', array('as' => 'lab.editlab', 'uses' => 'PharmacyController@saveChangesPassword'));

    });

    /*Route::group(['namespace' => 'Common'], function()
    {
        //Route::get('rest/api/{pharmacyId}/profile', array('as' => 'pharmacy.viewprofile', 'uses' => 'PharmacyController@getProfile'));
        Route::get('rest/api/prescription/{prescriptionId}', array('as' => 'pharmacy.patients', 'uses' => 'CommonController@getPatientListForPharmacy'));
    });*/

});


Route::group(['prefix' => 'doctor'], function()
{
    Route::get('{id}/dashboard', function () {
        return view('portal.doctor-dashboard');
    });


});




Route::group(['prefix' => 'lab'], function()
{
    Route::get('{id}/dashboard', function () {
        return view('portal.lab-dashboard');
    });

    Route::group(['namespace' => 'Lab'], function()
    {
        Route::get('rest/api/{labId}/profile', array('as' => 'lab.viewprofile', 'uses' => 'LabController@getProfile'));
        Route::get('rest/api/{labId}/hospital/{hospitalId}/patients', array('as' => 'lab.patients', 'uses' => 'LabController@getPatientListForLab'));
        Route::get('rest/api/{labId}/hospital/{hospitalId}/labtests', array('as' => 'lab.labtests', 'uses' => 'LabController@getTestsForLab'));
        Route::get('rest/api/labtests', array('as' => 'lab.lid', 'uses' => 'LabController@getLabTestsByLid'));

        Route::get('rest/api/{labId}/editprofile', array('as' => 'lab.editprofile', 'uses' => 'LabController@editProfile'));
        //Route::post('rest/api/lab', array('as' => 'lab.editlab', 'uses' => 'LabController@editLab'));
        Route::post('rest/api/lab', array('as' => 'lab.editlab', 'uses' => 'LabController@editLab'));
        Route::get('rest/api/lab/{labId}', array('as' => 'lab.labdetails', 'uses' => 'LabController@getLabTestDetails'));

        //Route::get('rest/api/{labId}/changepassword', array('as' => 'lab.changepassword', 'uses' => 'LabController@editChangePassword'));
        //Route::post('rest/api/lab', array('as' => 'lab.editlab', 'uses' => 'LabController@editLab'));
        //Route::get('rest/api/lab', array('as' => 'lab.editlab', 'uses' => 'LabController@saveChangesPassword'));
    });

});