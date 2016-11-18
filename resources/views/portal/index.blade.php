@extends('layout.master')

@section('title', 'Find Medical Facilities')

@section('styles')

@stop

@section('content')


    <section id="homebanner">
        <!-- *** HOMEPAGE CAROUSEL ***
_________________________________________________________ -->

        <div class="home-carousel">

            <div class="dark-mask"></div>

            <div class="container-fluid">
                <div class="homepage owl-carousel">
                    <div class="item">
                        <div class="row">
                            <div class="col-sm-offset-2 col-sm-5 right">

                                <h1>People struggle to get better health care everyday irrespective of their status</h1>
                                <p>80% of health care system in India
                                    <br />belongs to private sector.</p>
                            </div>
                            <div class="col-sm-5">
                                <img class="img-responsive" src="{{ URL::to('/') }}/img/people-globe.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">

                            <div class="col-sm-offset-3 col-sm-3 right">
                                <img class="img-responsive" src="{{ URL::to('/') }}/img/waiting.png" alt="">
                            </div>

                            <div class="col-sm-5 left">
                                <h1>After a long standing wait...</h1>
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
                            <div class="col-sm-offset-2 col-sm-5 right">
                                <h1>Ambulance</h1>
                                <ul class="list-style-none">
                                    <li>Bargaining with ambulance driver when we are in urgency</li>
                                    <li>Roaming around the blood banks for the blood </li>
                                    <li>and its related products are like hell to the attendants</li>
                                </ul>
                            </div>
                            <div class="col-sm-5">
                                <img class="img-responsive" src="{{ URL::to('/') }}/img/ambulance-service.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-sm-offset-3 col-sm-3">
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



    <section class="bar background-white" id="first-section">
        <div class="container">
            <div class="col-md-12">


                <div class="row">
                    <div class="col-md-3">
                        <div class="box-simple">
                            <div class="icon">
                                <i class="fa fa-user-md"></i>
                            </div>
                            <h3>Appointment</h3>
                            <p>Book your doctor appointment at your convenient time</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-simple">
                            <div class="icon">
                                <i class="fa fa-medkit"></i>
                            </div>
                            <h3>Doctor @ Home</h3>
                            <p>See your doctor at your place</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-simple">
                            <div class="icon">
                                <i class="fa  fa-spinner fa-spin"></i>
                            </div>
                            <h3>Medicine Online</h3>
                            <p>Searching for medicines?<br />Roaming around medical shops?<br />Place your order and get your medicine within 3 hours at your place</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-simple">
                            <div class="icon">
                                <i class="fa fa-stethoscope"></i>
                            </div>
                            <h3>Medical tests @ your home:</h3>
                            <p>Just tap your app to order medical tests<br />Our technician comes to your door steps within 1 hour to collect samples</p>
                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="box-simple">
                            <div class="icon">
                                <i class="fa fa-child"></i>
                            </div>
                            <h3>Insurance @ Cash less treatment</h3>
                            <p>Cash less treatment to every Indian is our goal<br />Health insurance gives assurance to you and your family well being</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-simple">
                            <div class="icon">
                                <i class="fa fa-bar-chart"></i>
                            </div>
                            <h3>Reports</h3>
                            <p>No need to go to Lab for the reports, Collect your reports through online and save it in your account for future correspondence </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-simple">
                            <div class="icon">
                                <i class="fa fa-medkit"></i>
                            </div>
                            <h3>Food 4 cure</h3>

                            <p>Chemical free and hygienic food prevents diseases and increases resistance power of human body</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="box-simple">
                            <div class="icon">
                                <i class="fa fa-ambulance"></i>
                            </div>
                            <h3>Ambulance</h3>
                            <p>Looking for ambulance?</p>
                            <p>Bargaining with ambulance provider?</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-offset-3 col-md-3">
                        <div class="box-simple">
                            <div class="icon">
                                <i class="fa fa-tint"></i>
                            </div>
                            <h3>Blood bank:</h3>
                            <p>Do you require blood immediately?<br />Don’t worry, Contact us, App4cure makes necessary arrangements to get blood for you</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-simple">
                            <div class="icon">
                                <i class="fa fa-hospital-o"></i>
                            </div>
                            <h3>Medical bill pay </h3>
                            <p>Pay medical bills through online banking/credit/debit cards and become a part of nation development</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <section class="bar background-white" id="home-news">
        <div class="container">
            <div class="col-md-12">

                <h4 class="title"><span><strong>Current Trends</strong></span></h4>


                <div class="row">
                    <div class="col-md-3">
                        <div class="box-simple">
                            <img src="{{ URL::to('/') }}/img/home-img4.jpg" class="img-responsive">
                            <h3>Vaccine Candidate</h3>
                            <p>Getting appointment online to consult with the respective consultant to reduce time.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-simple">
                            <img src="{{ URL::to('/') }}/img/home-img3.jpg" class="img-responsive">
                            <h3>Stress</h3>
                            <p>Advantage old had otherwise sincerity dependent additions. It in adapted natural hastily is justice. Six draw you him full not mean evil. Prepare garrets it expense windows shewing do an.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-simple">
                            <img src="{{ URL::to('/') }}/img/home-img2.jpg" class="img-responsive">
                            <h3>Friendly Hospitality</h3>
                            <p>Am terminated it excellence invitation projection as. She graceful shy believed distance use nay. Lively is people so basket ladies window expect.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-simple">
                            <img src="{{ URL::to('/') }}/img/home-img1.jpg" class="img-responsive">
                            <h3>Lab Test</h3>
                            <p>Am terminated it excellence invitation projection as. She graceful shy believed distance use nay. Lively is people so basket ladies window expect.</p>
                        </div>
                    </div>
                </div>

                <div class="row" id="glance">
                    <h4 class="title"><span><strong>App4Cure at Glance</strong></span></h4>
                    <div class="col-md-3">
                        <div class="box-simple">
                            <img src="{{ URL::to('/') }}/img/who.jpg" class="img-responsive">
                            <h3>Who we are</h3>
                            <p>Fifth abundantly made Give sixth hath. Cattle creature i be don't them behold green moved fowl Moved life us beast good yielding. Have bring.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-simple">
                            <img src="{{ URL::to('/') }}/img/director.jpg" class="img-responsive">
                            <h3>Board of Directors</h3>
                            <p>Advantage old had otherwise sincerity dependent additions. It in adapted natural hastily is justice. Six draw you him full not mean evil.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-simple">
                            <img src="{{ URL::to('/') }}/img/funding.jpg" class="img-responsive">
                            <h3>Funding for Research</h3>
                            <p>Am terminated it excellence invitation projection as. She graceful shy believed distance use nay. Lively is people so basket ladies window expect.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-simple">
                            <img src="{{ URL::to('/') }}/img/labtest.jpg" class="img-responsive">
                            <h3>Labs at App4Cure</h3>
                            <p>Fifth abundantly made Give sixth hath. Cattle creature i be don't them behold green moved fowl Moved life us beast good yielding. Have bring.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-simple">
                            <img src="{{ URL::to('/') }}/img/training.jpg" class="img-responsive">
                            <h3>Training at App4Cure</h3>
                            <p>Advantage old had otherwise sincerity dependent additions. It in adapted natural hastily is justice. Six draw you him full not mean evil. Prepare garrets it expense windows shewing do an.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-simple">
                            <img src="{{ URL::to('/') }}/img/jobs.jpg" class="img-responsive">
                            <h3>Careers at App4Cure</h3>
                            <p>Am terminated it excellence invitation projection as. She graceful shy believed distance use nay. Lively is people so basket ladies window expect.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-simple">
                            <img src="{{ URL::to('/') }}/img/labtest.jpg" class="img-responsive">
                            <h3>Labs at App4Cure</h3>
                            <p>Fifth abundantly made Give sixth hath. Cattle creature i be don't them behold green moved fowl Moved life us beast good yielding. Have bring.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-simple">
                            <img src="{{ URL::to('/') }}/img/training.jpg" class="img-responsive">
                            <h3>Training at App4Cure</h3>
                            <p>Advantage old had otherwise sincerity dependent additions. It in adapted natural hastily is justice. Six draw you him full not mean evil. Prepare garrets it expense windows shewing do an.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="bar background-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">


                    <h4 class="title"><span><strong>Meet our team</strong></span></h4>

                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="team-member" data-animate="fadeInUp">
                        <div class="image">
                            <a href="#team-member.html">
                                <img src="{{ URL::to('/') }}/img/dummy.jpg" alt="" class="img-responsive img-circle member-profile">
                            </a>
                        </div>
                        <h3><a href="#team-member.html">Dr. Sudheer Krishna</a></h3>
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
                            <a href="#team-member.html">
                                <img src="{{ URL::to('/') }}/img/aditya.jpg" alt="" class="img-responsive img-circle member-profile">
                            </a>
                        </div>
                        <h3><a href="#team-member.html">Aditya Valadi Chandrasekhar</a></h3>
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
                <div class="col-md-3 col-sm-3 center-block" data-animate="fadeInUp">
                    <div class="team-member">
                        <div class="image">
                            <a href="#team-member.html">
                                <img src="{{ URL::to('/') }}/img/dummy.jpg" alt="" class="img-responsive img-circle member-profile">
                            </a>
                        </div>
                        <h3><a href="#team-member.html">Ananth Gurunathan</a></h3>
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
                            <a href="#team-member.html">
                                <img src="{{ URL::to('/') }}/img/dummy.jpg" alt="" class="img-responsive img-circle member-profile">
                            </a>
                        </div>
                        <h3><a href="#team-member.html">Kiran</a></h3>
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


    <section>



        <!--footer-->
        <footer class="footer1">
            <div class="container">

                <div class="row"><!-- row -->

                    <div class="col-lg-3 col-md-3" data-animate="fadeInUp"><!-- widgets column left -->
                        <ul class="list-unstyled clear-margins"><!-- widgets -->

                            <li class="widget-container widget_nav_menu"><!-- widgets list -->

                                <h1 class="title-widget">BUY PRODUCTS</h1>

                                <ul>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i> Buy Product One</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i> Buy Product Two</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i> Buy Product Three</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i> Buy Product Four</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i> Buy Product Five</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i> Buy Product Six</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i> Buy Product Seven</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i> Buy Product Eight</a></li>
                                </ul>

                            </li>

                        </ul>


                    </div><!-- widgets column left end -->



                    <div class="col-lg-3 col-md-3" data-animate="fadeInUp"><!-- widgets column left -->

                        <ul class="list-unstyled clear-margins"><!-- widgets -->

                            <li class="widget-container widget_nav_menu"><!-- widgets list -->

                                <h1 class="title-widget">SELL PRODUCTS</h1>

                                <ul>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i> Sell Product One</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i> Sell Product Two</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i> Sell Product THree</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i> Sell Product Four</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i> Sell Product Five</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i> Sell Product Six</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i> Sell Product Seven</a></li>
                                    <li><a  href="#"><i class="fa fa-angle-double-right"></i> Sell Product Eight</a></li>

                                </ul>

                            </li>

                        </ul>


                    </div><!-- widgets column left end -->



                    <div class="col-lg-2 col-md-2" data-animate="fadeInUp"><!-- widgets column left -->

                        <ul class="list-unstyled clear-margins"><!-- widgets -->

                            <li class="widget-container widget_nav_menu"><!-- widgets list -->

                                <h1 class="title-widget">Useful links</h1>

                                <ul>


                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> About Us</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Online Test Series</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Grand Tests Series</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Subject Wise Test Series</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Smart Book</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Test Centres</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i>  Admission Form</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i>  Computer Live Test</a></li>

                                </ul>

                            </li>

                        </ul>


                    </div><!-- widgets column left end -->


                    <div class="col-lg-4 col-md-4" data-animate="fadeInUp"><!-- widgets column center -->



                        <ul class="list-unstyled clear-margins"><!-- widgets -->

                            <li class="widget-container widget_recent_news"><!-- widgets list -->

                                <h1 class="title-widget">Contact Detail </h1>

                                <div class="footerp">

                                    <h2 class="title-median">APP4CURE</h2>
                                    <p><b>Email id:</b> <a href="mailto:info@app4cure.com">info@app4cure.com</a></p>
                                    <p><b>Helpline Numbers </b>
                                        <b style="color:#ffc106;">(8AM to 10PM):</b>  +91-8130890090, +91-8130190010  </p>
                                    <p><b>Corp Office / Postal Address</b></p>
                                    <p><b>Phone Numbers : </b>7042827160, </p>
                                    <p> 011-27568832, 9868387223</p>
                                </div>

                                <div class="social-icons">

                                    <ul class="nomargin">

                                        <a href="https://www.facebook.com/"><i class="fa fa-facebook-square fa-3x social-fb" id="social"></i></a>
                                        <a href="https://twitter.com/"><i class="fa fa-twitter-square fa-3x social-tw" id="social"></i></a>
                                        <a href="https://plus.google.com/"><i class="fa fa-google-plus-square fa-3x social-gp" id="social"></i></a>
                                        <a href="mailto:info@app4cure.com"><i class="fa fa-envelope-square fa-3x social-em" id="social"></i></a>

                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

    </section>




@endsection

@section('scripts')

@stop
