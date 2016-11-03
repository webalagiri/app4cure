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
                            <h3 class="panel-title">Tests Categories</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li class="active">

                                    <ul>
                                        <li><a href="{{ URL::to('/') }}/laboratory">BLOOD TESTS</a>
                                        </li>
                                        <li><a href="{{ URL::to('/') }}/laboratory">LIVER FUNCTION TESTS</a>
                                        </li>
                                        <li><a href="{{ URL::to('/') }}/laboratory">RAPID PLASMA REAGIN TEST</a>
                                        </li>
                                        <li><a href="{{ URL::to('/') }}/laboratory">INFECTIOUS MONONUCLEOSIS TEST</a>
                                        </li>
                                        <li><a href="{{ URL::to('/') }}/laboratory">TOTAL TESTOSTERONE</a>
                                        </li>
                                        <li><a href="{{ URL::to('/') }}/laboratory">FREE TESTOSTERONE</a>
                                        </li>
                                        <li><a href="{{ URL::to('/') }}/laboratory">WIDAL TEST</a>
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
                                    <button id="book_{{$labinfo->laboratory_id}}" onclick="javascript:ajax_book('{{$labinfo->laboratory_id}}');" type="button" class="btn btn-primary btn-block" style="margin-top: 130px;">Book</button>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                            <div id="book_form_{{$labinfo->laboratory_id}}" class="product-book" style="display: none;">
                                <div class="col-md-4 col-sm-4">
                                    <div class="text">

                                    </div>
                                </div>
                                <!-- /.image -->
                                <div class="col-md-6 col-sm-6">
                                    <div class="text">

                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <button type="button" class="btn btn-primary btn-block" style="margin-top: 130px;">Book</button>
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
<script>
    function ajax_book(id)
    {
        alert(id);

        book_form_{{$labinfo->laboratory_id}}
    }

</script>