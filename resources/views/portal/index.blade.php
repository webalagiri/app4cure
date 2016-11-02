@extends('layout.master')

@section('title', 'Find Medical Facilities')

@section('styles')

@stop

@section('content')


    <section>
        <!-- *** HOMEPAGE CAROUSEL ***
_________________________________________________________ -->

        <div class="home-carousel">

            <div class="dark-mask"></div>

            <div class="container">
                <div class="homepage owl-carousel">
                    <div class="item">
                        <div class="row">
                            <div class="col-sm-5 right">

                                <h1>People struggle to get better health care everyday irrespective of their status</h1>
                                <p>80% of health care system in India
                                    <br />belongs to private sector.</p>
                            </div>
                            <div class="col-sm-7">
                                <img class="img-responsive" src="{{ URL::to('/') }}/img/people-globe.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">

                            <div class="col-sm-7 text-center">
                                <img class="img-responsive" src="{{ URL::to('/') }}/img/waiting.png" alt="">
                            </div>

                            <div class="col-sm-5">
                                <h2>After a long standing wait...</h2>
                                <p>they will get diagnostic reports and medicines</p>
                                <ul class="list-style-none">
                                    <li>If they need to visit the </li>
                                    <li>doctor again with reports, </li>
                                    <li>it is another challenge for them</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-sm-5 right">
                                <h1>Ambulance</h1>
                                <ul class="list-style-none">
                                    <li>Bargaining with ambulance driver when we are in urgency</li>
                                    <li>Roaming around the blood banks for the blood </li>
                                    <li>and its related products are like hell to the attendants</li>
                                </ul>
                            </div>
                            <div class="col-sm-7">
                                <img class="img-responsive" src="{{ URL::to('/') }}/img/ambulance-service.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-sm-7">
                                <img class="img-responsive" src="{{ URL::to('/') }}/img/live-track.png" alt="">
                            </div>
                            <div class="col-sm-5">
                                <h1>Live tracking: </h1>
                                <ul class="list-style-none">
                                    <li>people can their orders where it is; </li>
                                    <li>exact location can be tracked through our live tacking system</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.project owl-slider -->
            </div>
        </div>

        <!-- *** HOMEPAGE CAROUSEL END *** -->
    </section>

    <section class="bar background-white">
        <div class="container">
            <div class="col-md-12">


                <div class="row">
                    <div class="col-md-4">
                        <div class="box-simple">
                            <div class="icon">
                                <i class="fa fa-heart-o"></i>
                            </div>
                            <h3>Appointment</h3>
                            <p>Getting appointment online to consult with the respective consultant to reduce time.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-simple">
                            <div class="icon">
                                <i class="fa fa-bed"></i>
                            </div>
                            <h3>Services</h3>
                            <p>Advantage old had otherwise sincerity dependent additions. It in adapted natural hastily is justice. Six draw you him full not mean evil. Prepare garrets it expense windows shewing do an.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-simple">
                            <div class="icon">
                                <i class="fa fa-globe"></i>
                            </div>
                            <h3>Medicine Online</h3>
                            <p>Am terminated it excellence invitation projection as. She graceful shy believed distance use nay. Lively is people so basket ladies window expect.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="box-simple">
                            <div class="icon">
                                <i class="fa fa-lightbulb-o"></i>
                            </div>
                            <h3>Doctor @ Home</h3>
                            <p>Fifth abundantly made Give sixth hath. Cattle creature i be don't them behold green moved fowl Moved life us beast good yielding. Have bring.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-simple">
                            <div class="icon">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <h3>Reports</h3>
                            <p>Advantage old had otherwise sincerity dependent additions. It in adapted natural hastily is justice. Six draw you him full not mean evil. Prepare garrets it expense windows shewing do an.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-simple">
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <h3>More Products</h3>
                            <p>Am terminated it excellence invitation projection as. She graceful shy believed distance use nay. Lively is people so basket ladies window expect.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

@section('scripts')

@stop
