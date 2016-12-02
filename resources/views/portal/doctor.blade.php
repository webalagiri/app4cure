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
                    <h1>Doctor for you</h1>
                </div>
                <div class="col-md-5">
                    <ul class="breadcrumb">
                        <li><a href="{{ URL::to('/') }}/">Home</a>
                        </li>
                        <li>Doctor for you</li>
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
                            <h3 class="panel-title">Hospitals</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li class="active">
                                    <ul>
                                        @foreach($hospitalInfo as $hospitalInfoValue)
                                            <li><a href="{{ URL::to('/') }}/doctor?hid={{$hospitalInfoValue->id}}">{{$hospitalInfoValue->hospital_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <!-- *** MENUS AND FILTERS END *** -->

                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Specialities</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li class="active">
                                    <ul>
                                    @foreach($specialityInfo as $doctorSpecialtyInfoValue)
                                    <li><a href="{{ URL::to('/') }}/doctor?sid={{$doctorSpecialtyInfoValue->id}}">{{$doctorSpecialtyInfoValue->name}}</a></li>
                                    @endforeach
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

                        <a href="{{ URL::to('/') }}/laboratory/cart"> My Doctor Cart </a>

                        <!--
                        <a href="{{ URL::to('/') }}/laboratory/cart" onclick="javascript:alert('Cart Empty');"> My Lab Cart </a>
                        -->

                    </div>

                    <p class="text-muted lead product_head">DOCTOR</p>


                    <div class="row products">

                        @foreach($doctor as $doctorinfo)

                        <div class="col-md-12 col-sm-12" style="border:1px solid #ccc;">
                            <div class="product" style="margin-bottom:10px; border:none;">
                                <div class="col-md-3 col-sm-3">
                                <div class="image">
                                    <a href="#shop-detail.html">
                                        <img src="{{$doctorinfo->doctor_photo}}" alt="" class="img-responsive image1">
                                    </a>
                                </div>
                                </div>
                                <!-- /.image -->
                                <div class="col-md-6 col-sm-6">
                                <div class="text">

                                    <h3 style="height: 5.6px;text-align: left;"><a href="#shop-detail.html">{{$doctorinfo->doctor_name}}</a></h3>
                                    <p style="height: 5.6px;text-align: left;">{{$doctorinfo->doctor_area}}, {{$doctorinfo->doctor_city}}, {{$doctorinfo->doctor_state}}, {{$doctorinfo->doctor_country}}</p>

                                </div>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    @if(isset(Auth::user()->id))
                                    <button id="book_{{$doctorinfo->doctor_id}}" onclick="javascript:ajax_book('{{$doctorinfo->doctor_id}}');" type="button" class="btn btn-primary btn-block" style="margin-top: 130px;width:200px;">Book Appoitment</button>
                                    @else
                                        <button onclick="javascript:alert('Please Login to Book Order');" type="button" class="btn btn-primary btn-block" style="margin-top: 130px;width:200px;">Book Appointment</button>
                                    @endif

                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                            <div id="book_form_{{$doctorinfo->doctor_id}}" class="product-book" style="display: none;">
                                
                                <form id="form_{{$doctorinfo->doctor_id}}" name="form_{{$doctorinfo->doctor_id}}" action="{{ URL::to('/') }}/doctor/addtocart" method="POST" >


                                <input type="hidden" name="doctor_id" id="doctor_id" value="{{$doctorinfo->doctor_id}}" />

                                <div class="col-md-8 col-sm-8">
                                    <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Hospital</th>
                                        <th>Price</th>
                                        <th>Choose</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Apollo</td>
                                        <td>1000 INR</td>
                                        <td><input type="radio" name="hospital_id" id="hospital_id" value="86" data-src="1000" /></td>
                                    </tr>
                                    <tr>
                                        <td>SIMS</td>
                                        <td>1000 INR</td>
                                        <td><input type="radio" name="hospital_id" id="hospital_id" value="87" data-src="1000" /></td>
                                    </tr>
                                    </tbody>
                                    </table>
                                    <iframe src="{{ URL::to('/') }}/doctor-calendar.php" style="width:100%;height: 100%;border:0px;"></iframe>    
                                </div>
                                <div class="col-md-4 col-sm-4">

                                    <div class="form-group">
                                        <br/>
                                        <label for="email">Appointment Costs</label>
                                        <input type="hidden" class="form-control" id="doctor_appointment_cost" name="doctor_appointment_cost" required="required" readonly="readonly" />
                                        <br/> <span class="price">0</span> INR
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Date & Time</label>
                                        <input type="text" class="form-control" id="doctor_appointment_date_{{$doctorinfo->doctor_id}}" name="doctor_tests_date" required="required" />
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Notes</label>
                                        <textarea class="form-control" id="doctor_tests_notes" name="doctor_tests_notes"></textarea>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-template-main"><i class="fa fa-flask"></i> Book </button>
                                    </div>


                                </div>

                                </form>


                                <script>
                                    jQuery('#doctor_appointment_date_{{$doctorinfo->doctor_id}}').datetimepicker({
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
            var inputs = $('form input:radio');

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
                $('#'+form_id+' #doctor_appointment_cost').val(value);
            }

            inputs.change(updatePrice);
        });
    </script>


@stop
