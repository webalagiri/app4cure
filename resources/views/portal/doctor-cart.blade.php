@extends('layout.master-inner')

@section('title', 'Doctor Appointment')

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
                    <h1>Doctor Appointment</h1>
                </div>
                <div class="col-md-5">
                    <ul class="breadcrumb">
                        <li><a href="{{ URL::to('/') }}/">Home</a>
                        </li>
                        <li>Doctor Appointment</li>
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

                        <a href="{{ URL::to('/') }}/laboratory"> Back to Laboratory </a>

                        <!--
                        <a href="{{ URL::to('/') }}/laboratory/cart" onclick="javascript:alert('Cart Empty');"> My Lab Cart </a>
                        -->

                    </div>

                    <p class="text-muted lead product_head">Doctor Appointment</p>


                    <div class="row products">

                        <div class="col-md-12 col-sm-12">

{{print_r($doctorAppointmentInfo)}}

                    </div>
                    <!-- /.products -->
                        <div>
                            <p class="loadMore" style="text-align: right;">
                                <a href="{{ URL::to('/') }}/laboratory/confirm" class="btn btn-template-main"><i class="fa fa-cart-plus"></i> Confirm Order</a>
                            </p>
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
