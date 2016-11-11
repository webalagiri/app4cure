@extends('admi.layout.master')

@section('title', 'Admin Dashboard')

@section('styles')

@stop

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
                            <h2 class="text-uppercase">New Laboratory</h2>

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

                            {!! Form::open( array( 'route' => array('laboratory.save') ,'role' => 'form' ,'method'=>'POST', 'files'=>true,'class'=>'') ) !!}

                            <div class="form-group">
                                <label for="name-login">Name</label>
                                <input type="text" class="form-control" id="name-login" name="name" required="required" />
                            </div>
                            <div class="form-group">
                                <label for="email-login">Email</label>
                                <input type="text" class="form-control" id="email-login" name="email" required="required" />
                            </div>
                            <div class="form-group">
                                <label for="password-login">Password</label>
                                <input type="password" class="form-control" id="password-login" name="password" required="required" />
                            </div>

                            <div class="form-group">
                                <label for="detail-login">Details</label>
                                <input type="text" class="form-control" id="name-login" name="laboratory_details" required="required" />
                            </div>
                            <div class="form-group">
                                <label for="address-login">Telephone</label>
                                <input type="text" class="form-control" id="email-login" name="telephone" required="required" />
                            </div>
                            <div class="form-group">
                                <label for="address-login">Address</label>
                                <input type="text" class="form-control" id="email-login" name="email" required="required" />
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
                                <label for="name-login">Contact Name</label>
                                <input type="text" class="form-control" id="name-login" name="laboratory_contact_name" required="required" />
                            </div>

                            <div class="form-group">
                                <label for="address-login">Contact Telephone</label>
                                <input type="text" class="form-control" id="email-login" name="laboratory_contact_mobile" required="required" />
                            </div>



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
                                        <td><input type="checkbox" name="laboratory_tests[{{$labTestInfoValue['id']}}]" id="laboratory_tests" value="{{$labTestInfoValue['id']}}" /></td>
                                        <td><input type="number" name="laboratory_tests_price[{{$labTestInfoValue['id']}}]" id="laboratory_tests" value="" /></td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                            </div>


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
