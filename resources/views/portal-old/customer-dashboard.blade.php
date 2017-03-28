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

                    <section class="bar background-white">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <div class="team-member" data-animate="fadeInUp">
                                        <div class="image">
                                            <a href="{{ URL::to('/') }}/laboratory">
                                                <img src="{{ URL::to('/') }}/img/service/lab.jpg" alt="" class="img-responsive img-circle">
                                            </a>
                                        </div>
                                        <h3><a href="{{ URL::to('/') }}/laboratory">Laboratory Tests</a></h3>
                                    </div>
                                    <!-- /.team-member -->
                                </div>
                                <div class="col-md-3 col-sm-3" data-animate="fadeInUp">
                                    <div class="team-member">
                                        <div class="image">
                                            <a href="#">
                                                <img src="{{ URL::to('/') }}/img/service/medicine.jpg" alt="" class="img-responsive img-circle">
                                            </a>
                                        </div>
                                        <h3><a href="#">Medicine Online</a></h3>

                                    </div>
                                    <!-- /.team-member -->
                                </div>
                                <div class="col-md-3 col-sm-3" data-animate="fadeInUp">
                                    <div class="team-member">
                                        <div class="image">
                                            <a href="#">
                                                <img src="{{ URL::to('/') }}/img/service/doctor.jpg" alt="" class="img-responsive img-circle">
                                            </a>
                                        </div>
                                        <h3><a href="#">Doctor Appointment</a></h3>

                                    </div>
                                    <!-- /.team-member -->
                                </div>
                            </div>
                            <!-- /.row -->
                            <!-- See All Team Members -->
                            <!--  <div class="row">
                                 <div class="col-md-12">
                                     <div class="see-more">
                                         <a href="portfolio-4.html" class="btn btn-template-main">See all our team members</a>
                                     </div>
                                 </div>
                             </div>
                         -->

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
