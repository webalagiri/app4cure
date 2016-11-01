@extends('layout.master-inner')

@section('title', 'Customer Register')

@section('styles')

@stop

@section('content')

    <div id="heading-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1>Medical Servicecs</h1>
                </div>
                <div class="col-md-5">
                    <ul class="breadcrumb">
                        <li><a href="{{ URL::to('/') }}/">Home</a>
                        </li>
                        <li>Medical Services</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div id="content">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <h2 class="text-uppercase">Departments</h2>
                        <a href="neurology.html">
                            <img src="{{ URL::to('/') }}/img/department.png" class="img-responsive" border="0" /></a>
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
