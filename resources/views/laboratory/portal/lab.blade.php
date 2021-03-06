@extends('admi.layout.master')

@section('title', 'Admin Dashboard')

@section('styles')

@stop
<?php
$dashboard_menu="0";
$customer_menu="0";
$lab_menu="1";
$pharmacy_menu="0";
$hospital_menu="0";
$doctor_menu="0";
$vendor_menu="0";
?>
@section('content')


    <div id="content">
        <div class="container-fluid">

            <!-- *** LEFT COLUMN ***
        _________________________________________________________ -->

            <div class="col-sm-2">

                <!-- *** MENUS AND FILTERS ***-->

                <div class="panel panel-default sidebar-menu">
                    <p>Home > Laboratory </p>
                    @include('admi.portal.sidebar')
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
                        <p class="body-heading"><strong>Laboratory Management</strong> - <span>Admin</span></p>
                    </div>

                    <div class="col-md-2">
                        <a href="{{ URL::to('/') }}/admin/laboratory/add" class="table-link">ADD LAB</a>
                    </div>

                    <div class="col-md-4 text-right">
                        <p class="activeuser">Active Users <span class="badge">42</span>  &nbsp; | Approval <span class="badge">15</span></p>
                    </div>

                    <div class="col-md-2">

                        <form action="" class="search-form">
                            <div class="form-group has-feedback">
                                <label for="search" class="sr-only">Search</label>
                                <input type="text" class="form-control" name="search" id="search" placeholder="search">
                                <span class="fa fa-search form-control-feedback"></span>
                            </div>
                        </form>

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
                                            <th><span>User</span></th>
                                            <th><span>Contact details</span></th>
                                            <th><span>Created</span></th>
                                            <th class="text-center"><span>Status</span></th>
                                            <th class="text-center"><span>Actions</span></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($laboratoryInfo as $laboratoryInfoValue)
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
                                                    <img src="http://bootdey.com/img/Content/user_1.jpg" alt="">
                                                    <a href="#" class="user-link">{{$laboratoryInfoValue->laboratory_name}}</a>
                                                    <span class="user-subhead">Laboratory</span>
                                                </td>


                                                <td>
                                                    <a href="#">{{$laboratoryInfoValue->email}}</a>
                                                    <br /><span class="user-subhead">{{$laboratoryInfoValue->telephone}}</span>
                                                </td>
                                                <td>2013/08/12

                                                </td>
                                                <td class="text-center">
                                                    <span class="label label-success">Active</span>
                                                </td>
                                                <td class="text-center">
                                                    <a data-toggle="collapse" href="#viewUser" onclick="viewUser({{$laboratoryInfoValue->id}})" aria-expanded="false" aria-controls="collapseExample" class="table-link" id="dispusr">
                                                                <span class="fa-stack">
                                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                                    <i class="fa fa-eye fa-stack-1x fa-inverse"></i>
                                                                </span>
                                                    </a>

                                                    <a data-toggle="collapse" href="#editUser" onclick="editUser({{$laboratoryInfoValue->id}})" aria-expanded="false" aria-controls="collapseExample" class="table-link" id="edtusr">
                                                                <span class="fa-stack">
                                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                                    <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                                                </span>
                                                    </a>
                                                    <a href="#" class="table-link danger">
                                                                <span class="fa-stack">
                                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                                    <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                                                </span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr class="td1" id="td{{$laboratoryInfoValue->id}}">
                                                <td colspan="6">


                                                    <form id="form_{{$laboratoryInfoValue->id}}" name="form_{{$laboratoryInfoValue->id}}" action="{{ URL::to('/') }}/admin/laboratory/update" method="POST" >

                                                    <div class="collapseX divUser" id="editUser{{$laboratoryInfoValue->id}}">
                                                        <div class="row">
                                                            <div class="col-md-2 col-md-offset-1">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <p><img src="http://placehold.it/100x100"></p>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <h5>{{$laboratoryInfoValue->laboratory_name}}</h5>
                                                                        <input type="hidden" class="form-control txtbox" id="exampleInputFName" name="laboratory_id" value="{{$laboratoryInfoValue->laboratory_id}}" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="FirstName">Lab Name</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control txtbox" id="exampleInputFName" name="laboratory_name" value="{{$laboratoryInfoValue->laboratory_name}}" >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="Email">EMail</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <input type="email" class="form-control txtbox" id="exampleEMail" name="email" value="{{$laboratoryInfoValue->email}}" >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="ContactNo" class="lbltxt">Contact No.</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control txtbox" id="exampleInputContactNo" name="telephone" value="{{$laboratoryInfoValue->telephone}}" >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="Status">Status</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="checkbox">
                                                                                <label>
                                                                                    <input type="radio" name="delete_status" value="1"> Active
                                                                                    &nbsp;&nbsp;
                                                                                    <input type="radio" name="delete_status" value="0"> Deactive
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>



                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="UserRole" class="lbltxt">Country</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <select name="country" class="form-control" >
                                                                                <option value="">--Choose Country--</option>
                                                                                @foreach($countryInfo as $countryInfoValue)
                                                                                    <option value="{{$countryInfoValue->id}}" @if($countryInfoValue->id==$laboratoryInfoValue->country) selected @endif >{{$countryInfoValue->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="UserRole" class="lbltxt">State</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <select name="state" class="form-control" >
                                                                                <option value="">--Choose State--</option>
                                                                                @foreach($stateInfo as $stateInfoValue)
                                                                                    <option value="{{$stateInfoValue->id}}" @if($stateInfoValue->id==$laboratoryInfoValue->state) selected @endif >{{$stateInfoValue->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="UserRole" class="lbltxt">City</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <select name="city" class="form-control" >
                                                                                <option value="">--Choose City--</option>
                                                                                @foreach($cityInfo as $cityInfoValue)
                                                                                    <option value="{{$cityInfoValue->id}}" @if($cityInfoValue->id==$laboratoryInfoValue->city) selected @endif >{{$cityInfoValue->city_name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="UserRole" class="lbltxt">Area</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <select name="area" class="form-control" >
                                                                                <option value="">--Choose Area--</option>
                                                                                @foreach($areaInfo as $areaInfoValue)
                                                                                    <option value="{{$areaInfoValue->id}}" @if($areaInfoValue->id==$laboratoryInfoValue->area) selected @endif >{{$areaInfoValue->area_name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>



                                                            </div>
                                                            <div class="col-md-1">

                                                                <div class="row">
                                                                    <button type="submit" class="btn btn-primary">UPDATE</button>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>

                                                    </form>

                                                    <div class="collapseX divUser" id="viewUser{{$laboratoryInfoValue->id}}">
                                                        <div class="row">
                                                            <div class="col-md-2 col-md-offset-1">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <p><img src="http://placehold.it/100x100"></p>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <h5>{{$laboratoryInfoValue->laboratory_name}}</h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="FirstName">Lab Name</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control txtbox" id="exampleInputFName" value="{{$laboratoryInfoValue->laboratory_name}}" readonly />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="Email">EMail</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <input type="email" class="form-control txtbox" id="exampleEMail" value="{{$laboratoryInfoValue->email}}" readonly />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="ContactNo" class="lbltxt">Contact No.</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control txtbox" id="exampleInputContactNo" value="{{$laboratoryInfoValue->telephone}}" readonly />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="Status">Status</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="checkbox">
                                                                                <label>
                                                                                    Active
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>



                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="UserRole" class="lbltxt">Country</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <select name="country" class="form-control" disabled>
                                                                                <option value="">--Choose Country--</option>
                                                                                @foreach($countryInfo as $countryInfoValue)
                                                                                    <option value="{{$countryInfoValue->id}}" @if($countryInfoValue->id==$laboratoryInfoValue->country) selected @endif >{{$countryInfoValue->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="UserRole" class="lbltxt">State</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <select name="state" class="form-control" disabled>
                                                                                <option value="">--Choose State--</option>
                                                                                @foreach($stateInfo as $stateInfoValue)
                                                                                    <option value="{{$stateInfoValue->id}}" @if($stateInfoValue->id==$laboratoryInfoValue->state) selected @endif >{{$stateInfoValue->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="UserRole" class="lbltxt">City</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <select name="city" class="form-control" disabled>
                                                                                <option value="">--Choose City--</option>
                                                                                @foreach($cityInfo as $cityInfoValue)
                                                                                    <option value="{{$cityInfoValue->id}}" @if($cityInfoValue->id==$laboratoryInfoValue->city) selected @endif >{{$cityInfoValue->city_name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="UserRole" class="lbltxt">Area</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <select name="area" class="form-control" disabled>
                                                                                <option value="">--Choose Area--</option>
                                                                                @foreach($areaInfo as $areaInfoValue)
                                                                                    <option value="{{$areaInfoValue->id}}" @if($areaInfoValue->id==$laboratoryInfoValue->area) selected @endif >{{$areaInfoValue->area_name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>



                                                            </div>

                                                        </div>
                                                    </div>
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
