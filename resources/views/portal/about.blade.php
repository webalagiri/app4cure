@extends('layout.master')

@section('title', 'Customer Register')

@section('styles')

@stop

@section('content')


    <div id="heading-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1>About us</h1>
                </div>
                <div class="col-md-5">
                    <ul class="breadcrumb">
                        <li><a href="{{ URL::to('/') }}/">Home</a>
                        </li>
                        <li>About us</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div id="content">
        <div class="container">

            <section>
                <div class="row">
                    <div class="col-md-12">

                        <p class="lead">Many people doesn’t not afraid of diseases; they afraid of health care system. Improper guidance and half knowledge from internet sources make them confused and they lose peace of mind. It leads to psychological stress.</p>


                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-group accordion" id="accordionThree">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">

                                        <a data-toggle="collapse" data-parent="#accordionThree" href="#collapse3a">

                                            Medical guidance

                                        </a>

                                    </h4>
                                </div>
                                <div id="collapse3a" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="http://placehold.it/350x150" alt="" class="img-responsive">
                                            </div>
                                            <div class="col-md-8">
                                                <p>People struggle to get better health care everyday irrespective of their status. They are worrying about their health. They are always searching for better health care. In the process of searching and getting better health care, they are losing valuable time. 70% of people are roaming around the hospitals for the second opinion from another doctor. </p>
                                                <p>After a long standing wait they will get diagnostic reports and medicines. If they need to visit the doctor again with reports, it is another challenge for them.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">

                                        <a data-toggle="collapse" data-parent="#accordionThree" href="#collapse3b">

                                            Services

                                        </a>

                                    </h4>
                                </div>
                                <div id="collapse3b" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="http://placehold.it/350x150" alt="" class="img-responsive">
                                            </div>
                                            <div class="col-md-8">
                                                <p>Bargaining with ambulance driver when we are in urgency and roaming around the blood banks for the blood and its related products are like hell to the attendants.</p>
                                                <p>One more challenging task for them is claiming insurance for their persons. At the time of paying insurance people do hear sweet words which they can’t hear in their life. But at the time of claiming insurance, they are losing themselves in the process of documentation.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">

                                        <a data-toggle="collapse" data-parent="#accordionThree" href="#collapse3c">

                                            Why App4Cure?

                                        </a>

                                    </h4>
                                </div>
                                <div id="collapse3c" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>80% of health care system in India belongs to private sector. Referral system is not very well organized in our country. Some people are failing to get diagnosed in the process of taking health care due to lack of proper guidance. In case of chronic diseases, immunological diseases and cancers early diagnosis plays key role in the curative treatment. In India, most of the cancer deaths are occurring due to late diagnosis.</p>
                                        <p>Coming to the health sector, people whether they are educated or uneducated they are can’t understand many things and terminology. Many times they are failing to take right decisions either they are spending too much for small problem or they are not taking proper care for their illness. </p>
                                        <p>We are ready to date to take care of the people by organizing the things in medical sector. We guide people to get benefited from health sector and we save their time. We build hassle free health care system for everyone in this country.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </section>
            <section>
                <div class="row">
                    <div class="col-md-4">
                        <div class="heading">
                            <h2>Our Partners</h2>
                        </div>
                        <ul class="ul-icons">
                            <li><i class="fa fa-check"></i>Doctors</li>
                            <li><i class="fa fa-check"></i>Medical Partners</li>
                            <li><i class="fa fa-check"></i>Brandsters</li>

                        </ul>

                    </div>
                    <div class="col-md-4">
                        <div class="heading">
                            <h2>Our Services</h2>
                        </div>
                        <ul class="ul-icons">
                            <li><i class="fa fa-check"></i>Medical consultation</li>
                            <li><i class="fa fa-check"></i>Doctor Appointment</li>
                            <li><i class="fa fa-check"></i>Doctor @ Home</li>
                            <li><i class="fa fa-check"></i>Products and Services</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div class="heading">
                            <h2>User Benifits</h2>
                        </div>

                        <ul class="ul-icons">
                            <li><i class="fa fa-check"></i>Free medical consultation</li>
                            <li><i class="fa fa-check"></i>Medicine and Healthcare Products</li>
                            <li><i class="fa fa-check"></i>Pay Insurance &amp; Claims</li>
                        </ul>
                    </div>
                </div>
            </section>

        </div>
        <!-- /#contact.container -->

        <section class="bar background-pentagon">
            <div class="container">
                <div class="row showcase">
                    <div class="col-md-3 col-sm-6">
                        <div class="item">
                            <div class="icon"><i class="fa fa-align-justify"></i>
                            </div>
                            <h4><span class="counter">580</span><br>

                                Our Doctors</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="item">
                            <div class="icon"><i class="fa fa-users"></i>
                            </div>
                            <h4><span class="counter">100</span><br>

                                Valued Partners</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="item">
                            <div class="icon"><i class="fa fa-copy"></i>
                            </div>
                            <h4><span class="counter">320</span><br>

                                Satisified Customers</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="item">
                            <div class="icon"><i class="fa fa-font"></i>
                            </div>
                            <h4><span class="counter">923</span><br>

                                Products </h4>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /.bar -->

        <section class="bar background-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading">
                            <h2>Meet our team</h2>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <div class="team-member" data-animate="fadeInUp">
                            <div class="image">
                                <a href="team-member.html">
                                    <img src="img/dummy.jpg" alt="" class="img-responsive img-circle">
                                </a>
                            </div>
                            <h3><a href="team-member.html">Dr. Sudheer Krishna</a></h3>
                            <p class="role">CEO</p>
                            <div class="social">
                                <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-linkedin"></i></a>
                                <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                            </div>
                            <div class="text">
                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                            </div>
                        </div>
                        <!-- /.team-member -->
                    </div>
                    <div class="col-md-3 col-sm-3" data-animate="fadeInUp">
                        <div class="team-member">
                            <div class="image">
                                <a href="team-member.html">
                                    <img src="img/aditya.jpg" alt="" class="img-responsive img-circle">
                                </a>
                            </div>
                            <h3><a href="team-member.html">Aditya Valadi Chandrasekhar</a></h3>
                            <p class="role">CTO</p>

                            <div class="social">
                                <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-linkedin"></i></a>
                                <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                            </div>
                            <div class="text">
                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                            </div>
                        </div>
                        <!-- /.team-member -->
                    </div>
                    <div class="col-md-3 col-sm-3" data-animate="fadeInUp">
                        <div class="team-member">
                            <div class="image">
                                <a href="team-member.html">
                                    <img src="img/dummy.jpg" alt="" class="img-responsive img-circle">
                                </a>
                            </div>
                            <h3><a href="team-member.html">Ananth Gurunathan</a></h3>
                            <p class="role">Team Leader</p>
                            <div class="social">
                                <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-linkedin"></i></a>
                                <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                            </div>
                            <div class="text">
                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                            </div>
                        </div>
                        <!-- /.team-member -->
                    </div>
                    <div class="col-md-3 col-sm-3" data-animate="fadeInUp">
                        <div class="team-member">
                            <div class="image">
                                <a href="team-member.html">
                                    <img src="img/dummy.jpg" alt="" class="img-responsive img-circle">
                                </a>
                            </div>
                            <h3><a href="team-member.html">Kiran</a></h3>
                            <p class="role">Lead Developer</p>
                            <div class="social">
                                <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-linkedin"></i></a>
                                <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                            </div>
                            <div class="text">
                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                            </div>
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

        <section class="bar background-gray no-mb">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading text-center">
                            <h2>Our clients</h2>
                        </div>

                        <ul class="owl-carousel customers">
                            <li class="item">
                                <img src="https://dummyimage.com/150x80/000/fff" alt="" class="img-responsive">
                            </li>
                            <li class="item">
                                <img src="https://dummyimage.com/150x80/000/fff" alt="" class="img-responsive">
                            </li>
                            <li class="item">
                                <img src="https://dummyimage.com/150x80/000/fff" alt="" class="img-responsive">
                            </li>
                            <li class="item">
                                <img src="https://dummyimage.com/150x80/000/fff" alt="" class="img-responsive">
                            </li>
                            <li class="item">
                                <img src="https://dummyimage.com/150x80/000/fff" alt="" class="img-responsive">
                            </li>
                            <li class="item">
                                <img src="https://dummyimage.com/150x80/000/fff" alt="" class="img-responsive">
                            </li>
                        </ul>
                        <!-- /.owl-carousel -->
                    </div>

                </div>
            </div>
        </section>




    </div>
    <!-- /#content -->



@endsection

@section('scripts')

@stop
