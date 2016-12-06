@extends('doctor.layout.master')

@section('title', 'Doctor Dashboard')

@section('styles')

@stop
<?php
$dashboard_menu="0";
$hospital_menu="0";
$schedule_menu="1";
$appointment_menu="0";
?>
@section('content')


    <div id="content">
        <div class="container-fluid">

            <!-- *** LEFT COLUMN ***
        _________________________________________________________ -->

            <div class="col-sm-2">

                <!-- *** MENUS AND FILTERS ***-->

                <div class="panel panel-default sidebar-menu">
                    <p>Home > Schedule > Add </p>
                    @include('doctor.portal.sidebar')
                </div>
            </div>

            <!-- *** MENUS AND FILTERS END *** -->

            <!-- /.col-md-3 -->

            <!-- *** LEFT COLUMN END *** -->

            <!-- *** RIGHT COLUMN ***
    _________________________________________________________ -->

            <div class="col-sm-10 main-content">

                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <h2 class="text-uppercase">Schedule Hospital</h2>

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

                            {!! Form::open( array( 'route' => array('doctor.schedule.save') ,'role' => 'form' ,'method'=>'POST', 'files'=>true,'class'=>'') ) !!}

                            <div class="form-group">
                                <label for="name-login">Choose Hospitals</label>
                                <select name="hospital" data-placeholder="Choose Hospitals" class="chosen-select" >
                                    <option value=""></option>
                                    @foreach($hospitalInfo as $hospitalInfoValue)
                                    <option value="{{$hospitalInfoValue->hospital_id}}">{{$hospitalInfoValue->hospital_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name-login">Choose Schedule Date</label>
                                <input type="text" class="form-control" id="doctor_schedule_date" name="schedule_date" required="required" />
                            </div>

                            <div class="form-group">
                                <label for="name-login">Choose Schedule From Time</label>
                                <input type="text" class="form-control" id="doctor_schedule_from_time" name="schedule_from_time" required="required" />
                            </div>

                            <div class="form-group">
                                <label for="name-login">Choose Schedule To Time</label>
                                <input type="text" class="form-control" id="doctor_schedule_to_time" name="schedule_to_time" required="required" />
                            </div>

                            <div class="form-group">
                                <label for="name-login">Schedule Cost</label>
                                <input type="number" class="form-control" id="doctor_schedule_cost" name="schedule_cost" required="required" />
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-template-main"><i class="fa fa-user-md"></i> Add </button>
                            </div>
                            {!! Form::close() !!}

                        </div>
                    </div>


                </div>
                <!-- /.row -->

            </div>

            <!-- /.row -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->


@endsection

@section('scripts')
    <script>

        window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')
        $('ul.nav li.dropdown').hover(function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
        }, function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
        });
        function toggler(divId) {
            $("#" + divId).toggle();
        }

        function editUser(divId)
        {
            //alert(divId);
            var tdUser = "#td" + divId;
            var editUser = "#editUser" + divId;
            var viewUser = "#viewUser" + divId;
            $(tdUser).show();
            $(editUser).toggle();
            $(viewUser).hide();
        }

        function viewUser(divId)
        {
            //alert(divId);
            var tdUser = "#td" + divId;
            var editUser = "#editUser" + divId;
            var viewUser = "#viewUser" + divId;
            $(tdUser).show();
            $(editUser).hide();
            $(viewUser).toggle();
        }

        $(function () {
            $('.td1').hide();
            $('.divUser').hide();
            /*
             $('#edtusr').click(function () {
             $('.td1').show();
             $('#editUser').show();
             $('#viewUser').hide();
             });
             $('#dispusr').click(function () {
             $('.td1').show();
             $('#viewUser').show();
             $('#editUser').hide();
             });
             */
            // $('.td1').hide();
        });

    </script>
    <link rel="stylesheet" href="{{ URL::to('/') }}/bootstrap-chosen-master/bootstrap-chosen.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>
    <script>
        $(function() {
            $('.chosen-select').chosen();
            $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
        });
    </script>

    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/js/datetimepicker-master/jquery.datetimepicker.css" />
    <script src="{{ URL::to('/') }}/js/datetimepicker-master/jquery-no.js"></script>
    <script src="{{ URL::to('/') }}/js/datetimepicker-master/build/jquery.datetimepicker.full.min.js"></script>
    <script>
        /*
        jQuery('#doctor_schedule_date').datetimepicker({
            startDate:'+1970/01/02',
            allowTimes:['10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00']
        });
        */

        jQuery('#doctor_schedule_from_time').datetimepicker({
            datepicker:false,
            format:'H:i',
            allowTimes:['10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00']
        });

        jQuery('#doctor_schedule_to_time').datetimepicker({
            datepicker:false,
            format:'H:i',
            allowTimes:['10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00']
        });

        jQuery('#doctor_schedule_date').datetimepicker({

            timepicker:false,
            format:'Y-m-d',
            formatDate:'Y/m/d',
            minDate:'+1970/01/02', // tommorow is minimum date
            maxDate:'+2070/01/02' // and tommorow is maximum date calendar
        });
    </script>

@stop
