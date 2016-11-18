
<header>

    <!-- *** TOP ***
_________________________________________________________ -->
    <div id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-4 contact">
                    <p class="hidden-sm hidden-xs"><i class="fa fa-phone"></i> +1800 9876543210 <a href="#" class="external"><i class="fa fa-question-circle"></i> HELP</a>&nbsp;  | &nbsp; FOLLOW US:

                        <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>

                        <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="external email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                    </p>
                    <p class="hidden-md hidden-lg"><a href="#" data-animate-hover="pulse"><i class="fa fa-phone"></i></a>  <a href="#" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                    </p>


                </div>
                <div class="col-xs-8">

                    @if(isset(Auth::user()->id))
                        <div class="login">
                            <a href="{{ URL::to('/') }}/patient/{{Auth::user()->id}}/dashboard"><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase">Welcome {{Session::get('AuthDisplayName')}}</span></a>
                            <a href="{{ URL::to('/') }}/logout"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">Sign out</span></a>
                        </div>
                    @else
                        <div class="login">
                            <a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-sign-in"></i> <span class="text-uppercase">Sign in <span class="hidden-xs">/ Register</span></span></a>
                            <a href="#"><i class="fa fa-truck"></i> <span class="text-uppercase">TRACK ORDER</span></a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <!-- *** TOP END *** -->

    <!-- *** NAVBAR ***
_________________________________________________________ -->

    <div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">

        <div class="navbar navbar-default yamm" role="navigation" id="navbar">

            <div class="container-fluid">
                <div class="navbar-header">

                    <a class="navbar-brand home" href="{{ URL::to('/') }}/">
                        <img src="{{ URL::to('/') }}/img/logo.png" alt="App4Cure logo" class="hidden-xs hidden-sm">
                        <img src="{{ URL::to('/') }}/img/logo-small.png" alt="App4Cure logo" class="visible-xs visible-sm"><span class="sr-only">App4Cure - go to homepage</span>
                    </a>
                    <div class="homeicn">|
                        <a class="home" href="{{ URL::to('/') }}/">
                            <i class="fa fa-home"></i></a></div>
                    <div class="navbar-buttons">
                        <button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
                            <span class="sr-only">Toggle navigation</span>
                            <i class="fa fa-align-justify"></i>
                        </button>
                    </div>
                </div>
                <!--/.navbar-header -->

                <div class="navbar-collapse collapse" id="navigation">

                    <ul class="nav navbar-nav navbar-right">


                        <li class="dropdown use-yamm yamm-fw">
                            <a href="{{ URL::to('/') }}/about">About Us</a>

                        </li>
                        <li class="dropdown use-yamm yamm-fw">
                            <a href="{{ URL::to('/') }}/">Blog</a>

                        </li>
                        <li class="dropdown use-yamm yamm-fw">
                            <a href="{{ URL::to('/') }}/doctors-appointment">Doctors Appointment</a>

                        </li>
                        <li class="dropdown use-yamm yamm-fw">
                            <a href="{{ URL::to('/') }}/shop">Shop</a>

                        </li>
                        <li class="dropdown use-yamm yamm-fw">
                            <a href="{{ URL::to('/') }}/contact">Contact</a>

                        </li>


                        <li class="dropdown hidden">
                            <a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">Contact <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="contact.html">Contact option 1</a>
                                </li>
                                <li><a href="contact2.html">Contact option 2</a>
                                </li>
                                <li><a href="contact3.html">Contact option 3</a>
                                </li>

                            </ul>
                        </li>
                    </ul>

                </div>
                <!--/.nav-collapse -->



                <div class="collapse clearfix" id="search">

                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">

                    <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>

                </span>
                        </div>
                    </form>

                </div>
                <!--/.nav-collapse -->

            </div>


        </div>
        <!-- /#navbar -->

    </div>

    <!-- *** NAVBAR END *** -->

</header>

<?php /* ?>

<header>

    <!-- *** TOP *** -->

    <div id="top">
        <div class="container">
            <div class="row">
                <div class="col-xs-5 contact">
                    <p class="hidden-sm hidden-xs">Contact us on +91 9876543210 or support@app4cure.co.in</p>
                    <p class="hidden-md hidden-lg"><a href="#" data-animate-hover="pulse"><i class="fa fa-phone"></i></a>  <a href="#" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                    </p>
                </div>
                <div class="col-xs-7">
                    <div class="social">
                        <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                    </div>
                    @if(isset(Auth::user()->id))
                        <div class="login">
                            <a href="{{ URL::to('/') }}/patient/{{Auth::user()->id}}/dashboard"><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase">Welcome {{Session::get('AuthDisplayName')}}</span></a>
                            <a href="{{ URL::to('/') }}/logout"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">Sign out</span></a>
                        </div>
                    @else
                    <div class="login">
                        <a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">Sign in</span></a>
                        <a href="{{ URL::to('/') }}/customer-register"><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase">Sign up</span></a>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <!-- *** TOP END *** -->

    <!-- *** NAVBAR *** -->

    <div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">

        <div class="navbar navbar-default yamm" role="navigation" id="navbar">

            <div class="container">
                <div class="navbar-header">

                    <a class="navbar-brand home" href="{{ URL::to('/') }}/">
                        <img src="http://app4cure.co.in/img/logo.png" alt="App4Cure logo" class="hidden-xs hidden-sm">
                        <img src="http://app4cure.co.in/img/logo-small.png" alt="App4Cure logo" class="visible-xs visible-sm"><span class="sr-only">App4Cure - go to homepage</span>
                    </a>
                    <div class="navbar-buttons">
                        <button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
                            <span class="sr-only">Toggle navigation</span>
                            <i class="fa fa-align-justify"></i>
                        </button>
                    </div>
                </div>
                <!--/.navbar-header -->

                <div class="navbar-collapse collapse" id="navigation">

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown active">
                            <a href="{{ URL::to('/') }}/">Home</a>
                        </li>
                        <li class="dropdown use-yamm yamm-fw">
                            <a href="{{ URL::to('/') }}/about">About Us</a>
                        </li>
                        <!--
                        <li class="dropdown use-yamm yamm-fw">
                            <a href="#Blog.html">Blog</a>
                        </li>
                        -->
                        <li class="dropdown use-yamm yamm-fw">
                            <a href="{{ URL::to('/') }}/medical-services">Medical Services</a>
                        </li>
                        <li class="dropdown use-yamm yamm-fw">
                            <a href="{{ URL::to('/') }}/shop">Shop</a>
                        </li>


                        <li class="dropdown use-yamm yamm-fw">
                            <a href="{{ URL::to('/') }}/contact">Contact</a>
                        </li>

                        <!--
                        <li class="dropdown">
                            <a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">Contact <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#contact.html">Contact option 1</a>
                                </li>
                                <li><a href="#contact2.html">Contact option 2</a>
                                </li>
                                <li><a href="#contact3.html">Contact option 3</a>
                                </li>

                            </ul>
                        </li>
                        -->
                    </ul>

                </div>
                <!--/.nav-collapse -->



                <div class="collapse clearfix" id="search">

                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">

                    <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>

                </span>
                        </div>
                    </form>

                </div>
                <!--/.nav-collapse -->

            </div>


        </div>
        <!-- /#navbar -->

    </div>

    <!-- *** NAVBAR END *** -->

</header>
<?php */ ?>
<!-- *** LOGIN MODAL *** -->

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog modal-sm">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="Login">Customer login</h4>
            </div>
            <div class="modal-body">
                {!! Form::open( array( 'route' => array('customer.dologin') ,'role' => 'form' ,'method'=>'POST', 'files'=>true,'class'=>'') ) !!}

                <div class="form-group">
                    <input type="text" class="form-control" id="email" name="email" required="required" placeholder="email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" required="required" placeholder="password">
                </div>

                <p class="text-center">
                    <button type="submit" class="btn btn-template-main"><i class="fa fa-sign-in"></i> Log in</button>
                </p>

                {!! Form::close() !!}

                <p class="text-center text-muted">Not registered yet?</p>
                <p class="text-center text-muted"><a href="{{ URL::to('/') }}/customer-register"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

            </div>
        </div>
    </div>
</div>

<!-- *** LOGIN MODAL END *** -->