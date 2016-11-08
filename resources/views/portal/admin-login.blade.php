@extends('layout.master-inner')

@section('title', 'Admin Login')

@section('styles')

@stop

@section('content')


    <div id="heading-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1>Sign in</h1>
                </div>
                <div class="col-md-5">
                    <ul class="breadcrumb">
                        <li><a href="{{ URL::to('/') }}/">Home</a>
                        </li>
                        <li>Sign in</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div id="content">
        <div class="container">

            <div class="row">
                <div class="col-md-3"></div>

                <div class="col-md-6">
                    <div class="box">
                        <h2 class="text-uppercase">Login</h2>

                        <p class="lead">Already our customer?</p>

                        <hr>

                        @if (session()->has('message'))
                            <div class="col_full login-title">
                                <span style="color:red;">
                                    <b>{{session('message')}}</b>
                                </span>
                            </div>
                        @endif

                        @if (session()->has('success'))
                            <div class="col_full login-title">
                                <span style="color:green;">
                                    <b>{{session('success')}}</b>
                                </span>
                            </div>
                        @endif

                        {!! Form::open( array( 'route' => array('customer.dologin') ,'role' => 'form' ,'method'=>'POST', 'files'=>true,'class'=>'') ) !!}

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required="required" />
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-template-main"><i class="fa fa-sign-in"></i> Log in</button>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
                <div class="col-md-3"></div>

                <div class="col-md-6 hidden">
                    <div class="box">
                        <h2 class="text-uppercase">New account</h2>

                        <p class="lead">Not our registered customer yet?</p>
                        <p>With registration with us DUMMY DUMMY DUMMY DUMMY and much more opens to you! The whole process will not take you more than a minute!</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>

                        <hr>

                        {!! Form::open( array( 'route' => array('customer.doregister') ,'role' => 'form' ,'method'=>'POST', 'files'=>true,'class'=>'') ) !!}
                            <div class="form-group">
                                <label for="name-login">Name</label>
                                <input type="text" class="form-control" id="name-login" name="name" required="required" />
                            </div>
                            <div class="form-group">
                                <label for="email-login">Email</label>
                                <input type="text" class="form-control" id="email-login" name="email" required="required" />
                            </div>
                            <div class="form-group">
                                <label for="password-login">Password</label>
                                <input type="password" class="form-control" id="password-login" name="password" required="required" />
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-template-main"><i class="fa fa-user-md"></i> Register</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>



            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->


@endsection

@section('scripts')

@stop
