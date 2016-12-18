@extends('admi.layout.master')

@section('title', 'Admin Dashboard')

@section('styles')

@stop
<?php
$dashboard_menu="0";
$customer_menu="0";
$lab_menu="0";
$pharmacy_menu="0";
$hospital_menu="0";
$doctor_menu="1";
$vendor_menu="0";
?>
@section('content')


    <div id="content">
        <div class="container-fluid">

            <!-- *** LEFT COLUMN ***
        _________________________________________________________ -->

            <div class="col-sm-2">

                <!-- *** MENUS AND FILTERS ***-->

                <div class="panel panel-default sidebar-menu">
                    <p>Home > Laboratory </p>
                    @include('admi.portal.sidebar')
                </div>
            </div>

            <!-- *** MENUS AND FILTERS END *** -->

            <!-- /.col-md-3 -->

            <!-- *** LEFT COLUMN END *** -->

            <!-- *** RIGHT COLUMN ***
    _________________________________________________________ -->

            <div class="col-sm-10 main-content">

                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <h2 class="text-uppercase">New Doctor</h2>

                            @if (session()->has('message'))
                                <div class="col_full login-title">
                                <span style="color:red;">
                                    <b>{{session('message')}}</b>
                                </span>
                                </div>
                            @endif

                            @if (session()->has('success'))
                                <div class="col_full login-title">
                                <span style="color:green;">
                                    <b>{{session('success')}}</b>
                                </span>
                                </div>
                            @endif

                            {!! Form::open( array( 'route' => array('doctor.save') ,'role' => 'form' ,'method'=>'POST', 'files'=>true,'class'=>'') ) !!}

                            <div class="form-group">
                                <label for="area-login">Specialty</label>
                                <select name="doctor_specialty_id" class="form-control" required="required">
                                    <option value="">--Choose Specialty--</option>
                                    @foreach($doctorSpecialtyInfo as $doctorSpecialtyInfoValue)
                                        <option value="{{$doctorSpecialtyInfoValue->id}}">{{$doctorSpecialtyInfoValue->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name-login">Name</label>
                                <input type="text" class="form-control" id="name-login" name="name" value="{{Input::old('name')}}" required="required" />
                                @if ($errors->has('name'))<p class="error" style="">{!!$errors->first('name')!!}</p>@endif
                            </div>
                            <div class="form-group">
                                <label for="email-login">Email</label>
                                <input type="text" class="form-control" id="email-login" name="email" value="{{Input::old('email')}}" required="required" />
                                @if ($errors->has('email'))<p class="error" style="">{!!$errors->first('email')!!}</p>@endif
                            </div>
                            <div class="form-group">
                                <label for="password-login">Password</label>
                                <input type="password" class="form-control" id="password-login" name="password" value="{{Input::old('password')}}" required="required" />
                                @if ($errors->has('password'))<p class="error" style="">{!!$errors->first('password')!!}</p>@endif
                            </div>
                            <div class="form-group">
                                <label for="address-login">Telephone</label>
                                <input type="text" class="form-control" id="email-login" name="telephone" value="{{Input::old('telephone')}}" required="required" />
                                @if ($errors->has('telephone'))<p class="error" style="">{!!$errors->first('telephone')!!}</p>@endif
                            </div>
                            <div class="form-group">
                                <label for="address-login">Address</label>
                                <input type="text" class="form-control" id="email-login" name="address" value="{{Input::old('address')}}" required="required" />
                                @if ($errors->has('address'))<p class="error" style="">{!!$errors->first('address')!!}</p>@endif
                            </div>
                            <div class="form-group">
                                <label for="country-login">Country</label>
                                <select name="country" class="form-control" required="required">
                                    <option value="">--Choose Country--</option>
                                    @foreach($countryInfo as $countryInfoValue)
                                        <option value="{{$countryInfoValue->id}}">{{$countryInfoValue->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="state-login">State</label>
                                <select name="state" class="form-control" required="required">
                                    <option value="">--Choose State--</option>
                                    @foreach($stateInfo as $stateInfoValue)
                                        <option value="{{$stateInfoValue->id}}">{{$stateInfoValue->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="city-login">City</label>
                                <select name="city" class="form-control" required="required">
                                    <option value="">--Choose City--</option>
                                    @foreach($cityInfo as $cityInfoValue)
                                        <option value="{{$cityInfoValue->id}}">{{$cityInfoValue->city_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="area-login">Area</label>
                                <select name="area" class="form-control" required="required">
                                    <option value="">--Choose Area--</option>
                                    @foreach($areaInfo as $areaInfoValue)
                                        <option value="{{$areaInfoValue->id}}">{{$areaInfoValue->area_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="detail-login">Doctor Details</label>
                                <input type="text" class="form-control" id="name-login" name="doctor_details" value="{{Input::old('doctor_details')}}" required="required" />
                                @if ($errors->has('doctor_details'))<p class="error" style="">{!!$errors->first('doctor_details')!!}</p>@endif
                            </div>

                            <div class="form-group">
                                <label for="name-login">Doctor Qualification</label>
                                <input type="text" class="form-control" id="name-login" name="doctor_qualification" value="{{Input::old('doctor_qualification')}}" required="required" />
                                @if ($errors->has('doctor_qualification'))<p class="error" style="">{!!$errors->first('doctor_qualification')!!}</p>@endif
                            </div>

                            <div class="form-group">
                                <label for="address-login">Doctor Experience</label>
                                <input type="text" class="form-control" id="email-login" name="doctor_experience" value="{{Input::old('doctor_experience')}}" required="required" />
                                @if ($errors->has('doctor_experience'))<p class="error" style="">{!!$errors->first('doctor_experience')!!}</p>@endif
                            </div>


                            <?php /* ?>


                            <div class="form-group">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Choose</th>
                                        <th>Price</th>
                                    </thead>
                                    <tbody>

                                    @foreach($labTestInfo as $labTestInfoValue)
                                    <tr>
                                        <td>{{$labTestInfoValue['name']}}</td>
                                        <td><input type="checkbox" name="laboratory_tests_info[laboratory_tests][{{$labTestInfoValue['id']}}]" id="laboratory_tests" value="{{$labTestInfoValue['id']}}" /></td>
                                        <td><input type="number" name="laboratory_tests_info[laboratory_tests_price][{{$labTestInfoValue['id']}}]" id="laboratory_tests" value="" /></td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                            </div>

                            <?php */ ?>


                            <div class="text-center">
                                <button type="submit" class="btn btn-template-main"><i class="fa fa-user-md"></i> Register</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>


                </div>
                <!-- /.row -->

            </div>

            <!-- /.row -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->


@endsection

@section('scripts')
    <script>

        window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')
        $('ul.nav li.dropdown').hover(function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
        }, function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
        });
        function toggler(divId) {
            $("#" + divId).toggle();
        }

        function editUser(divId)
        {
            //alert(divId);
            var tdUser = "#td" + divId;
            var editUser = "#editUser" + divId;
            var viewUser = "#viewUser" + divId;
            $(tdUser).show();
            $(editUser).toggle();
            $(viewUser).hide();
        }

        function viewUser(divId)
        {
            //alert(divId);
            var tdUser = "#td" + divId;
            var editUser = "#editUser" + divId;
            var viewUser = "#viewUser" + divId;
            $(tdUser).show();
            $(editUser).hide();
            $(viewUser).toggle();
        }

        $(function () {
            $('.td1').hide();
            $('.divUser').hide();
            /*
             $('#edtusr').click(function () {
             $('.td1').show();
             $('#editUser').show();
             $('#viewUser').hide();
             });
             $('#dispusr').click(function () {
             $('.td1').show();
             $('#viewUser').show();
             $('#editUser').hide();
             });
             */
            // $('.td1').hide();
        });

    </script>
@stop
