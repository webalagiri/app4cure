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

Route::get('/doctors-appointment', function () {
    return view('portal.medical-services');
});

Route::get('/shop', function () {
    return view('portal.shop');
});

Route::get('/contact', function () {
    return view('portal.contact');
});

Route::get('/terms', function () {
    return view('portal.about');
});

Route::get('/privacy', function () {
    return view('portal.about');
});

Route::get('/faq', function () {
    return view('portal.about');
});


Route::group(['namespace' => 'Common'], function()
{

    Route::any('send', array('as' => 'customer.mail', 'uses' => 'CommonController@sendEmail'));

    Route::get('/customer-register', array('as' => 'customer.register', 'uses' => 'CommonController@registerFormPatient'));
    Route::any('/do-customer-register', array('as' => 'customer.doregister', 'uses' => 'CommonController@registerNewPatient'));
    Route::any('/common/activation/{id}/{string}', array('as' => 'customer.activation', 'uses' => 'CommonController@activationNewPatient'));

    Route::any('/customer-login', array('as' => 'customer.login', 'uses' => 'CommonController@loginFormPatient'));
    Route::any('/do-customer-login', array('as' => 'customer.dologin', 'uses' => 'CommonController@loginPatient'));

    Route::any('/login', array('as' => 'customer.login', 'uses' => 'CommonController@loginFormPatient'));

    Route::group(array('middleware' => ['auth']), function() {
        Route::any('/patient/{id}/updateprofile', array('as' => 'customer.updateprofile', 'uses' => 'CommonController@updatePatient'));
        Route::any('/patient/{id}/updatesaveprofile', array('as' => 'customer.updatesaveprofile', 'uses' => 'CommonController@updateSavePatient'));


        Route::any('/patient/{id}/dashboard', array('as' => 'customer.dashboard', 'uses' => 'CommonController@dashboardPatient'));
        Route::any('/patient/{id}/viewprofile', array('as' => 'customer.dashboard', 'uses' => 'CommonController@viewPatient'));
        Route::any('/patient/{id}/editprofile', array('as' => 'customer.dashboard', 'uses' => 'CommonController@editPatient'));
        Route::any('/patient/{id}/editsaveprofile', array('as' => 'customer.editsaveprofile', 'uses' => 'CommonController@editSavePatient'));
        Route::any('/patient/{id}/changepassword', array('as' => 'customer.dashboard', 'uses' => 'CommonController@changePasswordPatient'));


        Route::any('/logout', array('as' => 'customer.login', 'uses' => 'CommonController@logoutPatient'));
    });
});

Route::group(['prefix' => 'laboratory'], function()
{
    Route::group(['namespace' => 'Lab'], function()
    {
        Route::any('/', array('as' => 'laboratory.list', 'uses' => 'LabController@laboratoryList'));
        Route::any('/addtocart', array('as' => 'laboratory.addtocart', 'uses' => 'LabController@laboratoryAddToCart'));
        Route::any('/cart', array('as' => 'laboratory.cart', 'uses' => 'LabController@laboratoryCart'));
        Route::any('/confirm', array('as' => 'laboratory.cart', 'uses' => 'LabController@laboratoryConfirm'));
    });
});

Route::group(['prefix' => 'doctor'], function()
{
    Route::group(['namespace' => 'Doctor'], function()
    {
        Route::any('/', array('as' => 'doctor.list', 'uses' => 'DoctorController@doctorList'));

        Route::any('/addtocart', array('as' => 'doctor.addtocart', 'uses' => 'DoctorController@doctorAddToCart'));
        Route::any('/appointment/{appointmentId}', array('as' => 'doctor.confirm', 'uses' => 'DoctorController@doctorAppointmentConfirm'));

        /*
        Route::any('/addtocart', array('as' => 'laboratory.addtocart', 'uses' => 'LabController@laboratoryAddToCart'));
        Route::any('/cart', array('as' => 'laboratory.cart', 'uses' => 'LabController@laboratoryCart'));
        Route::any('/confirm', array('as' => 'laboratory.cart', 'uses' => 'LabController@laboratoryConfirm'));
        */
    });
});


Route::group(['prefix' => 'bloodbank'], function()
{
    Route::group(['namespace' => 'Bloodbank'], function()
    {
        Route::any('/', array('as' => 'laboratory.list', 'uses' => 'BloodbankController@bloodBankList'));
        Route::any('/addtocart', array('as' => 'laboratory.addtocart', 'uses' => 'BloodbankController@laboratoryAddToCart'));
        Route::any('/cart', array('as' => 'laboratory.cart', 'uses' => 'BloodbankController@laboratoryCart'));
        Route::any('/confirm', array('as' => 'laboratory.cart', 'uses' => 'BloodbankController@laboratoryConfirm'));
    });
});

Route::group(['prefix' => 'admin'], function()
{
    Route::group(['namespace' => 'Common'], function() {

        Route::any('/login', array('as' => 'customer.login', 'uses' => 'CommonController@loginAdmin'));
        Route::any('/do-customer-login', array('as' => 'customer.dologin', 'uses' => 'CommonController@loginPatient'));
        Route::any('/logout', array('as' => 'customer.login', 'uses' => 'CommonController@logoutAdmin'));

    });

    Route::group(array('middleware' => ['auth']), function()
    {

        Route::group(['namespace' => 'Admin'], function()
        {

        Route::any('dashboard', array('as' => 'customer.dashboard', 'uses' => 'AdminController@dashboardAdmin'));

        });

        Route::group(['namespace' => 'Lab'], function()
        {

            Route::any('/laboratory', array('as' => 'laboratory.list', 'uses' => 'LabController@laboratoryListAdmin'));
            Route::any('/laboratory/add', array('as' => 'laboratory.add', 'uses' => 'LabController@laboratoryAddAdmin'));
            Route::any('/laboratory/save', array('as' => 'laboratory.save', 'uses' => 'LabController@laboratorySaveAdmin'));
            Route::any('/laboratory/update', array('as' => 'laboratory.update', 'uses' => 'LabController@laboratoryUpdateAdmin'));

        });

        Route::group(['namespace' => 'Hospital'], function()
        {

            Route::any('/hospital', array('as' => 'hospital.list', 'uses' => 'HospitalController@hospitalListAdmin'));
            Route::any('/hospital/add', array('as' => 'hospital.add', 'uses' => 'HospitalController@hospitalAddAdmin'));
            Route::any('/hospital/save', array('as' => 'hospital.save', 'uses' => 'HospitalController@hospitalSaveAdmin'));
            Route::any('/hospital/update', array('as' => 'hospital.update', 'uses' => 'HospitalController@hospitalUpdateAdmin'));

        });

        Route::group(['namespace' => 'Doctor'], function()
        {

            Route::any('/doctor', array('as' => 'doctor.list', 'uses' => 'DoctorController@doctorListAdmin'));
            Route::any('/doctor/add', array('as' => 'doctor.add', 'uses' => 'DoctorController@doctorAddAdmin'));
            Route::any('/doctor/save', array('as' => 'doctor.save', 'uses' => 'DoctorController@doctorSaveAdmin'));
            Route::any('/doctor/update', array('as' => 'doctor.update', 'uses' => 'DoctorController@doctorUpdateAdmin'));

        });

        Route::group(['namespace' => 'Common'], function()
        {

            Route::any('/customer', array('as' => 'customer.list', 'uses' => 'CommonController@UserListAdmin'));
            Route::any('/customer/update', array('as' => 'customer.update', 'uses' => 'CommonController@UserUpdateAdmin'));

        });

    });

});


/* ADMIN */

Route::group(['prefix' => 'doctor'], function()
{

    Route::group(array('middleware' => ['auth']), function()
    {

        Route::group(['namespace' => 'Doctor'], function()
        {

            Route::any('dashboard', array('as' => 'doctor.dashboard', 'uses' => 'DoctorController@dashboard'));

        });

        Route::group(['namespace' => 'Hospital'], function()
        {

            Route::any('/hospital', array('as' => 'doctor.hospital.list', 'uses' => 'HospitalController@hospitalListDoctor'));
            Route::any('/hospital/add', array('as' => 'doctor.hospital.add', 'uses' => 'HospitalController@hospitalAddDoctor'));
            Route::any('/hospital/save', array('as' => 'doctor.hospital.save', 'uses' => 'HospitalController@hospitalSaveDoctor'));
            Route::any('/hospital/remove/{hospitalId}', array('as' => 'doctor.hospital.remove', 'uses' => 'HospitalController@hospitalRemoveDoctor'));

            Route::any('/schedule', array('as' => 'doctor.schedule.list', 'uses' => 'HospitalController@scheduleListDoctor'));
            Route::any('/schedule/add', array('as' => 'doctor.schedule.add', 'uses' => 'HospitalController@scheduleAddDoctor'));
            Route::any('/schedule/save', array('as' => 'doctor.schedule.save', 'uses' => 'HospitalController@scheduleSaveDoctor'));
            Route::any('/schedule/remove/{scheduleId}', array('as' => 'doctor.schedule.remove', 'uses' => 'HospitalController@scheduleRemoveDoctor'));




        });

    });

});


Route::group(['prefix' => 'laboratory'], function()
{

    Route::group(array('middleware' => ['auth']), function()
    {
        Route::group(['namespace' => 'Lab'], function()
        {

            Route::any('dashboard', array('as' => 'laboratory.dashboard', 'uses' => 'LabController@dashboard'));

        });

        Route::group(['namespace' => 'Lab'], function()
        {

            Route::any('/labtest', array('as' => 'laboratory.labtest.list', 'uses' => 'LabController@labtestListLab'));
            Route::any('/labtest/add', array('as' => 'laboratory.labtest.add', 'uses' => 'LabController@labtestAddLab'));
            Route::any('/labtest/save', array('as' => 'laboratory.labtest.save', 'uses' => 'LabController@labtestSaveLab'));
            Route::any('/labtest/remove/{labtestId}', array('as' => 'doctor.labtest.remove', 'uses' => 'LabController@labtestRemoveLab'));

        });


        /*
        Route::group(['namespace' => 'Doctor'], function()
        {

            Route::any('dashboard', array('as' => 'doctor.dashboard', 'uses' => 'DoctorController@dashboard'));

        });
        */
        /*
        Route::group(['namespace' => 'Hospital'], function()
        {

            Route::any('/hospital', array('as' => 'doctor.hospital.list', 'uses' => 'HospitalController@hospitalListDoctor'));
            Route::any('/hospital/add', array('as' => 'doctor.hospital.add', 'uses' => 'HospitalController@hospitalAddDoctor'));
            Route::any('/hospital/save', array('as' => 'doctor.hospital.save', 'uses' => 'HospitalController@hospitalSaveDoctor'));
            Route::any('/hospital/remove/{hospitalId}', array('as' => 'doctor.hospital.remove', 'uses' => 'HospitalController@hospitalRemoveDoctor'));

            Route::any('/schedule', array('as' => 'doctor.schedule.list', 'uses' => 'HospitalController@scheduleListDoctor'));
            Route::any('/schedule/add', array('as' => 'doctor.schedule.add', 'uses' => 'HospitalController@scheduleAddDoctor'));
            Route::any('/schedule/save', array('as' => 'doctor.schedule.save', 'uses' => 'HospitalController@scheduleSaveDoctor'));
            Route::any('/schedule/remove/{scheduleId}', array('as' => 'doctor.schedule.remove', 'uses' => 'HospitalController@scheduleRemoveDoctor'));

        });
        */

    });

});

/*
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

*/
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



Route::group(['prefix' => 'api'], function()
{

    Route::group(['namespace' => 'Common'], function()
    {
        Route::any('/register', array('as' => 'customer.mobile_register', 'uses' => 'CommonController@registerNewPatient'));
        Route::any('/activation/{id}/{string}', array('as' => 'customer.mobile_activation', 'uses' => 'CommonController@activationNewPatient'));
        Route::any('/login', array('as' => 'customer.mobile_login', 'uses' => 'CommonController@mobileloginPatient'));
        Route::any('/logout', array('as' => 'customer.mobile_logout', 'uses' => 'CommonController@mobilelogoutPatient'));
    });


    Route::group(['namespace' => 'Lab'], function()
    {
        Route::any('/lablist', array('as' => 'laboratory.list', 'uses' => 'LabController@mobilelaboratoryList'));
        Route::any('/addtocart', array('as' => 'laboratory.addtocart', 'uses' => 'LabController@laboratoryAddToCart'));
        Route::any('/cart', array('as' => 'laboratory.cart', 'uses' => 'LabController@laboratoryCart'));
        Route::any('/confirm', array('as' => 'laboratory.cart', 'uses' => 'LabController@laboratoryConfirm'));
    });

});

