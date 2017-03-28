@extends('layout.master-inner')

@section('title', 'Customer Dashboard')

@section('styles')

@stop

@section('content')


    <div id="heading-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1>Customer Dashboard</h1>
                </div>
                <div class="col-md-5">
                    <ul class="breadcrumb">
                        <li><a href="{{ URL::to('/') }}/">Home</a>
                        </li>
                        <li>Customer Dashboard</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div id="content">
        <div class="container">

            <div class="row">


                <!-- *** LEFT COLUMN ***
        _________________________________________________________ -->

                <div class="col-sm-3">

                    <!-- *** MENUS AND FILTERS ***
_________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">My Account</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li class="active">
                                    <a href="{{ URL::to('/') }}/patient/{{Auth::user()->id}}/dashboard">Welcome {{Session::get('AuthDisplayName')}}</a>
                                    <ul>
                                        <li><a href="{{ URL::to('/') }}/patient/{{Auth::user()->id}}/viewprofile">My Profile</a>
                                        </li>
                                        <li><a href="{{ URL::to('/') }}/patient/{{Auth::user()->id}}/editprofile">Edit Profile</a>
                                        </li>
                                        <li><a href="{{ URL::to('/') }}/patient/{{Auth::user()->id}}/changepassword">Change Password</a>
                                        </li>
                                        <li><a href="{{ URL::to('/') }}/logout">Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                    </div>

                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">My Order</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li class="active">
                                    <ul>
                                        <li><a href="#">Lab Tests Order</a></li>
                                        <li><a href="#">Medicine Order</a></li>
                                        <li><a href="#">Doctor Appointment</a></li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                    </div>


                    <!-- *** MENUS AND FILTERS END *** -->


                    <!-- /.banner -->

                </div>
                <!-- /.col-md-3 -->

                <!-- *** LEFT COLUMN END *** -->

                <!-- *** RIGHT COLUMN ***
        _________________________________________________________ -->

                <div class="col-sm-9">

                    <section class="barx background-white">
                        <div class="containerX">
                            <h2>Edit Profile</h2>
                            <form action="{{ URL::to('/') }}/patient/{{Auth::user()->id}}/editsaveprofile" method="POST">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td><input type="text" class="form-control" name="customer_name" value="{{$patientInfo[0]->customer_name}}" /></td>
                                    </tr>
                                    <tr>
                                        <td>Telephone</td>
                                        <td><input type="number" class="form-control" name="telephone" value="{{$patientInfo[0]->telephone}}" /></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td><textarea class="form-control" name="address">{{$patientInfo[0]->address}}</textarea></td>
                                    </tr>
                                    <tr>
                                        <td>Country</td>
                                        <td>
                                            <select name="country" class="form-control" >
                                                <option value="">--Choose Country--</option>
                                                @foreach($countryInfo as $countryInfoValue)
                                                    <option value="{{$countryInfoValue->id}}" @if($countryInfoValue->id==$patientInfo[0]->patient_country_id) selected @endif >{{$countryInfoValue->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>State</td>
                                        <td>
                                            <select name="state" class="form-control" >
                                                <option value="">--Choose State--</option>
                                                @foreach($stateInfo as $stateInfoValue)
                                                    <option value="{{$stateInfoValue->id}}" @if($stateInfoValue->id==$patientInfo[0]->patient_state_id) selected @endif >{{$stateInfoValue->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td>
                                            <select name="city" class="form-control" >
                                                <option value="">--Choose City--</option>
                                                @foreach($cityInfo as $cityInfoValue)
                                                    <option value="{{$cityInfoValue->id}}" @if($cityInfoValue->id==$patientInfo[0]->patient_city_id) selected @endif >{{$cityInfoValue->city_name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Area</td>
                                        <td>
                                            <select name="area" class="form-control" >
                                                <option value="">--Choose Area--</option>
                                                @foreach($areaInfo as $areaInfoValue)
                                                    <option value="{{$areaInfoValue->id}}" @if($areaInfoValue->id==$patientInfo[0]->patient_area_id) selected @endif >{{$areaInfoValue->area_name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>



                                    <tr>
                                        <td> </td>
                                        <td><input type="submit" name="submit" value="Update" /></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>

                        </div>
                        <!-- /.container -->
                    </section>

                </div>
                <!-- /.col-md-9 -->

                <!-- *** RIGHT COLUMN END *** -->

            </div>

        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->




@endsection

@section('scripts')

@stop
