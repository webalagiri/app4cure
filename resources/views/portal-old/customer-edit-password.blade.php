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
                        <div class="container">
                            <h2>Change Password</h2>
                            <form>
                            <table class="table table-striped" style="width:80%;">
                                <tbody>
                                <tr>
                                    <td>Current Password</td>
                                    <td><input type="password" value="" /></td>
                                </tr>
                                <tr>
                                    <td>New Password </td>
                                    <td><input type="password" value="" /></td>
                                </tr>
                                <tr>
                                    <td>Confirm Password</td>
                                    <td><input type="password" value="" /></td>
                                </tr>

                                <tr>
                                    <td> </td>
                                    <td><input type="button" value="Change Password" /></td>
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
