@extends('layout.master-lab')

@section('title', 'ePrescription and Lab Tests Application')

@section('styles')
@stop
<?php
$dashboard_menu="1";
$lab_menu="0";
$patient_menu="0";
$profile_menu="0";
?>
@section('content')
<div class="wrapper">
    @include('portal.lab-header')
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        @include('portal.lab-sidebar')
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h4>Lab Tests</h4>
                            <p></p>
                            <p></p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-flask"></i>
                        </div>
                        <a href="{{URL::to('/')}}/lab/rest/api/{{Auth::user()->id}}/hospital/{{Session::get('LoginUserHospital')}}/labtests" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h4>Patients</h4>
                            <p></p>
                            <p></p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="{{URL::to('/')}}/lab/rest/api/{{Auth::user()->id}}/hospital/{{Session::get('LoginUserHospital')}}/patients" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->

            </div><!-- /.row -->
            <!-- Main row -->

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    @include('portal.lab-footer')
</div><!-- ./wrapper -->

</body>
</html>
