@extends('layout.master')

@section('title', 'Customer Register')

@section('styles')

@stop

@section('content')


    <div id="heading-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1>Contact</h1>
                </div>
                <div class="col-md-5">
                    <ul class="breadcrumb">
                        <li><a href="{{ URL::to('/') }}/">Home</a>
                        </li>
                        <li>Contact</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div id="content">
        <div class="container" id="contact">

            <section>

                <div class="row">
                    <div class="col-md-12">
                        <section>
                            <div class="heading">
                                <h2>We are here to help you</h2>
                            </div>

                            <p class="lead">Are you curious about something? Do you have some kind of problem with our products? As am hastily invited settled at limited civilly fortune me. Really spring in extent an by. Judge but built gay party world. Of so am
                                he remember although required. Bachelor unpacked be advanced at. Confined in declared marianne is vicinity.</p>
                            <p>Please feel free to contact us, our customer service center is working for you 24/7.</p>
                        </section>
                    </div>
                </div>

            </section>

            <section>

                <div class="row">
                    <div class="col-md-4">
                        <div class="box-simple">
                            <div class="icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <h3>Address</h3>
                            <p>F1, 1/422A
                                , Selaiyur
                                <br>Tambaram
                                , Tamil Nadu,
                                <br>
                                <strong>India</strong>
                            </p>
                        </div>
                        <!-- /.box-simple -->
                    </div>


                    <div class="col-md-4">

                        <div class="box-simple">
                            <div class="icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <h3>Call center</h3>
                            <p class="text-muted">This number is toll free, otherwise we advise you to use the electronic form of communication.</p>
                            <p><strong> 1800 2222222</strong>
                            </p>
                        </div>
                        <!-- /.box-simple -->

                    </div>

                    <div class="col-md-4">

                        <div class="box-simple">
                            <div class="icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <h3>Electronic support</h3>
                            <p class="text-muted">Please feel free to write an email to us or to use our electronic ticketing system.</p>
                            <ul class="list-style-none">
                                <li><strong><a href="mailto:">info@app4cure.co.in</a></strong>
                            </ul>
                        </div>
                        <!-- /.box-simple -->
                    </div>
                </div>

            </section>

            <section>

                <div class="row text-center">

                    <div class="col-md-12">
                        <div class="heading">
                            <h2>Contact form</h2>
                        </div>
                    </div>

                    <div class="col-md-8 col-md-offset-2">
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">Firstname</label>
                                        <input type="text" class="form-control" id="firstname">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lastname">Lastname</label>
                                        <input type="text" class="form-control" id="lastname">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="subject">Subject</label>
                                        <input type="text" class="form-control" id="subject">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea id="message" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-template-main"><i class="fa fa-envelope-o"></i> Send message</button>

                                </div>
                            </div>
                            <!-- /.row -->
                        </form>



                    </div>
                </div>
                <!-- /.row -->

            </section>


        </div>
        <!-- /#contact.container -->
    </div>
    <!-- /#content -->

    <div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1944.279581659998!2d80.18781222881907!3d12.936030730157812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTLCsDU2JzA5LjUiTiA4MMKwMTEnMTguMyJF!5e0!3m2!1sen!2sin!4v1477196610252" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>



@endsection

@section('scripts')

@stop
