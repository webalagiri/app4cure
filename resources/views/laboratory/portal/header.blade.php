<header>

    <!-- *** TOP ***
_________________________________________________________ -->
    <div id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-5 contact">
                    <p class="hidden-sm hidden-xs"><i class="fa fa-phone"></i> +1800 9876543210 <a href="#" class="external"><i class="fa fa-question-circle"></i> HELP</a>&nbsp;  | &nbsp; FOLLOW US:

                        <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>

                        <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="external email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                    </p>
                    <p class="hidden-md hidden-lg"><a href="#" data-animate-hover="pulse"><i class="fa fa-phone"></i></a>  <a href="#" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                    </p>

                </div>
                <div class="col-xs-7">

                    @if(isset(Auth::user()->id))

                        <div class="login">
                            <ul class="nav navbar-nav">
                                <li> <a href="#" data-toggle="modal" data-target="#login-modal">24x7 Customer Support</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#login-modal">Tracking</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Hi {{$DisplayName=Session::get('DisplayName')}}! <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><i class="fa fa-male"></i> My Profile</a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i> Orders</a></li>
                                        <li><a href="#"><i class="fa fa-rupee"></i> Wallet</a></li>
                                        <li><a href="#"><i class="fa fa-hand-o-right"></i> Recommendations</a></li>
                                        <li><a href="#"><i class="fa fa-suitcase"></i> My Briefcase</a></li>
                                        <li><a href="{{ URL::to('/') }}/admin/logout"><i class="fa fa-sign-out"></i> Sign Out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                    @else

                        <div class="login">
                            <a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">Sign in / Register</span></a>
                            <a href="#"><i class="fa fa-truck"></i> TRACK ORDER</a>
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
                        <img src="{{ URL::to('/') }}/admi/img/logo.png" alt="App4Cure logo" class="hidden-xs hidden-sm">
                        <img src="{{ URL::to('/') }}/admi/img/logo-small.png" alt="App4Cure logo" class="visible-xs visible-sm"><span class="sr-only">App4Cure - go to homepage</span>
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

<!-- *** LOGIN MODAL ***
_________________________________________________________ -->

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog modal-sm">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="Login">Customer login</h4>
            </div>
            <div class="modal-body">
                <form action="customer-orders.html" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="email_modal" placeholder="email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password_modal" placeholder="password">
                    </div>

                    <p class="text-center">
                        <button class="btn btn-template-main"><i class="fa fa-sign-in"></i> Log in</button>
                    </p>

                </form>

                <p class="text-center text-muted">Not registered yet?</p>
                <p class="text-center text-muted"><a href="customer-register.html"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

            </div>
        </div>
    </div>
</div>

<!-- *** LOGIN MODAL END *** -->
