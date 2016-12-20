@extends('laboratory.layout.master')

@section('title', 'Laboratory labtest')

@section('styles')

@stop
<?php
$dashboard_menu="0";
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
                    <p>Home > LabTest </p>
                    @include('laboratory.portal.sidebar')
                </div>
            </div>

            <!-- *** MENUS AND FILTERS END *** -->

            <!-- /.col-md-3 -->

            <!-- *** LEFT COLUMN END *** -->

            <!-- *** RIGHT COLUMN ***
    _________________________________________________________ -->

            <div class="col-sm-10 main-content">
                <div class="row">
                    <div class="col-md-4">
                        <p class="body-heading"><strong>LabTest Management</strong> - <span>Laboratory</span></p>
                    </div>

                    <div class="col-md-2">
                        <a href="{{ URL::to('/') }}/laboratory/labtest/add" class="table-link">ADD LABTEST</a>
                    </div>

                    <div class="col-md-4 text-right">

                    </div>

                    <div class="col-md-2">

                    </div>
                </div>
                <hr class="style-three" />

                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-box no-header clearfix">
                            <div class="main-box-body clearfix">
                                <div class="table-responsive">
                                    <table class="table user-list">
                                        <thead>
                                        <tr>
                                            <th><span>Select</span></th>
                                            <th><span>Test Name</span></th>
                                            <th><span>Test Price</span></th>
                                            <th class="text-center"><span>Status</span></th>
                                            <th class="text-center"><span>Actions</span></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($labInfo as $labInfoValue)
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="">
                                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>

                                                        </label>
                                                    </div>

                                                </td>
                                                <td>
                                                    <h5>{{$labInfoValue->lab_test_name}}</h5>

                                                </td>


                                                <td>
                                                    Price: {{$labInfoValue->lab_test_price}}
                                                </td>
                                                <td class="text-center">
                                                    <span class="label label-success">Active</span>
                                                </td>
                                                <td class="text-center">


                                                    <a href="{{ URL::to('/') }}/laboratory/labtest/remove/{{$labInfoValue->lab_test_id}}" class="table-link danger" onclick="return confirm('Want to delete');">
                                                                <span class="fa-stack">
                                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                                    <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                                                </span>
                                                    </a>

                                                </td>
                                            </tr>


                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
@stop
