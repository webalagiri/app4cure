<header id="header" class="transparent-header page-section dark" style="width: 100%;">

    <div id="header-wrap">

        <div class="container-fluid clearfix">

            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

            <!-- Logo
            ============================================= -->
            <div id="logo">
                <a href="{{URL::to('/')}}" class="standard-logo" data-dark-logo="{{ URL::to('/') }}/images/logo.png"><img src="{{ URL::to('/') }}/images/logo.png" alt="HealthVistaz" /></a>
            </div><!-- #logo end -->

            <!-- Primary Navigation
            ============================================= -->
            <!-- Primary Navigation
            ============================================= -->
            <nav id="primary-menu">

                <ul class="one-page-menu">
                    <li>
                        <div style="padding: 0px;">
                            <div id="google_translate_element"></div><script type="text/javascript">
                                function googleTranslateElementInit() {
                                    new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                                }
                            </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                        </div>
                    </li>

                    <li><a href="{{URL::to('/')}}/hospital/register"><div>For Hospitals</div></a></li>

                    <li><a href="#"><div>For Patients</div></a>
                        <ul>
                            <li><a href="{{URL::to('/')}}/hospitals"><div>Find Hospitals</div></a></li>
                            <li><a href="{{URL::to('/')}}/interpreters"><div>Find Language Interpreters</div></a></li>
                            <li><a href="{{URL::to('/')}}/accommodations"><div>Find Accommodations</div></a></li>
                        </ul>
                    </li>
                    <li><a href="{{URL::to('/')}}/howitworks"><div>How it Works</div></a></li>
                    <li><a href="{{URL::to('/')}}/blog/" target="_blank"><div>Blog</div></a></li>
                    <li><a href="{{URL::to('/')}}/helpcenter"><div>Help Center</div></a></li>

                    @if(isset(Auth::user()->id))
                        <li><a href="#"><div><i class="icon-user"></i></div></a>
                            <ul>
                                <li><div style="background:#3D8DA8;padding: 10px;font-weight: bold; color:#fff;">Welcome {{Session::get('AuthDisplayName')}}</div></li>
                                @if(Auth::user()->hasRole('patient'))
                                    <li><a href="{{URL::to('/')}}/patient/{{Auth::user()->id}}/myallenquiries"><div>My Account</div></a></li>
                                    <li><a href="{{URL::to('/')}}/user/logout"><div>Logout</div></a></li>
                                @endif
                                @if(Auth::user()->hasRole('hospital'))
                                    <li><a href="{{URL::to('/')}}/hospital/{{Auth::user()->id}}/myprofile"><div>My Account</div></a></li>
                                    <li><a href="{{URL::to('/')}}/hospital/logout"><div>Logout</div></a></li>
                                @endif
                                @if(Auth::user()->hasRole('doctor'))
                                    <li><a href="{{URL::to('/')}}/doctor/{{Auth::user()->id}}/myprofile"><div>My Account</div></a></li>
                                    <li><a href="{{URL::to('/')}}/doctor/logout"><div>Logout</div></a></li>
                                @endif
                            </ul>
                        </li>
                    @else
                        <li><a href="#"><div>LOGIN</div></a>
                            <ul>
                                <li><a href="{{URL::to('/')}}/user/login"><div>For Patient</div></a></li>
                                <li><a href="{{URL::to('/')}}/hospital/login"><div>For Hospital</div></a></li>
                            </ul>
                        </li>
                    @endif

                </ul>




            </nav><!-- #primary-menu end -->



        </div>

    </div>

</header>