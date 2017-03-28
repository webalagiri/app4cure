@extends('layout.master-inner')

@section('title', 'Customer Register')

@section('styles')

    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/js/datetimepicker-master/jquery.datetimepicker.css" />
    <script src="{{ URL::to('/') }}/js/datetimepicker-master/jquery.js"></script>
    <script src="{{ URL::to('/') }}/js/datetimepicker-master/build/jquery.datetimepicker.full.min.js"></script>
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

                <!-- *** RIGHT COLUMN *** -->

                <div class="col-sm-9">
                    <div style="text-align: right;font-weight: bold;">

                        <a href="{{ URL::to('/') }}/laboratory/cart"> My Lab Cart </a>

                        <!--
                        <a href="{{ URL::to('/') }}/laboratory/cart" onclick="javascript:alert('Cart Empty');"> My Lab Cart </a>
                        -->

                    </div>

                    <p class="text-muted lead product_head">LABORATORY</p>


                    <div class="row products">

                        @foreach($laboratory as $labinfo)

                        <div class="col-md-12 col-sm-12" style="border:1px solid #ccc;">
                            <div class="product" style="margin-bottom:10px; border:none;">
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
                                    @if(isset(Auth::user()->id))
                                    <button id="book_{{$labinfo->laboratory_id}}" onclick="ajax_book('{{$labinfo->laboratory_id}}');" type="button" class="btn btn-primary btn-block" style="margin-top: 130px;">View Tests</button>
                                    @else
                                        <button onclick="alert('Please Login to Book Order');" type="button" class="btn btn-primary btn-block" style="margin-top: 130px;">View Tests</button>
                                    @endif

                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                            <div id="book_form_{{$labinfo->laboratory_id}}" class="product-book" style="display: none;">

                                <form id="form_{{$labinfo->laboratory_id}}" name="form_{{$labinfo->laboratory_id}}" action="{{ URL::to('/') }}/laboratory/addtocart" method="POST" >


                                <input type="hidden" name="laboratory_id" id="laboratory_id" value="{{$labinfo->laboratory_id}}" />

                                <div class="col-md-8 col-sm-8">
                                    <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Choose</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>BLOOD TESTS</td>
                                        <td>1000 INR</td>
                                        <td><input type="checkbox" name="laboratory_tests[]" id="laboratory_tests" value="1" data-src="1000" /></td>
                                    </tr>
                                    <tr>
                                        <td>LIVER FUNCTION TESTS</td>
                                        <td>1000 INR</td>
                                        <td><input type="checkbox" name="laboratory_tests[]" id="laboratory_tests" value="2" data-src="1000" /></td>
                                    </tr>
                                    <tr>
                                        <td>RAPID PLASMA REAGIN TEST</td>
                                        <td>1000 INR</td>
                                        <td><input type="checkbox" name="laboratory_tests[]" id="laboratory_tests" value="3" data-src="1000" /></td>
                                    </tr>
                                    <tr>
                                        <td>INFECTIOUS MONONUCLEOSIS TEST</td>
                                        <td>1000 INR</td>
                                        <td><input type="checkbox" name="laboratory_tests[]" id="laboratory_tests" value="4" data-src="1000" /></td>
                                    </tr>
                                    <tr>
                                        <td>TOTAL TESTOSTERONE</td>
                                        <td>1000 INR</td>
                                        <td><input type="checkbox" name="laboratory_tests[]" id="laboratory_tests" value="5" data-src="1000" /></td>
                                    </tr>
                                    <tr>
                                        <td>FREE TESTOSTERONE</td>
                                        <td>1000 INR</td>
                                        <td><input type="checkbox" name="laboratory_tests[]" id="laboratory_tests" value="6" data-src="1000" /></td>
                                    </tr>
                                    <tr>
                                        <td>WIDAL TEST</td>
                                        <td>1000 INR</td>
                                        <td><input type="checkbox" name="laboratory_tests[]" id="laboratory_tests" value="7" data-src="1000" /></td>
                                    </tr>
                                    </tbody>
                                    </table>

                                </div>
                                <div class="col-md-4 col-sm-4">

                                    <div class="form-group">
                                        <br/>
                                        <label for="email">Tests Costs</label>
                                        <input type="hidden" class="form-control" id="laboratory_tests_cost" name="laboratory_tests_cost" required="required" readonly="readonly" />
                                        <br/> <span class="price">0</span> INR
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Date & Time</label>
                                        <input type="text" class="form-control" id="laboratory_tests_date_{{$labinfo->laboratory_id}}" name="laboratory_tests_date" required="required" />
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Notes</label>
                                        <textarea class="form-control" id="laboratory_tests_notes" name="laboratory_tests_notes"></textarea>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-template-main"><i class="fa fa-flask"></i> Book </button>
                                    </div>


                                </div>

                                </form>


                                <script>
                                    jQuery('#laboratory_tests_date_{{$labinfo->laboratory_id}}').datetimepicker({
                                         startDate:'+1970/01/02',
                                         allowTimes:['10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00']
                                    });
                                </script>


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

    <script>
        function ajax_book(id)
        {
            //alert("#book_form_"+id);
            $( "#book_form_"+id ).toggle();
        }

    </script>
    <script>

        $( document ).ready(function() {
            var inputs = $('form input:checkbox');

            function updatePrice(){
                //alert('HI');
                //alert($(this).parent('form'));
                var form_id = $(this).closest("form").prop("id");
                //alert(form_id);
                var value = 0;
                inputs.filter('#'+form_id+' :checked').each(function(){

                    value += parseInt($(this).data('src'), 10);

                });
                $('#'+form_id+' .price').html(value);
                $('#'+form_id+' #laboratory_tests_cost').val(value);
            }

            inputs.change(updatePrice);
        });
    </script>


@stop
