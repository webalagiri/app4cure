@extends('layout.master-inner')

@section('title', 'Customer Register')

@section('styles')

@stop

@section('content')


    <div id="heading-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1>Laboratory for you</h1>
                </div>
                <div class="col-md-5">
                    <ul class="breadcrumb">
                        <li><a href="{{ URL::to('/') }}/">Home</a>
                        </li>
                        <li>Laboratory for you</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div id="content">
        <div class="container">

            <div class="row">


                <!-- *** LEFT COLUMN ***
        _________________________________________________________ -->

                <div class="col-sm-3">

                    <!-- *** MENUS AND FILTERS ***
_________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li class="active">
                                    <a href="shop.html">Medicine &amp; related <span class="badge pull-right">42</span></a>
                                    <ul>
                                        <li><a href="shop.html">Medicines</a>
                                        </li>
                                        <li><a href="shop.html">Personal Care</a>
                                        </li>
                                        <li><a href="shop.html">Heath monitoring tools</a>
                                        </li>
                                        <li><a href="shop.html">First Aid</a>
                                        </li>
                                        <li><a href="shop.html">Food &amp; nutrition</a>
                                        </li>
                                        <li><a href="shop.html">Braces &amp; supports</a>
                                        </li>
                                        <li><a href="shop.html">Herbal and Ayurvedic</a>
                                        </li>
                                    </ul>
                                </li>


                            </ul>

                        </div>
                    </div>
                    <!-- *** MENUS AND FILTERS END *** -->


                    <!-- /.banner -->

                </div>
                <!-- /.col-md-3 -->

                <!-- *** LEFT COLUMN END *** -->

                <!-- *** RIGHT COLUMN ***
        _________________________________________________________ -->

                <div class="col-sm-9">

                    <p class="text-muted lead product_head">LABORATORY</p>

                    <div class="row products">

                        @foreach($laboratory as $labinfo)

                        <div class="col-md-12 col-sm-12">

                            <div class="product">
                                <div class="col-md-4 col-sm-4">
                                <div class="image">
                                    <a href="#shop-detail.html">
                                        <img src="{{$labinfo->laboratory_logo}}" alt="" class="img-responsive image1">
                                    </a>
                                </div>
                                </div>
                                <!-- /.image -->
                                <div class="col-md-6 col-sm-6">
                                <div class="text">

                                    <h3 style="height: 5.6px;text-align: left;"><a href="#shop-detail.html">{{$labinfo->laboratory_name}}</a></h3>
                                    <p style="height: 5.6px;text-align: left;">{{$labinfo->lab_area}}, {{$labinfo->lab_city}}, {{$labinfo->lab_state}}, {{$labinfo->lab_country}}</p>

                                </div>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <button>BOOK</button>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        @endforeach



                    </div>
                    <!-- /.products -->

                    <div class="row">

                        <div class="col-md-12 banner">
                            <a href="#">
                                <img src="img/banner2.jpg" alt="" class="img-responsive">
                            </a>
                        </div>

                    </div>


                    <div class="pages">

                        <p class="loadMore">
                            <a href="#" class="btn btn-template-main"><i class="fa fa-chevron-down"></i> Load more</a>
                        </p>

                        <ul class="pagination">
                            <li><a href="#">&laquo;</a>
                            </li>
                            <li class="active"><a href="#">1</a>
                            </li>
                            <li><a href="#">2</a>
                            </li>
                            <li><a href="#">3</a>
                            </li>
                            <li><a href="#">4</a>
                            </li>
                            <li><a href="#">5</a>
                            </li>
                            <li><a href="#">&raquo;</a>
                            </li>
                        </ul>
                    </div>


                </div>
                <!-- /.col-md-9 -->

                <!-- *** RIGHT COLUMN END *** -->

            </div>

        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->




@endsection

@section('scripts')

@stop
