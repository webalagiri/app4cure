@extends('admi.layout.master')

@section('title', 'Admin Dashboard')

@section('styles')

@stop

@section('content')


    <div id="content">
        <div class="container-fluid">

            <!-- *** LEFT COLUMN ***
        _________________________________________________________ -->

            <div class="col-sm-2">

                <!-- *** MENUS AND FILTERS ***
_________________________________________________________ -->
                <div class="panel panel-default sidebar-menu">
                    <p>Home > User Management</p>
                    <div class="panel-heading">
                        <h3 class="panel-title">All Filters</h3>
                    </div>

                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked category-menu">

                            <li class="active"><a href="mypage.html">Admin</a>
                            </li>
                            <li><a href="mypage-store.html">Store</a>
                            </li>
                            <li><a href="mypage-rep.html">Medical Representative</a>
                            </li>
                            <li><a href="mypage-sales.html">Sales Executives</a>
                            </li>


                        </ul>

                    </div>
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
                        <p class="body-heading"><strong>User Management</strong> - <span>Admin</span></p>
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
                                                <a href="#" class="user-link">Suresh Loganathan</a>
                                                <span class="user-subhead">Admin</span>
                                            </td>


                                            <td>
                                                <a href="#">sureshl@webapps.com</a>
                                                <br /><span class="user-subhead">+91 9876543210</span>
                                            </td>
                                            <td>2013/08/12</td>
                                            <td class="text-center">
                                                <span class="label label-default">pending</span>
                                            </td>
                                            <td class="text-center">
                                                <a data-toggle="collapse" href="#viewUser" aria-expanded="false" aria-controls="collapseExample" class="table-link" id="dispusr">
                                                                <span class="fa-stack">
                                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                                    <i class="fa fa-eye fa-stack-1x fa-inverse"></i>
                                                                </span>
                                                </a>

                                                <a data-toggle="collapse" href="#editUser" aria-expanded="false" aria-controls="collapseExample" class="table-link" id="edtusr">
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

                                        <tr class="td1" id="td1">
                                            <td colspan="6">
                                                <div class="collapse" id="editUser">
                                                    <div class="row">
                                                        <div class="col-md-2 col-md-offset-1">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <p><img src="http://placehold.it/100x100"></p>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <h5>SURESH LOGANATHAN</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <div class="col-md-3">
                                                                        <label for="FirstName">First Name</label>
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <input type="text" class="form-control txtbox" id="exampleInputFName" value="Suresh" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <div class="col-md-3">
                                                                        <label for="Email">EMail</label>
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <input type="email" class="form-control txtbox" id="exampleEMail" value="Sureshl@wam.com" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <div class="col-md-3">
                                                                        <label for="UserRole" class="lbltxt">Selected Role</label>
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <select class="form-control" title="Select">
                                                                            <option>Admin</option>
                                                                            <option>Store</option>
                                                                            <option>Medical Representative</option>
                                                                            <option>Sales Executive</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <div class="col-md-3">
                                                                        <label for="LastName">Last Name</label>
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <input type="text" class="form-control txtbox" id="exampleInputLName" value="Suresh" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <div class="col-md-3">
                                                                        <label for="ContactNo" class="lbltxt">Contact No.</label>
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <input type="text" class="form-control txtbox" id="exampleInputContactNo" value="9876543210" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <div class="col-md-3">
                                                                        <label for="Status">Status</label>
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <div class="checkbox">
                                                                            <label>
                                                                                <input type="checkbox" value="" disabled>
                                                                                Pending <span class="cr"><i class="cr-icon fa fa-check"></i></span> </label>
                                                                        </div>
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



                                                <div class="collapse" id="viewUser">
                                                    <div class="row">
                                                        <div class="col-md-2 col-md-offset-1">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <p><img src="http://placehold.it/100x100"></p>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <h5>SURESH LOGANATHAN</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <div class="col-md-3">
                                                                        <label for="FirstName">First Name</label>
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <input type="text" class="form-control txtbox" id="exampleInputFName" value="Suresh" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <div class="col-md-3">
                                                                        <label for="Email">EMail</label>
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <input type="email" class="form-control txtbox" id="exampleEMail" value="Sureshl@wam.com" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <div class="col-md-3">
                                                                        <label for="UserRole" class="lbltxt">Selected Role</label>
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <select class="form-control" title="Select" disabled>
                                                                            <option>Admin</option>
                                                                            <option>Store</option>
                                                                            <option>Medical Representative</option>
                                                                            <option>Sales Executive</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <div class="col-md-3">
                                                                        <label for="LastName">Last Name</label>
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <input type="text" class="form-control txtbox" id="exampleInputLName" value="Suresh" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <div class="col-md-3">
                                                                        <label for="ContactNo" class="lbltxt">Contact No.</label>
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <input type="text" class="form-control txtbox" id="exampleInputContactNo" value="9876543210" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <div class="col-md-3">
                                                                        <label for="Status">Status</label>
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <div class="checkbox">
                                                                            <label>
                                                                                <input type="checkbox" value="" disabled>
                                                                                Pending <span class="cr"><i class="cr-icon fa fa-check"></i></span> </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
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
                                                <img src="http://bootdey.com/img/Content/user_3.jpg" alt="">
                                                <a href="#" class="user-link">Arunkumar Karruppasamy</a>
                                                <span class="user-subhead">Admin</span>
                                            </td>

                                            <td>
                                                <a href="#">k.arunkumar@webapps.com</a><br /><span class="user-subhead">+91 9876543210</span>

                                            </td>
                                            <td>2013/08/12</td>
                                            <td class="text-center">
                                                <span class="label label-success">Active</span>
                                            </td>
                                            <td class="text-center">
                                                <a data-toggle="collapse" href="#viewUser" aria-expanded="false" aria-controls="collapseExample" class="table-link">
                                                                <span class="fa-stack">
                                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                                    <i class="fa fa-eye fa-stack-1x fa-inverse"></i>
                                                                </span>
                                                </a>
                                                <a data-toggle="collapse" href="#editUser" aria-expanded="false" aria-controls="collapseExample" class="table-link">
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
                                                <img src="http://bootdey.com/img/Content/user_2.jpg" alt="">
                                                <a href="#" class="user-link">Ananthan Guru</a>
                                                <span class="user-subhead">Member</span>
                                            </td>
                                            <td>
                                                <a href="#">k.arunkumar@webapps.com</a><br /><span class="user-subhead">+91 9876543210</span>

                                            </td>
                                            <td>2013/08/12</td>
                                            <td class="text-center">
                                                <span class="label label-warning">Pending</span>
                                            </td>
                                            <td class="text-center">
                                                <a data-toggle="collapse" href="#viewUser" aria-expanded="false" aria-controls="collapseExample" class="table-link">
                                                                <span class="fa-stack">
                                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                                    <i class="fa fa-eye fa-stack-1x fa-inverse"></i>
                                                                </span>
                                                </a>
                                                <a data-toggle="collapse" href="#editUser" aria-expanded="false" aria-controls="collapseExample" class="table-link">
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
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>












                <p>&nbsp;</p>
                <div class="row">


                    <div class="collapse" id="editUser">
                        <h3>Suresh Loganathan</h3>
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="FirstName">First Name</label>
                                        <input type="text" class="form-control" id="exampleInputFName" placeholder="Enter First Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="LastName">Last Name</label>
                                        <input type="text" class="form-control" id="exampleInputLName" placeholder="Enter Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="EMailID">Email ID</label>
                                        <input type="email" class="form-control" id="exampleInputEmail" placeholder="Enter Email ID">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phonenumnber">Phone Number:</label>
                                        <input type="text" class="form-control" id="exampleInputphone" placeholder="Enter Phone Number">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="EMailID">Date of Birth</label>
                                        <input type="email" class="form-control" id="exampleInputEmail" placeholder="Enter Email ID">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="profilePic">Profile Pic upload</label>
                                        <input type="file" class="form-control-file" id="profilePic" aria-describedby="fileHelp">

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <img src="http://placehold.it/100x100">
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">UPDATE</button>
                        </form>
                    </div>

                    <div class="collapse" id="viewUser">
                        <h3>ArunKumar Karruppasamy</h3>
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="FirstName">First Name</label>
                                        <input type="text" class="form-control" id="exampleInputFName" placeholder="Enter First Name" value="ArunKumar" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="LastName">Last Name</label>
                                        <input type="text" class="form-control" id="exampleInputLName" placeholder="Enter Last Name" value="Karuuppasamy" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="EMailID">Email ID</label>
                                        <input type="email" class="form-control" id="exampleInputEmail" placeholder="Enter Email ID" value="k.arunkumar@gmail.com" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phonenumnber">Phone Number:</label>
                                        <input type="text" class="form-control" id="exampleInputphone" placeholder="Enter Phone Number" value="7894561230" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="EMailID">Date of Birth</label>
                                        <input type="email" class="form-control" id="exampleInputEmail" placeholder="Enter Email ID" value="28/01/1982" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="profilePic">Profile Pic upload</label>
                                        <input type="file" class="form-control-file" id="profilePic" aria-describedby="fileHelp">

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <img src="http://placehold.it/100x100">
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">UPDATE</button>
                        </form>
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
