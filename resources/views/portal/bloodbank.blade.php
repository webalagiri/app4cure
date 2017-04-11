@extends('layout.master-inner')

@section('title', 'Blood Bank')

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
                    <h1>Blood Bank for you</h1>
                </div>
                <div class="col-md-5">
                    <ul class="breadcrumb">
                        <li><a href="{{ URL::to('/') }}/">Home</a>
                        </li>
                        <li>Blood Bank for you</li>
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
                            <h3 class="panel-title">Blood Bank Types</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li class="active">

                                    <ul>
                                        <li><a href="{{ URL::to('/') }}/bloodbank?filter=type&value=1">GOVERNMENT</a>
                                        </li>
                                        <li><a href="{{ URL::to('/') }}/bloodbank?filter=type&value=2">PRIVATE</a>
                                        </li>
                                        <li><a href="{{ URL::to('/') }}/bloodbank?filter=type&value=3">TRUST</a>
                                        </li>
                                    </ul>
                                </li>


                            </ul>

                        </div>
                    </div>

                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Blood Bank Services</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li class="active">

                                    <ul>
                                        <li><a href="{{ URL::to('/') }}/bloodbank?filter=service&value=1">Whole Blood</a>
                                        </li>
                                        <li><a href="{{ URL::to('/') }}/bloodbank?filter=service&value=2">Platelets</a>
                                        </li>
                                        <li><a href="{{ URL::to('/') }}/bloodbank?filter=service&value=3">Special Plasma</a>
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

                        <a href="#{{ URL::to('/') }}/bloodbank/cart"> My Blood Bank Cart </a>

                        <!--
                        <a href="{{ URL::to('/') }}/laboratory/cart" onclick="javascript:alert('Cart Empty');"> My Lab Cart </a>
                        -->

                    </div>

                    <p class="text-muted lead product_head">BLOOD BANK</p>


                    <div class="row products">

                        @foreach($bloodBank as $bloodBankinfo)

                        <div class="col-md-12 col-sm-12" style="border:1px solid #ccc;">
                            <div class="product" style="margin-bottom:10px; border:none;">
                                <div class="col-md-3 col-sm-3">
                                <div class="image">
                                    <a href="#shop-detail.html">
                                        <img src="{{$bloodBankinfo->bloodbank_logo}}" alt="" class="img-responsive image1">
                                    </a>
                                </div>
                                </div>
                                <!-- /.image -->
                                <div class="col-md-6 col-sm-6">
                                <div class="text">

                                    <h3 style="height: 5.6px;text-align: left;"><a href="#shop-detail.html">{{$bloodBankinfo->bloodbank_name}}</a></h3>
                                    <p style="height: 5.6px;text-align: left;">{{$bloodBankinfo->bloodbank_area}}, {{$bloodBankinfo->bloodbank_city}}, {{$bloodBankinfo->bloodbank_state}}, {{$bloodBankinfo->bloodbank_country}}</p>

                                </div>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    @if(isset(Auth::user()->id))
                                    <button id="book_{{$bloodBankinfo->bloodbank_id}}" onclick="ajax_book('{{$bloodBankinfo->bloodbank_id}}');" type="button" class="btn btn-primary btn-block" style="margin-top: 130px;">View Services</button>
                                    @else
                                        <button onclick="alert('Please Login to Book Order');" type="button" class="btn btn-primary btn-block" style="margin-top: 130px;">View Service</button>
                                    @endif

                                </div>
                                <!-- /.text -->
                            </div>
                            <?php /* */ ?>
                            <!-- /.product -->
                            <div id="book_form_{{$bloodBankinfo->bloodbank_id}}" class="product-book" style="display: none;">

                                <form id="form_{{$bloodBankinfo->bloodbank_id}}" name="form_{{$bloodBankinfo->bloodbank_id}}" action="{{ URL::to('/') }}/laboratory/addtocart" method="POST" >


                                <input type="hidden" name="laboratory_id" id="laboratory_id" value="{{$bloodBankinfo->bloodbank_id}}" />

                                <div class="col-md-8 col-sm-8">
                                    <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Group</th>
                                        <th>Price</th>
                                        <th>Unit</th>
                                        <th>Choose</th>
                                    </thead>
                                    <tbody>

                                    @foreach($bloodBankServiceList[$bloodBankinfo->bloodbank_id] as $bloodBankServiceValue)
                                        <tr>
                                        <td>{{$bloodBankServiceValue->bloodbank_service_name}}</td>
                                            <td>
                                                <select name="group[]" id="group">
                                                    <option>A+ Group</option>
                                                    <option>A- unit</option>
                                                    <option>B+ unit</option>
                                                    <option>B- unit</option>
                                                    <option>O+ unit</option>
                                                    <option>O- unit</option>
                                                    <option>AB+ unit</option>
                                                    <option>AB- unit</option>

                                                </select>
                                            </td>
                                            <td>{{$bloodBankServiceValue->bloodbank_service_price}} INR</td>
                                            <td>
                                                <select name="unit[]" id="unit">
                                                    <option value="1">1 unit</option>
                                                    <option value="2">2 unit</option>
                                                    <option value="3">3 unit</option>
                                                    <option value="4">4 unit</option>
                                                    <option value="5">5 unit</option>
                                                    <option value="6">6 unit</option>
                                                    <option value="7">7 unit</option>
                                                    <option value="8">8 unit</option>
                                                    <option value="9">9 unit</option>
                                                    <option value="10">10 unit</option>
                                                </select>
                                            </td>
                                        <td><input type="checkbox" name="laboratory_tests[]" id="laboratory_tests" value="{{$bloodBankServiceValue->bloodbank_service_name_id}}" data-src="{{$bloodBankServiceValue->bloodbank_service_price}}" /></td>
                                    </tr>
                                    @endforeach
                                    <!--
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
                                    -->
                                    </tbody>
                                    </table>

                                </div>
                                <div class="col-md-4 col-sm-4">

                                    <div class="form-group">
                                        <br/>
                                        <label for="email">Tests Costs</label>
                                        <input type="hidden" class="form-control" id="laboratory_tests_cost" name="laboratory_tests_cost" value="" required="required"/>
                                        <br/> <span class="price">0</span> INR
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Date & Time</label>
                                        <input type="text" class="form-control" id="laboratory_tests_date_{{$bloodBankinfo->bloodbank_id}}" name="laboratory_tests_date" required="required" />
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
                                    jQuery('#laboratory_tests_date_{{$bloodBankinfo->bloodbank_id}}').datetimepicker({
                                         startDate:'+1970/01/02',
                                         allowTimes:['10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00']
                                    });
                                </script>


                            </div>
                            <!-- /.product -->
                            <?php /* */ ?>
                        </div>
                        @endforeach



                    </div>
                    <!-- /.products -->

                    <div class="row">
<br/>
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
            var selects = $('form select');
            function updatePrice(){
                //alert('HI');
                //alert($(this).parent('form'));
                //alert($(this).closest('tr').find('#unit').val());
                var form_id = $(this).closest("form").prop("id");
                //alert(form_id);
                var value = 0;
                inputs.filter('#'+form_id+' :checked').each(function(){

                    value += parseInt($(this).data('src'), 10)*parseInt($(this).closest('tr').find('#unit').val());

                });
                $('#'+form_id+' .price').html(value);
                $('#'+form_id+' #laboratory_tests_cost').val(value);
            }

            inputs.change(updatePrice);
            selects.change(updatePrice);
        });
    </script>


@stop
