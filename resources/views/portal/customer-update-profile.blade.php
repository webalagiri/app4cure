@extends('layout.master-inner')

@section('title', 'Customer Dashboard')

@section('styles')

@stop

@section('content')


    <div id="heading-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1>Customer Update</h1>
                </div>
                <div class="col-md-5">
                    <ul class="breadcrumb">
                        <li><a href="{{ URL::to('/') }}/">Home</a>
                        </li>
                        <li>Customer Update</li>
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

                <div class="col-sm-3 hidden">

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

                <div class="col-sm-12">

                    <section class="barx background-white">
                        <div class="container">
                            <h2>Update Profile</h2>
                            {{print_r($patientInfo[0])}}
                            <form>
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td><input type="text" value="{{$patientInfo[0]->customer_name}}" /></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input type="email" value="{{$patientInfo[0]->email}}" /></td>
                                </tr>
                                <tr>
                                    <td>Telephone</td>
                                    <td><input type="number" value="{{$patientInfo[0]->telephone}}" /></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td><textarea>{{$patientInfo[0]->address}}</textarea></td>
                                </tr>
                                <tr>
                                    <td>Area</td>
                                    <td>
                                    <select name="area">
                                        <option value="">--Choose Area--</option>
                                        <option value="1" @if($patientInfo[0]->patient_area_id==1) selected @endif >Anna Nagar</option>
                                    </select>

                                        <input type="text" value="{{$patientInfo[0]->patient_area}}" />

                                    </td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td>
                                    <select name="area">
                                        <option value="">--Choose City--</option>
                                        <option value="1" @if($patientInfo[0]->patient_city_id==1) selected @endif >Chennai</option>
                                    </select>

                                        <input type="text" value="{{$patientInfo[0]->patient_city}}" /></td>
                                </tr>
                                <tr>
                                    <td>State</td>
                                    <td>
                                    <select name="area">
                                        <option value="">--Choose State--</option>
                                        <option value="1" @if($patientInfo[0]->patient_state_id==1) selected @endif >Tamil Nadu</option>
                                    </select>

                                        <input type="text" value="{{$patientInfo[0]->patient_state}}" /></td>
                                </tr>
                                <tr>
                                    <td>Country</td>
                                    <td>
                                        <select name="country">
                                            <option value="">--Choose Country--</option>
                                            <option value="1" @if($patientInfo[0]->patient_country_id==1) selected @endif >India</option>
                                        </select>

                                    </td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td><input type="button" value="Update" /></td>
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
